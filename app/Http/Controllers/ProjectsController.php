<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\User;
use App\Models\Category;
use App\Models\Project;
use App\Models\Document;

class ProjectsController extends Controller
{

    public function index()
    {
        $projects=Project::all();
        //return response()->json($project);
        return view('projects.all_project',compact('projects'));
    }


    public function create()
    {
        return view('projects.create_project');
    }


    public function store(Request $request)
    {
        $data=new Project;
        $data->project_name=$request->project_name;
        $data->category_id=1;
        $data->project_description=$request->project_description;

        $image =$request->file('image');

        if($image)
        {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/project_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data->image=$image_url;
        }

        $data->save();


        //return response()->json($data);

        return Redirect('/projects');

    }


    public function show($id)
    {
        $project=Project::findorfail($id);
        return view('projects.view_project',compact('project'));
    }


    public function edit($id)
    {
        $project=Project::findorfail($id);
        return view('projects.edit_project',compact('project'));
    }


    public function update(Request $request, $id)
    {
        $data=Project::findorfail($id);;
        $data->project_name=$request->project_name;
        $data->category_id=1;
        $data->project_description=$request->project_description;

        $image =$request->image;

        if($image)
        {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/project_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data->image=$image_url;
        }

        $data->save();

        //return response()->json($data);

        if($data){
            //return Redirect()->back();
            return Redirect('/projects');
        }
    }


    public function destroy($id)
    {
        $project=Project::findorfail($id);
        $project->delete();
        return Redirect('/projects');
    }


}
