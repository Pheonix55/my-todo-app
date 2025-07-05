<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todos;
use Illuminate\Http\Request;
use Throwable;

class TodoController extends Controller
{
    public function index()
    {
        try {
            $data = Todos::latest()->paginate(10);
            if ($data) {
                return response()->json($data, 200);
            }
            return response()->json(['message' => 'no data found'], 200);
        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    public function store(TodoRequest $request)
    {
        try {
            $data = $request->validated();
            $data['created_by'] = 1;
            // $data['created_by'] = auth()->id();
            Todos::create($data);
            return response()->json(['message' => 'todo added successfully!'], 201);
        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    public function update(TodoRequest $request, $id)
    {

        try {
            $todo = Todos::find($id);
            if (!$todo) {
                return response()->json(['message' => 'todo not found'], 400);
            } else {

                $data = $request->validated();
                $todo->update($data);
                $todo->save();

                return response()->json(['message' => 'todo updated successfully!'], 200);
            }
        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    public function delete($id)
    {
        try {
            $todo = Todos::find($id);
            if (!$todo) {
                return response()->json(['message' => 'todo not found'], 400);
            } else {
                $todo->delete();
                return response()->json(['message' => 'todo deleted successfully!'], 200);
            }

        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

}
