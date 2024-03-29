<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\GroupToUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createTask(CreateTaskRequest $request)
    {
        $executor = User::where('login', $request->executor)->first();
        Task::create([
            'executor_id' => $executor->id,
            'creator_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'status_id' => Task::NEW_TASK,
            'priority_id' => $request->priority_id,
            'group_id' => $request->group_id
        ]);

        return back()->with('success','Действие успешно выполнено');
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

        return back()->with('success','Действие успешно выполнено');
    }

    public function deleteTask(Request $request)
    {
        $task = Task::where('id', $request->task_id)->first();

        $task->delete();

        return back()->with('success','Действие успешно выполнено');
    }

    public function searchGroupUsers(Request $request)
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

    public function searchTasks(Request $request)
    {
        return Task::where('title', 'LIKE', "%{$request->title_task}%")->get();
    }
}
