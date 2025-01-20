<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string',
            'title' => 'required|string',
            'priority' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $data = $request->all();

        $task = Task::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'start_date'=>$data['start_date'],
            'due_date' => $data['due_date'],
            'priority' => $data['priority'],
            'status' => $data['status'] ?? 'Incomplete',
        ]);

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

    /*
    public function generateNotifications(Request $request)
    {
        $data = $request->all();
        $userId = $data['user_id'] ?? null;

        if (!$userId) {
            return response()->json(['error' => 'User ID is required'], 400);
        }

        $tasks = Task::where('user_id', $userId)->where('status', 'Incomplete')->get();
        $currentDate = now();

        foreach ($tasks as $task) {
            $daysDifference = $task->due_date->diffInDays($currentDate);

            if (
                ($task->priority === 'High' && $daysDifference <= $data['highPriorityDays']) ||
                ($task->priority === 'Medium' && $daysDifference <= $data['mediumPriorityDays']) ||
                ($task->priority === 'Low' && $daysDifference <= $data['lowPriorityDays'])
            ) {
                Notification::firstOrCreate([
                    'task_id' => $task->id,
                ], [
                    'user_id' => $task->user_id,
                    'title' => $task->title,
                    'priority' => $task->priority,
                    'due_date' => $task->due_date,
                    'created_at' => $currentDate,
                ]);
            }
        }

        return response()->json(['message' => 'Notifications generated successfully']);
    }

    public function fetchNotifications(Request $request)
    {
        $userId = $request->query('userId');

        if (!$userId) {
            return response()->json(['error' => 'User ID is required'], 400);
        }

        $notifications = Notification::where('user_id', $userId)->get();

        return response()->json($notifications);
    }
        */
}
