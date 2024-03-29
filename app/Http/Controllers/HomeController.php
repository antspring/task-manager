<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupToUser;
use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($slug, Request $request)
    {
        $newTasks = [];
        $workTasks = [];
        $consideredTask = [];
        $doneTasks = [];

        $group = Group::where('slug', $slug)->with('groupToUser')->firstOrFail();

        $priority = Priority::all();

        $tasks = Task::where('group_id', $group->id)->latest('id')->with('executor')->get();

        foreach ($tasks as $task) {
            switch ($task->status_id){
                case Task::NEW_TASK:
                    $newTasks[] = $task;
                    break;

                case Task::WORK_TASK:
                    $workTasks[] = $task;
                    break;

                case Task::CONSIDERED_TASK:
                    $consideredTask[] = $task;
                    break;

                case Task::DONE_TASK:
                    $doneTasks[] = $task;
                    break;
            }
        }

        return view('pages.index', compact('newTasks', 'workTasks', 'consideredTask', 'doneTasks', 'group', 'priority'));
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
