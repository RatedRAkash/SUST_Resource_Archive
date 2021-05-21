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
        $category=Category::all();
        return view('projects.create_project',compact('category'));
    }


    public function store(Request $request)
    {
        $data=new Project;
        $data->project_name=$request->project_name;
        $data->user_id=auth()->user()->id;
        $data->category_id=$request->category_id;
        $data->project_description=$request->project_description;
        $data->project_abstract=$request->project_abstract;

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
        $category=Category::all();

        return view('projects.edit_project',compact('project','category'));
    }


    public function update(Request $request, $id)
    {
        $data=Project::findorfail($id);

        $data->user_id=auth()->user()->id;
        $data->project_name=$request->project_name;
        //$data->project_name=$request->name('project_name');

        $data->category_id=$request->category_id;
        $data->project_description=$request->project_description;
        $data->project_abstract=$request->project_abstract;



        $image=$request->image;
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


        $file = $request->file('pdf_file');
        if($file)
        {
            try {
                //$file = $request->file('presentation_file');
                $ext=strtolower($file->getClientOriginalExtension());

                \Storage::disk('google')->put($file->getClientOriginalName().'', fopen($file, 'r+'));
                $url = \Storage::disk('google')->url($file->getClientOriginalName().'');

                //return $url;
                $pos=strpos($url,"&export=media");

                if($ext=="docx") {
                    $url=substr($url, 31, $pos);
                    $url=substr($url, 0, -13);
                    $url="https://docs.google.com/document/d/".$url."/edit#slide=id.p1";
                    //return $url;
                }

                else if($ext=="pptx") {

                    $url=substr($url, 31, $pos);
                    $url=substr($url, 0, -13);
                    $url="https://docs.google.com/presentation/d/".$url."/edit#slide=id.p1";

                    //$url=str_replace("/document/","/presentation/",$url);
                    //return $url;
                }
                //return $url;
                //return view('upload_page_view',compact('url'));
                $data->presentation_slide_url=$url;

            } catch (Exception $e) {
                $data->presentation_slide_url=NULL;
            }
        }


        $file = $request->file('presentation_file');
        if($file)
        {
            try {
                //$file = $request->file('presentation_file');
                $ext=strtolower($file->getClientOriginalExtension());

                \Storage::disk('google')->put($file->getClientOriginalName().'', fopen($file, 'r+'));
                $url = \Storage::disk('google')->url($file->getClientOriginalName().'');

                //return $url;
                $pos=strpos($url,"&export=media");

                if($ext=="docx") {
                    $url=substr($url, 31, $pos);
                    $url=substr($url, 0, -13);
                    $url="https://docs.google.com/document/d/".$url."/edit#slide=id.p1";
                    //return $url;
                }

                else if($ext=="pptx") {

                    $url=substr($url, 31, $pos);
                    $url=substr($url, 0, -13);
                    $url="https://docs.google.com/presentation/d/".$url."/edit#slide=id.p1";

                    //$url=str_replace("/document/","/presentation/",$url);
                    //return $url;
                }
                //return $url;
                //return view('upload_page_view',compact('url'));
                $data->presentation_slide_url=$url;

            } catch (Exception $e) {
                $data->presentation_slide_url=NULL;
            }
        }

        $data->save();

        //return response()->json($data);

        if($data){
            //return Redirect()->back();
            return Redirect('/projects.show.'.$data->user_id);
        }


    }



    public function destroy($id)
    {
        $project=Project::findorfail($id);
        $project->delete();
        return Redirect('/projects');
    }


    public function search()
    {
        $search_text=$_GET['query'];
        $projects=Project::where('project_name','LIKE', '%'.$search_text.'%')->get();
        return view('projects.all_project',compact('projects','search_text'));
    }


}
