<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        return view('pages.blog');
    }


    public function contact()
    {
        return view('pages.contact');
    }


    
}
