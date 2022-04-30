<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupToUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function personalArea(Request $request)
    {
        $groupToUser = GroupToUser::where('user_id', $request->user()->id)->get();

        return view('pages.personal_area', compact('groupToUser'));
    }
}
