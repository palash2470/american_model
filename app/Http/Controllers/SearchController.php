<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Ethnicity;
use App\Models\Weight;
use App\Models\HairLenth;
use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    public function search(Request $request,$category_slug){
        //dd($request->all());
        //$colours = Colour::all();
        $ethnicities = Ethnicity::all();
        $weights = Weight::all();
        $hairLenths = HairLenth::all();
        $modelArr = ['models','actors','child-model-and-actor'];
        //$otherArr = ['photographer'];
        $category = Category::where('slug',$category_slug)->first();
        //echo $category->id;die;
        $users = User::where('membership_id',$category->id)
            ->where('is_subscribe',1)
            ->whereHas('userDetails', function ($query) use ($request,$category) {
                $query->where('membership_type_id', $category->id);
                if($request->has('name') && !empty($request->name)){
                    $query->where('name','LIKE','%'.$request->name.'%');
                }
                if($request->has('age') && !empty($request->age)){
                    $year = Carbon::today()->subYears($request->age)->endOfDay();
                    $query->whereYear('dob','=',$year);  
                }
                if($request->has('gender') && !empty($request->gender)){
                    $query->where('gender',$request->gender);  
                }
                if($request->has('height') && !empty($request->height)){
                    $query->where('height',$request->height);  
                }
                if($request->has('weight') && !empty($request->weight)){
                    $query->where('weight',$request->weight);  
                }
                if($request->has('chest') && !empty($request->chest)){
                    $query->where('chest',$request->chest);  
                }
                if($request->has('waist') && !empty($request->waist)){
                    $query->where('waist',$request->waist);  
                }
                if($request->has('hip') && !empty($request->hip)){
                    $query->where('hip',$request->hip);  
                }
                if($request->has('eye_color') && !empty($request->eye_color)){
                    $query->where('eye_color',$request->eye_color);  
                }
                if($request->has('hair_color') && !empty($request->hair_color)){
                    $query->where('hair_color',$request->hair_color);  
                }
                if($request->has('skin_color') && !empty($request->skin_color)){
                    $query->where('skin_color',$request->skin_color);  
                }
                if($request->has('dress_size') && !empty($request->dress_size)){
                    $query->where('dress_size',$request->dress_size);  
                }
                if($request->has('shoe_size') && !empty($request->shoe_size)){
                    $query->where('shoe_size',$request->shoe_size);  
                }
                if($request->has('language') && !empty($request->language)){
                    //$query->where('shoe_size',$request->shoe_size);  
                }
                if($request->has('ethnicity') && !empty($request->ethnicity)){
                    $query->where('ethnicity',$request->ethnicity);  
                }
                if($request->has('exprience') && !empty($request->exprience)){
                    $query->where('exprience',$request->exprience);  
                }
                if($request->has('language') && !empty($request->language)){
                    $query->whereRaw('FIND_IN_SET("'.$request->language.'", language)');
                }
            })->paginate(9);
           
        if(in_array($category_slug, $modelArr)){
            return view('search.model',compact('users','category','request','weights','ethnicities'));
        }else{
            //dd($users);
            return view('search.photographer',compact('users','category','request'));
        }
    }
}
