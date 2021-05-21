<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\User;
use App\Models\Category;
use App\Models\Project;
use App\Models\Document;
use App\Models\CommentSection;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function team()
    {
        return view('pages.team');
    }

    public function blog()
    {
        return view('pages.blog-single');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function google_drive_upload(){
        return view('upload_page');
    }

    public function google_drive_view(Request $request){
        try {
            $file = $request->file('file');
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

            else if($ext=="pptx"){

                $url=substr($url, 31, $pos);
                $url=substr($url, 0, -13);
                $url="https://docs.google.com/presentation/d/".$url."/edit#slide=id.p1";

                //$url=str_replace("/document/","/presentation/",$url);
                //return $url;
            }
            //return $url;
            return view('upload_page_view',compact('url'));


          } catch (Exception $e) {
            dd($e);
          }
    }



    public function akash(){
        //$url="https://drive.google.com/uc?id=1T7tdTf5ytoViKBBJNsQV7xpcQGgmmKWx&export=media";
        //$url="https://drive.google.com/uc?id=1Rr4UY-s2zZmrXIOD8dxpqd8d0me7IQq3&export=media";

        //$url_2="https://docs.google.com/document/d/1T7tdTf5ytoViKBBJNsQV7xpcQGgmmKWx/edit#slide=id.p";

        $url="https://docs.google.com/document/d/1_Wv_xV2KiIAhySUXlcJJEGRidl_gi_yd/edit#slide=id.p";
        //$url_2="https://docs.google.com/presentation/d/1_Wv_xV2KiIAhySUXlcJJEGRidl_gi_yd/edit#slide=id.p1";

        $pos=strpos($url,"&export=media");

        if ($pos) {
            $url=substr($url, 31, $pos);
            $url=substr($url, 0, -13);
            $url="https://docs.google.com/document/d/".$url."/edit#slide=id.p1";
            //return $url;
        }

        else{

            $url=str_replace("/document/","/presentation/",$url);
            $url=$url."1";
            //$url="https://docs.google.com/presentation/d/".$url."/edit#slide=id.p1";
            //return $url;
        }
        //return $url;
        return view('akash',compact('url'));
    }


}
