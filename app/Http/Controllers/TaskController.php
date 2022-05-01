<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupToUser;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createProject(Request $request)
    {
        $group = Group::create(['name' => $request->project_name]);

        $groupToUser = new GroupToUser();

        $groupToUser->user_id = $request->user()->id;
        $groupToUser->role_id = $groupToUser->adminRole();
        $groupToUser->group_id = $group->id;

        $groupToUser->save();

        return back();
    }
}
