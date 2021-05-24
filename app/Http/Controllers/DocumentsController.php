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

class DocumentsController extends Controller
{

    public function index()
    {
        $file= Document::all();
        return view('documents.view',compact('file'));
    }


    public function create()
    {
        return view('documents.create');
    }


    public function store(Request $request)
    {
        $data=new Document;
        // if($request->file('file')){
        //     $file=$request->file('file');
        //     $filename=time().'.'.$file->getClientOriginalExtension();
        //     $request->file->move('storage/',$filename);

        //     $data->file=$filename;
        // }


        $file =$request->file('file');

        if($file)
        {
            $file_name=hexdec(uniqid());
            $ext=strtolower($file->getClientOriginalExtension());
            $file_full_name=$file_name.'.'.$ext;
            $upload_path='storage/';
            $file_url=$upload_path.$file_full_name;
            $success=$file->move($upload_path,$file_full_name);
            $data['file']=$file_url;
        }


        $data->title=$request->title;
        $data->description=$request->description;

        $data->save();


        return redirect()->back();

    }


    public function show($id)
    {
        $data= Document::find($id);
        return view('documents.details',compact('data'));
    }

    public function download($id)
    {
        $data= Document::find($id);
        return response()->download($data->file);
        //return response()->json($data);

    }


    public function edit($id)
    {
        $data= Document::find($id);
        return view('documents.details',compact('data'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
