<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\TodoResource;
use App\Services\TodoService;
use Throwable;

class TodoController extends Controller
{
    public function index(TodoService $service)
    {
        try {
            // $data = $service->getAllTodos();
            $data = $service->getAllUnfinishedTodos();
            return TodoResource::collection($data);
        } catch (Throwable $th) {
            report($th);
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
    public function store(TodoRequest $request, TodoService $service)
    {
        try {
            $data = $request->validated();
            $response = $service->createTodo($data);
            return new TodoResource($response);
        } catch (Throwable $th) {
            report($th);
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }
    public function update(UpdateTodoRequest $request, $id, TodoService $service)
    {

        try {
            $data = $request->validated();
            // dd($data['title'], $data['description'], $data['is_done']);

            $todo = $service->getTodoById($id);
            $response = $service->updateTodo($data, $todo);
            if ($response == null) {
                return response()->json(['message' => 'update service failed'], 404);
            } else {
                return new TodoResource($response);
            }
        } catch (Throwable $th) {
            report($th);
            return response()->json(['message' => 'Something went wrong ' . $th->getMessage()], 500);
        }
    }
    public function delete($id, TodoService $service)
    {
        try {
            $todo = $service->getTodoById($id);
            if ($todo == null) {
                return response()->json(['message' => 'todo not found'], 400);
            } else {
                $todo->delete();
                return response()->json(['message' => 'todo deleted successfully!'], 200);
            }

        } catch (Throwable $th) {
            report($th);
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

}
