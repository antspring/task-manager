<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupToUser;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function personalArea(Request $request)
    {
        $groupToUser = GroupToUser::with('user')->where('user_id', $request->user()->id)->get();

        $tasks = new Task();

        $tasks->where('executor_id', $request->user()->id)->where('status_id', $tasks->newTask())->get();

        foreach ($groupToUser as $item){
            $newTasks[$item->group_id] = $tasks->where('group_id', $item->group_id)->count();
        }

        return view('pages.personal_area', compact('groupToUser', 'newTasks'));
    }
}
