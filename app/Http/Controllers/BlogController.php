<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('blog.list');
    }

    public function details(){
        return view('blog.details');
    }
}
