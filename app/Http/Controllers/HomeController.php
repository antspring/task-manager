<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupToUser;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index($id, Request $request){
        $groupName = '';
        $statuses = [];

        $tasks = Task::where('executor_id', $request->user()->id)->where('group_id', $id)->orderBy('status_id')->get();

        if (isset($tasks[0])){
            for ($i = 0; $i < $tasks[0]->status->count(); $i++){

                switch ($i){
                    case 0:
                        $statuses[$i] = $tasks[$i]->with('status')->where('status_id', Task::NEW_TASK)->get();
                        break;

                    case 1:
                        $statuses[$i] = $tasks[$i]->with('status')->where('status_id', Task::WORK_TASK)->get();
                        break;

                    case 2:
                        $statuses[$i] = $tasks[$i]->with('status')->where('status_id', Task::CONSIDERED_TASK)->get();
                        break;

                    case 3:
                        $statuses[$i] = $tasks[$i]->with('status')->where('status_id', Task::DONE_TASK)->get();
                        break;
                }
            }

            // TODO: насрано, надо испрввить

            $groupName = $tasks[0]->group->name;
        }
        else{

            return view('pages.index', compact('statuses','groupName'));
        }


        return view('pages.index', compact('statuses', 'groupName'));
    }

    public function personalArea(Request $request)
    {
        $groupToUser = GroupToUser::with('user')->where('user_id', $request->user()->id)->get();

        $tasks = Task::where('executor_id', $request->user()->id)->where('status_id', Task::NEW_TASK)->get();

        foreach ($groupToUser as $item){
            $newTasks[$item->group_id] = $tasks->where('group_id', $item->group_id)->count();
        }

        return view('pages.personal_area', compact('groupToUser', 'newTasks'));
    }
}
