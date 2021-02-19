<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProjectsController extends Controller
{

    public function index()
    {
        $projects=DB::table('projects')->get();
        //return response()->json($project);
        return view('projects.all_project',compact('projects'));
        //return view('pages.projects');
    }


    public function create()
    {
        return view('projects.create_project');
    }


    public function store(Request $request)
    {
        $data=array();
        $data['project_name']=$request->project_name;
        $data['category_id']=1;
        $data['project_description']=$request->project_description;


        $image =$request->file('image');

        if($image)
        {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/project_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
        }




        DB::table('projects')->insert($data);
        //return response()->json($data);

        return Redirect('/projects');

    }


    public function show($id)
    {
        $project=DB::table('projects')->where('id',$id)->first();
        return view('projects.view_project',compact('project'));
    }


    public function edit($id)
    {
        $project=DB::table('projects')->where('id',$id)->first();
        return view('projects.edit_project',compact('project'));
    }


    public function update(Request $request, $id)
    {
        $data=array();
        $data['project_name']=$request->project_name;
        $data['category_id']=1;
        $data['project_description']=$request->project_description;
        $data['image']="akash";

        $project=DB::table('projects')->where('id',$id)->update($data);
        //return response()->json($data);

        if($project){
            //return Redirect()->back();
            return Redirect('/projects');
        }
    }


    public function destroy($id)
    {
        $delete=DB::table('projects')->where('id',$id)->delete();
        return Redirect('/projects');
    }


}
