<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupToUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {
        $executor = User::where('login', $request->executor)->first();

        $data = [
            'executor_id' => $executor->id,
            'creator_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'status_id' => Task::NEW_TASK,
            'priority_id' => Task::LOW_PRIORITY,
            'group_id' => $request->group_id
        ];

        Task::create($data);

        return back();
    }

    public function getTask(Request $request)
    {
        $task = Task::where('id', $request->task_id)->first();

        return response()->json($task);
    }

    public function updateTask(Request $request)
    {
        $data = $request->all();

        $task = Task::find($data['task_id']);

        $task->update($data);

        return back();
    }

    public function deleteTask(Request $request)
    {
        $task = Task::where('id', $request->task_id)->first();

        $task->delete();

        return back();
    }

    public function searchUsers(Request $request)
    {
        $result= [];

        $groupToUsers = GroupToUser::where('group_id',$request->groupId)->get();

        foreach ($groupToUsers as $user) {
            $result[] = User::where('id',$user->user_id)->first();
        }

        return response()->json($result);
    }

    public function changeStatus(Request $request)
    {
        $task = Task::findOrFail($request->task_id);

        $task->update(['status_id' => $request->status_id]);
    }
}
