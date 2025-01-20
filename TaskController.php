<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTasks(Request $request)
    {
        $userId = $request->query('userId');

        if (!$userId) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $tasks = Task::where('user_id', $userId)->get();

        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No tasks found for this user'], 404);
        }

        return response()->json($tasks);
    }

    public function addTask(Request $request)
    {
        $userId = $request->input('user_id');
        if (!$userId) {
            return response()->json(['error' => 'UserId is missing.'], 401);
        }

        $request->validate([
            'title' => 'required|string',
            'priority' => 'required|string',
        ]);

        $task = new Task([
            'user_id' => $userId,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'priority' => $request->input('priority'),
            'status' => $request->input('status', 'Incomplete'),
        ]);

        $task->save();

        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
    }

    public function updateTask(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->update($request->all());

        return response()->json($task);
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
