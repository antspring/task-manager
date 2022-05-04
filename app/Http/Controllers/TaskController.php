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
}
