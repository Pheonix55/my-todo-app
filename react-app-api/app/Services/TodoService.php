<?php

namespace App\Services;

use App\Models\Todos;

class TodoService
{
    public function getAllTodos()
    {
        return Todos::with('user')->latest()->paginate(10);
    }
    public function getAllUnfinishedTodos()
    {
        return Todos::with('user')->latest()->where('is_done', 0)->paginate(10);
    }


    public function createTodo(array $data)
    {
        $data['created_by'] = 1;//for testing only will set it to auth()->id
        return Todos::create($data);
    }

    public function updateTodo(array $data, $todo)
    {
        if (isset($data['title'])) {
            $todo->title = $data['title'];
        }
        if (isset($data['description'])) {
            $todo->description = $data['description'];
        }
        if (isset($data['is_done'])) {
            $todo->is_done = $data['is_done'];
        }
        $todo->save();
        return $todo;
    }

    public function getTodoById($id)
    {
        return Todos::findOrFail($id);
    }
}
