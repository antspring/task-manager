<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupToUser;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function createGroup(Request $request)
    {
        $group = Group::create(['name' => $request->group_name]);

        $groupToUser = new GroupToUser();

        $groupToUser->user_id = $request->user()->id;
        $groupToUser->role_id = $groupToUser::ADMIN;
        $groupToUser->group_id = $group->id;

        $groupToUser->save();

        return back();
    }
}
