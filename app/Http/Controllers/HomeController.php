<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\HomeBanner;
use App\Models\NewsLetter;
use App\Models\Polls;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = HomeBanner::all();
        $settings = Settings::find(1);
        $fixed_advertisements = Advertisement::all();
        $advertisements = Advertisement::skip(2)->take(20)->get();
        $poll = Polls::where('status',1)->first();
        $newestFaces = User::where('is_subscribe',1)
                    //->where('membership_id',1)
                    ->where('status',1)
                    ->latest('created_at')
                    ->take(8)
                    ->get(); 
        $childModels = User::where('is_subscribe',1)
                ->where('membership_id',4)
                ->where('status',1)
                ->latest('created_at')
                ->take(5)
                ->get();
        $photographers =  User::where('is_subscribe',1)
                ->where('membership_id',2)
                ->where('status',1)
                ->latest('created_at')
                ->take(4)
                ->get();
        $featureModels =  User::where('is_subscribe',1)
                ->where('membership_id',1)
                ->where('feature_model',1)
                ->where('status',1)
                ->latest('created_at')
                ->take(8)
                ->get();    
        $conventionAndTradeModels =  User::where('is_subscribe',1)
                ->where('membership_id',1)
                ->where('convention_and_trade',1)
                ->where('status',1)
                ->latest('created_at')
                ->take(4)
                ->get();            
        return view('index',compact('banners','settings','advertisements','poll','newestFaces','childModels','photographers','featureModels','conventionAndTradeModels','fixed_advertisements'));
    }
    public function aboutUs(){
        return view('about_us');
    }

    public function storeNewsletter(Request $request){
        //dd($request->all());
        try{
                $this->validate($request,[
                        'email'          => 'required',
                ]);

                NewsLetter::create([ 'email' => $request->email]);
                $data = 'seccess';
                return response()->json($data);
        } catch (Exception $e) {
            return back()->with('error','something went wrong!'.$e);
        }
    }

}
