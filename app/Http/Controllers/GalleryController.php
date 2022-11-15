<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryAlbum;
use App\Models\ImageCategory;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GalleryController extends Controller
{
    public function index(Request $request){
        if($request->has('search_key') && !empty($request->search_key)){
            $image_categories = ImageCategory::with('images')->where('status',1)->where('name',$request->search_key)->get()->sortByDesc(function($ImageCategory)
                {
                    return $ImageCategory->images->count();
                });
        }else{
            $image_categories = ImageCategory::with('images')->where('status',1)->get()->sortByDesc(function($ImageCategory)
                {
                    return $ImageCategory->images->count();
                });
        }

       return view('gallery.showcase',compact('image_categories','request'));
    }
    public function getImageByImageCatId(Request $request, $id){
        //echo $id;die;
        $image_category = ImageCategory::find($id);
        $images = Images::where('category',$id)->paginate(10);
        $image_data = '';
        $popup_img_load = '';
        if ($request->ajax()) {
            foreach ($images as $image) {
                $image_data.='<div class="masonry-item photo_view" data-photo="photo_'.$image->id.'">
                <img class="img-block" src="'.url('img/user/images/'.$image->image).'">
                </div>';

                /* $popup_img_load.= '<div id="photo_'.$image->id.'" class="photo-list">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                                            <div class="popup-img">
                                            <img class="img-block photo_Height" src="'.url('img/user/images/'.$image->image).'">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                                            <div class="ftr-cmnt photo_Height">
                                                <div class="photo-comments-main">
                                                    <div class="photo-comments" id="photo_cmt_'.$image->id.'">
                                                    </div>
                                                    <div class="msg-cmnt when-fixed">
                                                        <form  action="'.route('photo.comment.store').'" method="post" class="photo_comment">
                                                            @csrf
                                                            <div class="profile-input-wrap">
                                                                <input type="text" class="form-control profile-input-style" name="comment" placeholder="Type your comment" id="comment">
                                                                <input type="hidden" name="photo_id" value="'.Crypt::encrypt($image->id).'">
                                                                <span class="profile-input-btn-wrap">
                                                                    <button class="profile-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                                </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>'; */
            }
            //return $image_data;
            $view = view('gallery.image_popup_data',compact('images','image_category'))->render();
            return response()->json(['image_data'=>$image_data,'data_count'=>$images->count(),'popup_html'=>$view]);
    		
            //return response()->json(['html'=>$view,'data_count'=>$images->count()]);
        }  
        return view('gallery.showcase_image',compact('images','image_category'));
    }

    public function getNewImages(Request $request){
        $images = Images::orderBy('id','DESC')->paginate(10);
        $image_data = '';
        $popup_img_load = '';
        if ($request->ajax()) {
            foreach ($images as $image) {
                $image_data.='<div class="masonry-item photo_view" data-photo="photo_'.$image->id.'">
                <img class="img-block" src="'.url('img/user/images/'.$image->image).'">
                </div>';
            }
            //return $image_data;
            $view = view('gallery.image_popup_data',compact('images'))->render();
            return response()->json(['image_data'=>$image_data,'data_count'=>$images->count(),'popup_html'=>$view]);
    		
            //return response()->json(['html'=>$view,'data_count'=>$images->count()]);
        }  
        return view('gallery.new_image',compact('images'));
    }

    public function getFeaturedModelImages(Request $request){
        $images = Images::whereHas('user', function ($query) {
            $query->where('feature_model', 1);
        })->orderBy('id','DESC')->paginate(10);
        $image_data = '';
        $popup_img_load = '';
        if ($request->ajax()) {
            foreach ($images as $image) {
                $image_data.='<div class="masonry-item photo_view" data-photo="photo_'.$image->id.'">
                <img class="img-block" src="'.url('img/user/images/'.$image->image).'">
                </div>';
            }
            //return $image_data;
            $view = view('gallery.image_popup_data',compact('images'))->render();
            return response()->json(['image_data'=>$image_data,'data_count'=>$images->count(),'popup_html'=>$view]);
    		
            //return response()->json(['html'=>$view,'data_count'=>$images->count()]);
        }  
        return view('gallery.featured_model_image',compact('images'));
    }
    
    public function getFeaturedPhotographersImages(Request $request){
        $images = Images::whereHas('user', function ($query) {
            $query->where('feature_photographer', 1);
        })->orderBy('id','DESC')->paginate(10);
        $image_data = '';
        $popup_img_load = '';
        if ($request->ajax()) {
            foreach ($images as $image) {
                $image_data.='<div class="masonry-item photo_view" data-photo="photo_'.$image->id.'">
                <img class="img-block" src="'.url('img/user/images/'.$image->image).'">
                </div>';
            }
            //return $image_data;
            $view = view('gallery.image_popup_data',compact('images'))->render();
            return response()->json(['image_data'=>$image_data,'data_count'=>$images->count(),'popup_html'=>$view]);
    		
            //return response()->json(['html'=>$view,'data_count'=>$images->count()]);
        }  
        return view('gallery.featured_photographer_image',compact('images'));
    } 

    public function autoCompleteImageCategory(Request $request){
        $image_categories = ImageCategory::where('name','LIKE','%'.$request->q.'%')->limit(10)->get(["name", "id"]);
        $response = array();
        if(count($image_categories) > 0){
            foreach($image_categories as $category){
            $response[] = array("value"=>$category->id,"label"=>$category->name);
            }
        }
        return response()->json($response);
    }
}
