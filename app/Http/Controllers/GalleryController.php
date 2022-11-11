<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
       $albums = GalleryAlbum::all();
       return view('gallery.album',compact('albums'));
    }
    public function getImageByAlbum($id){
        $gallery_images = Gallery::where('album_id',$id)->paginate(12);  
        return view('gallery.image',compact('gallery_images'));
    }
    
   

}
