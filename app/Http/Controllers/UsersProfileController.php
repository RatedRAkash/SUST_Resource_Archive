<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Category;
use App\Models\Project;
use App\Models\Document;
use App\Models\CommentSection;
use App\Models\ProjectRequest;
use App\Models\UserProfile;


class UsersProfileController extends Controller
{
    public function index()
    {
        $user_profiles=UserProfile::all();
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        $user_profile=UserProfile::findorfail($id);
        $projects=Project::where('user_id','=', $id)->get();

        return view('users_profile.view_user_profile',compact('user_profile','projects'));
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        $user_profile=UserProfile::findorfail($id);
        //$user_profile->image="asd";
        $user_profile->user_id=auth()->user()->id;
        $user_profile->category_id=$request->category_id;

        return view('users_profile.view_user_profile');
    }


    public function destroy($id)
    {

    }






    public function search()
    {

    }
}
