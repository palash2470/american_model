<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //echo "test";die;
        $banners = HomeBanner::all();
        return view('index',compact('banners'));
    }
    public function aboutUs(){
        return view('about_us');
    }
}
