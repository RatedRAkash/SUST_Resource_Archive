<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file= Documents::all();
        return view('documents.view',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Documents;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Documents::find($id);
        return view('documents.details',compact('data'));
    }

    public function download($id)
    {
        $data= Documents::find($id);
        return response()->download($data->file);
        //return response()->json($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
