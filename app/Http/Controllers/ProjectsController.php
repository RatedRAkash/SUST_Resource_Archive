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
use App\Models\Favorite;
use App\Models\Rating;
use Auth;

class ProjectsController extends Controller
{

    public function index()
    {
        $projects=Project::paginate(5);
        $categories=Category::all();


        $project_latest = Project::orderBy('id', 'desc')->take(7)->get();

        if(!Auth::guest())
        {
            $favorites=Favorite::where('user_id','=',auth()->user()->id)
                                            ->get();//LIST return kore... tai "0"th element access korar jonno [0] dibo
        }

        else
        {
            $favorites=array();
        }


        //return response()->json($project);
        return view('projects.all_project',compact('projects','categories','project_latest','favorites'));
    }


    public function create()
    {
        $category=Category::all();
        $all_users=User::all();

        return view('projects.create_project',compact('category','all_users'));
    }


    public function store(Request $request)
    {
        $data=new Project;
        $data->project_name=$request->project_name;
        $data->user_id=auth()->user()->id;
        $data->category_id=$request->category_id;
        $data->project_description=$request->project_description;
        $data->project_abstract=$request->project_abstract;

        $data->project_or_thesis=$request->option_project_or_thesis;
        $data->workspace_type=$request->option_workspace_type;
        $data->average_rating=0;


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

        else
        {
            $data->image="default_images/project_no_image.png";
        }

        $data->save();

        //ACCESS To Partner & Supervisor
        if($request->partner_id)
        {
            $project_request=new ProjectRequest;
            $project_request->project_id=$data->id;
            $project_request->owner_id=auth()->user()->id;;
            $project_request->request_user_id=$request->partner_id;
            $project_request->access_code=1;
            $project_request->save();

            $data->partner_id=$request->partner_id;
        }


        if($request->supervisor_id)
        {
            $project_request=new ProjectRequest;
            $project_request->project_id=$data->id;
            $project_request->owner_id=auth()->user()->id;;
            $project_request->request_user_id=$request->supervisor_id;
            $project_request->access_code=1;
            $project_request->save();

            $data->supervisor_id=$request->supervisor_id;
        }

        $data->save();

        //END ACCESS


        //return response()->json($data);

        return Redirect('/projects.show.'.$data->id);
    }


    public function show($id)
    {
        $project=Project::findorfail($id);

        $comments=CommentSection::where('project_id','=', $id)->get();

        if(Auth::guest())
        {
            $project_request=NULL;
        }

        else
        {
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
        }


        $project_rating=Rating::where('user_id','=',$current_user_id)
                                ->where('project_id','=',$id)
                                ->get();

        if($project_rating != '[]')
        {
            $project_rating=$project_rating[0];
        }


        return view('projects.view_project',compact('project','comments', 'project_request','project_rating'));

    }



    public function edit($id)
    {
        $project=Project::findorfail($id);

        $current_user_id=auth()->user()->id;

        $comments=CommentSection::where('project_id','=', $id)->get();

        $project_request=ProjectRequest::where('project_id','=',$id)
                                            ->where('request_user_id','=',$current_user_id)
                                            ->get();//LIST return kore... tai "0"th element access korar jonno [0] dibo


        if($project_request != '[]')
        {
            $project_request=$project_request[0];
        }

        if($project->user_id == $current_user_id)
        {
            $category=Category::all();

            return view('projects.edit_project',compact('project','category','comments'));
        }

        else if($project_request->access_code==1)
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

        //$data->user_id=auth()->user()->id;
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
        else
        {
            $data->image="default_images/project_no_image.png";
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

        $link_to_dataset_url = $request->link_to_dataset;
        if($link_to_dataset_url)
        {
            $data->link_to_dataset=$link_to_dataset_url;
        }

        else
        {
            $data->link_to_dataset=NULL;
        }


        $data->save();

        //return response()->json($data);
        if($data){
            //return Redirect()->back();
            return Redirect('/projects.show.'.$id);
        }


    }



    public function destroy($id)
    {
        $project=Project::findorfail($id);
        $current_user_id=auth()->user()->id;

        $project_requests=ProjectRequest::where('project_id','=',$id)->get();

        if($project->user_id == $current_user_id)
        {
            if($project_requests)
            {
                foreach($project_requests as $row)
                {
                    $row->delete();
                }

            }
            $project->delete();
            return Redirect('/projects');
        }

        else
        {
            return view('pages.not_authorized');
        }
    }









    //NORMAL PROJECTS SEARCH
    public function search()
    {
        $search_text=$_GET['query'];
        $projects=Project::where('project_name','LIKE', '%'.$search_text.'%')->paginate(5);

        $categories=Category::all();
        $project_latest = Project::orderBy('id', 'desc')->take(7)->get();

        return view('projects.all_project',compact('projects','categories','project_latest','search_text'));
    }

    //PROJECTS COMMENTS
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

    //PROJECTS REQUESTS
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
        return Redirect('/projects.show.'.$id);
        //return view('projects/my_project_requests',compact('user','project_request'));
    }


    public function show_the_user_project_request()
    {
        $user=User::findorfail(auth()->user()->id);

        $project_request=ProjectRequest::where('owner_id','=',$user->id)->get();

        //return response()->json($data);
        if($user)
        {
            return view('projects/project_requests_show',compact('user','project_request'));
        }

        else
        {
            return view('pages.not_authorized');
        }

    }

    //GIVE ACCESS TO PROJECT
    public function give_user_access($request_user_id,$owner_id,$access_code)
    {
        $project_request=ProjectRequest::where('owner_id','=',$owner_id)
                                         ->where('request_user_id','=',$request_user_id)
                                         ->get();//LIST return kore... tai "0"th element access korar jonno [0] dibo

        $project_request[0]->access_code=$access_code;
        $project_request[0]->save();

        return Redirect('/project_requests');

    }


    //MY PROJECTS SHOW
    public function my_projects_show($id)
    {
        $user=User::findorfail($id);

        $categories=Category::all();

        $project_latest = Project::orderBy('id', 'desc')->take(7)->get();

        $projects=Project::where('user_id','=',$id)->paginate(5);//LIST return kore... tai "0"th element access korar jonno [0] dibo


        return view('projects/my_project',compact('projects','categories','project_latest'));
    }


    //MORE FILTERS PROJECT
    public function more_filter_projects()
    {
        $categories=Category::all();

        $users=User::all();

        $project_latest = Project::orderBy('id', 'desc')->take(7)->get();

        $projects=Project::all();//LIST return kore... tai "0"th element access korar jonno [0] dibo

        return view('projects/more_filter_all_project',compact('users','projects','categories','project_latest'));
    }



    public function search_more_filter_projects()
    {
        $categories=Category::all();
        $users=User::all();
        $projects=Project::all();

        $search_text=$_GET['query'];

        $projects=Project::where('project_name','LIKE', '%'.$search_text.'%')->get();

        $project_latest=Project::orderBy('id', 'desc')->take(7)->get();

        return view('projects/more_filter_all_project',compact('users','projects','categories','project_latest','search_text'));
    }



    public function search_side_bar_more_filter_projects()
    {
        $search_category="";
        $search_user="";

        if(isset($_GET['search_category']))
        {
            $search_category=$_GET['search_category'];
            $projects=Project::where('category_id','=', $search_category)->get();
        }

        if(isset($_GET['search_user']))
        {
            $search_user=$_GET['search_user'];
            $projects=Project::where('user_id','=', $search_user)->get();
        }

        $users=User::all();
        $categories=Category::all();

        return view('projects/more_filter_all_project',compact('users','projects','categories','search_category','search_user'));
    }

    public function order_by_more_filter_projects($key)
    {
        $projects=Project::all();
        $projects=$projects->sortBy($key);

        $users=User::all();
        $categories=Category::all();

        return view('projects/more_filter_all_project',compact('users','projects','categories'));
    }





    //PROJECT FAVORITES
    public function store_project_favorite(Request $request,$id)
    {
        $project=Project::findorfail($id);
        $user=User::findorfail(auth()->user()->id);

        $favorite=Favorite::where('user_id','=',$user->id)
                                        ->where('project_id','=',$project->id)
                                        ->get();

        if($favorite!='[]')
        {
            $favorite=$favorite[0];
            $favorite->delete();
            // if($favorite->flag_favorite==0)
            // {
            //     $favorite->flag_favorite=1;
            // }

            // else
            // {
            //     $favorite->flag_favorite=0;
            // }

            // $favorite->save();
        }

        else
        {
            $favorite=new Favorite;
            $favorite->project_id=$id;
            $favorite->user_id=auth()->user()->id;
            $favorite->flag_favorite=1;

            $favorite->save();
        }

        //return response()->json($data);
        return Redirect('/projects');
    }


    //My FAVORITE PROJECTS
    public function show_the_user_project_favorites()
    {
        $id=auth()->user()->id;
        $user=User::findorfail($id);

        $categories=Category::all();

        $project_latest = Project::orderBy('id', 'desc')->take(7)->get();

        $favorites=Favorite::where('user_id','=',$user->id)->get();

        $projects = array();

        foreach($favorites as $favorite)
        {
            $project=Project::where('id','=',$favorite->project_id)->get();
            array_push($projects, $project[0]);
        }

        return view('projects/my_favorite_project',compact('projects','categories','project_latest','favorites'));
    }


    //PROJECT RATING STORE
    public function store_project_rating(Request $request,$id)
    {
        $project=Project::findorfail($id);

        $project_rating=Rating::where('user_id','=',auth()->user()->id)
                                ->where('project_id','=',$id)
                                ->get();
        if($project_rating == '[]')
        {
            $project_rating=new Rating;
            $project_rating->project_id=$id;
            $project_rating->user_id=auth()->user()->id;
            $project_rating->rating=$request->rating;
            $project_rating->save();
        }

        else
        {
            $project_rating=$project_rating[0];
            $project_rating->rating=$request->rating;
            $project_rating->save();
        }

        //AVERAGE RATING CALCULATE
        $project_rating=Rating::where('project_id','=',$id)
                                ->get();

        $coun=0;
        $sum=0;
        foreach($project_rating as $row)
        {
            $coun=$coun+1;
            $sum=$sum+$row->rating;
        }
        // echo($sum/$coun);
        // return;
        $project->average_rating=(int)($sum/$coun);
        $project->save();

        //return response()->json($data);
        return Redirect('/projects.show.'.$id);
    }

}
