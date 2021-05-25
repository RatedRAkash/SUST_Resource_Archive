<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\User;
use App\Models\Category;
use App\Models\Project;
use App\Models\Document;
use App\Models\CommentSection;
use App\Models\ProjectRequest;
use App\Models\UserProfile;

class ProjectsController extends Controller
{

    public function index()
    {
        $projects=Project::all();
        $categories=Category::all();

        $project_latest = Project::orderBy('id', 'desc')->take(7)->get();

        //return response()->json($project);
        return view('projects.all_project',compact('projects','categories','project_latest'));
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

        $comments=CommentSection::where('project_id','=', $id)->get();

        $current_user_id=auth()->user()->id;

        $project_request=ProjectRequest::where('project_id','=',$id)
                                         ->where('request_user_id','=',$current_user_id)
                                         ->get();//LIST return kore... tai "0"th element access korar jonno [0] dibo

        //If tokon sotti hobe jokon kono USER nijer toiri PROJECT ee dhuke
        if($project_request->isEmpty())
        {
            $project_request=ProjectRequest::where('project_id','=',$id)
                                            ->where('owner_id','=',$current_user_id)
                                            ->get();
        }

        //QUERY a COLLECTION of Object RETURN kore... tai amra 1st Element ke return korbo
        else
        {
            $project_request=$project_request[0];
        }


        return view('projects.view_project',compact('project','comments', 'project_request'));

    }



    public function edit($id)
    {
        $project=Project::findorfail($id);

        $current_user_id=auth()->user()->id;

        $comments=CommentSection::where('project_id','=', $id)->get();

        if($project->user_id == $current_user_id)
        {
            $category=Category::all();

            return view('projects.edit_project',compact('project','category','comments'));
        }

        else
        {
            return view('pages.not_authorized');
        }

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


        $image =$request->file('imageFile');
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
            $file_name=hexdec(uniqid());
            $ext=strtolower($file->getClientOriginalExtension());
            $file_full_name=$file_name.'.'.$ext;
            $upload_path='project_paper_pdf/';
            $file_url=$upload_path.$file_full_name;
            $success=$file->move($upload_path,$file_full_name);
            $data->paper_pdf_url=$file_url;
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
        $current_user_id=auth()->user()->id;

        if($project->user_id == $current_user_id)
        {
            $project->delete();
            return Redirect('/projects');
        }

        else
        {
            return view('pages.not_authorized');
        }

    }











    public function search()
    {
        $search_text=$_GET['query'];
        $projects=Project::where('project_name','LIKE', '%'.$search_text.'%')->get();
        return view('projects.all_project',compact('projects','search_text'));
    }


    public function store_comment(Request $request, $id)
    {

        $data=new CommentSection;
        $data->project_id=$id;
        $data->user_id=auth()->user()->id;
        $data->comment_text=$request->comment_text;

        $data->save();


        //return response()->json($data);
        return Redirect('/projects.show.'.$id);
    }


    public function store_project_request($id)
    {
        $project=Project::findorfail($id);
        $user=User::findorfail($project->user_id);

        $data=new ProjectRequest;

        $data->project_id=$id;
        $data->owner_id=$project->user_id;
        $data->request_user_id=auth()->user()->id;
        $data->access_code=0;

        $data->save();

        $project_request=ProjectRequest::where('owner_id','=',$user->id)->get();

        //return response()->json($data);
        return view('projects/my_project_requests',compact('user','project_request'));
    }



    public function show_the_user_project_request()
    {
        $user=User::findorfail(auth()->user()->id);

        $project_request=ProjectRequest::where('owner_id','=',$user->id)->get();

        //return response()->json($data);
        if($user)
        {
            return view('projects/my_project_requests',compact('user','project_request'));
        }

        else
        {
            return view('pages.not_authorized');
        }

    }

    public function give_user_access($request_user_id,$owner_id,$access_code)
    {
        $project_request=ProjectRequest::where('owner_id','=',$owner_id)
                                         ->where('request_user_id','=',$request_user_id)
                                         ->get();//LIST return kore... tai "0"th element access korar jonno [0] dibo

        $project_request[0]->access_code=$access_code;
        $project_request[0]->save();

        return Redirect('/project_requests');

    }

}
