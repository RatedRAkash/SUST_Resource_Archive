<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\User;
use App\Models\Category;
use App\Models\Project;
use App\Models\Document;

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
        $data->id=$request->id;
        $data->category_name=$request->category_name;
        $data->category_description=$request->category_description;

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
