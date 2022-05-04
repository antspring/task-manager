<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupToUser;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index($id, Request $request)
    {
        $group = Group::where('id', $id)->first();

        $tasks = Task::where('executor_id', $request->user()->id)->where('group_id', $id)->orderBy('id', 'desc')->with('status');

        $newTasks = $tasks->where('status_id', Task::NEW_TASK)->get();

        $workTasks = $tasks->where('status_id', Task::WORK_TASK)->get();

        $consideredTask = $tasks->where('status_id', Task::CONSIDERED_TASK)->get();

        $doneTasks = $tasks->where('status_id', Task::DONE_TASK)->get();

        return view('pages.index', compact('newTasks', 'workTasks', 'consideredTask', 'doneTasks','group'));
    }

    public function personalArea(Request $request)
    {
        $newTasks = null;

        $groupToUser = GroupToUser::with('user')->where('user_id', $request->user()->id)->get();

        $tasks = Task::where('executor_id', $request->user()->id)->where('status_id', Task::NEW_TASK)->get();

        foreach ($groupToUser as $item){
            $newTasks[$item->group_id] = $tasks->where('group_id', $item->group_id)->count();
        }

        return view('pages.personal_area', compact('groupToUser', 'newTasks'));
    }
}
