<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\User;
use App\Models\Category;
use App\Models\Project;
use App\Models\Document;
use App\Models\CommentSection;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories=Category::all();
        //return response()->json($project);
        return view('categories.all_category',compact('categories'));
    }


    public function create()
    {
        return view('categories.create_category');
    }


    public function store(Request $request)
    {
        $data=new Category;
        $data->user_id=auth()->user()->id;
        $data->id=$request->id;
        $data->category_name=$request->category_name;
        $data->category_description=$request->category_description;

        $image =$request->file('image');

        if($image)
        {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/category_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data->image=$image_url;
        }

        $data->save();

        //return response()->json($data);

        return Redirect('/categories');
    }


    public function show($id)
    {
        $category=Category::findorfail($id);
        return view('categories.view_category',compact('category'));
    }


    public function edit($id)
    {
        $category=Category::findorfail($id);
        return view('categories.edit_category',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $data=Category::findorfail($id);

        $data->id=$request->id;
        $data->user_id=auth()->user()->id;
        $data->category_name=$request->category_name;
        $data->category_description=$request->category_description;

        $data->save();
        //return response()->json($data);

        if($category){
            //return Redirect()->back();
            return Redirect('/categories');
        }
    }


    public function destroy($id)
    {
        $category=Category::findorfail($id);
        $category->delete();
        return Redirect('/categories');
    }
}
