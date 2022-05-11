<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserToProjectRequest;
use App\Models\Group;
use App\Models\GroupToUser;
use App\Models\User;
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

    public function updateGroup($id, Request $request)
    {
        $group = Group::find($id);

        $group->update(['description' => $request->description]);

        return back();
    }


    public function searchUsers(Request $request)
    {
        $input = $request->get("login");

        $users = User::where("login","LIKE","{$input}%")->get();

        return response()->json($users);
    }


    public function addUserToProject(AddUserToProjectRequest $request)
    {
        $groupToUser = new GroupToUser();

        $userId = User::where("login", $request->login)->value('id');

        $groupToUser->user_id = $userId;
        $groupToUser->role_id = $groupToUser::USER;
        $groupToUser->group_id = $request->group_id;
        $groupToUser->save();

        return back();
    }
}
