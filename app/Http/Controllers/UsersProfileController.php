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

        $current_user_id=auth()->user()->id;

        if($user_profile->id==$current_user_id)
        {
            return view('users_profile.view_user_profile',compact('user_profile','projects'));
        }

        else
        {
            return view('pages.not_authorized');
        }

    }


    public function edit($id)
    {
        $user_profile=UserProfile::findorfail($id);
        $projects=Project::where('user_id','=', $id)->get();

        $current_user_id=auth()->user()->id;

        if($user_profile->id==$current_user_id)
        {
            return view('users_profile.edit_user_profile',compact('user_profile','projects'));
        }

        else
        {
            return view('pages.not_authorized');
        }


    }


    public function update(Request $request, $id)
    {
        $user_profile=UserProfile::findorfail($id);

        $image =$request->file('imageFile');

        if($image)
        {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/user_profile_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $user_profile->image=$image_url;
        }

        $user_profile->name=$request->textbox_name;
        $user_profile->phone_number=$request->textbox_phone;
        $user_profile->profession=$request->textbox_profession;
        $user_profile->address=$request->textbox_address;

        $user_profile->website_link=$request->textbox_website_link;
        $user_profile->github_link=$request->textbox_github_link;
        $user_profile->twitter_link=$request->textbox_twitter_link;
        $user_profile->instagram_link=$request->textbox_instagram_link;
        $user_profile->facebook_link=$request->textbox_facebook_link;

        $user_profile->save();

        return Redirect('/users_profile.show.'.$user_profile->user_id);
    }


    public function destroy($id)
    {

    }






    public function search()
    {

    }
}
