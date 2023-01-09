<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\UserDetails;
use App\Models\Colour;
use App\Models\Ethnicity;
use App\Models\Favourite;
use App\Models\Follow;
use App\Models\HairLenth;
use App\Models\Height;
use App\Models\ImageCategory;
use App\Models\Images;
use App\Models\PhotoLike;
use App\Models\Weight;
use App\Models\PlanGroup;
use App\Models\PlanDetails;
use App\Models\ProfileView;
use App\Models\UserDisplayOption;
use App\Models\UserPlan;
use App\Models\UserPlanDetails;
use App\Models\Video;
use App\Models\VideoLike;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBasicInformation()
    {
        $user = User::where('id',Auth::user()->id)->where('is_register_basic',1)->first();
        //$countres = Country::all();
        $countres = Country::where('id',231)->get();
        if($user){
            $categories = Category::where('plan_group_id',$user->userDetails->getCategory->plan_group_id)->get();
            //dd($categories);
        }else{
            $categories = Category::all();
        }

       return view('user.basic_information',compact('countres','categories','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBasicInformation(Request $request)
    {
        $this->validate($request, [
            "first_name"    => "required",
            "last_name"    => "required",
            "gender"    => "required",
            "dob"    => "required",
            "country_id"    => "required",
            "state_id"    => "required",
            //"city_name"    => "required",
            "city_id"    => "required",
            "zip_code"    => "required",
            "membership_type_id"    => "required",
            "profile_image"    => [Rule::requiredIf(function (){
                if (UserDetails::whereNotNull('profile_image')->where('user_id',Auth::user()->id)->exists()) {
                    return false;
                }
                return true;
            }),'image','mimes:jpg,png,jpeg,gif,svg'],
        ]);
        DB::beginTransaction();
        try{
            //$slug = $this->createSlug($request->name);

            $user = User::where('id',Auth::user()->id)->where('is_register_basic',1)->first();
            if($user){
                if($request->has('profile_image')) {
                    if($request->crop_image){
                        $folderPath = public_path('/img/user/profile-image/');
                        $base64Image = explode(";base64,", $request->crop_image);
                        $explodeImage = explode("image/", $base64Image[0]);
                        $imageType = $explodeImage[1];
                        $image_base64 = base64_decode($base64Image[1]);
                        $imageName = uniqid() . '.'.$imageType;
                        $file = $folderPath . $imageName;
                        $profile_image = $imageName;
                        file_put_contents($file, $image_base64);
                        UserDetails::where('user_id',Auth::user()->id)->update(['profile_image' =>$profile_image]);
                        /* try {
                            $s3Url = $folderPath . $imageName;
                            Storage::disk('s3.bucket')->put($s3Url, $base64String, 'public');
                        } catch (Exception $e) {
                            Log::error($e);
                        } */
                    }
                }
                UserDetails::where('user_id',Auth::user()->id)->update([
                    'user_id' => auth()->user()->id,
                    'first_name' =>$request->first_name,
                    'middle_name' =>$request->middle_name,
                    'last_name' =>$request->last_name,
                    'gender' =>$request->gender,
                    'dob' =>$request->dob,
                    'country_id' =>$request->country_id,
                    'state_id' =>$request->state_id,
                    'city_id' =>$request->city_id,
                    'city_name' =>$request->city_name,
                    'zip_code' =>$request->zip_code,
                    'membership_type_id' =>$request->membership_type_id,
                    'booking_amount_hour' =>$request->booking_amount_hour,
                    'booking_amount_day' =>$request->booking_amount_day,
                    'booking_amount_week' =>$request->booking_amount_week,
                ]);
                $full_name = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
                User::where('id',Auth::user()->id)->update(['membership_id'=> $request->membership_type_id,'name'=>$full_name]);
            }else{
                $profile_image = 'NULL';
                if($request->has('profile_image')) {
                    if($request->crop_image){
                        $folderPath = public_path('/img/user/profile-image/');
                        $base64Image = explode(";base64,", $request->crop_image);
                        $explodeImage = explode("image/", $base64Image[0]);
                        $imageType = $explodeImage[1];
                        $image_base64 = base64_decode($base64Image[1]);
                        $imageName = uniqid() . '.'.$imageType;
                        $file = $folderPath . $imageName;
                        $profile_image = $imageName;
                        file_put_contents($file, $image_base64);
                        /* try {
                            $s3Url = $folderPath . $imageName;
                            Storage::disk('s3.bucket')->put($s3Url, $base64String, 'public');
                        } catch (Exception $e) {
                            Log::error($e);
                        } */
                    }
                }
                UserDetails::create([
                    'user_id' => auth()->user()->id,
                    'first_name' =>$request->first_name,
                    'middle_name' =>$request->middle_name,
                    'last_name' =>$request->last_name,
                    'gender' =>$request->gender,
                    'dob' =>$request->dob,
                    'country_id' =>$request->country_id,
                    'state_id' =>$request->state_id,
                    'city_id' =>$request->city_id,
                    'city_name' =>$request->city_name,
                    'zip_code' =>$request->zip_code,
                    'membership_type_id' =>$request->membership_type_id,
                    'profile_image' =>$profile_image,
                    'booking_amount_hour' =>$request->booking_amount_hour,
                    'booking_amount_day' =>$request->booking_amount_day,
                    'booking_amount_week' =>$request->booking_amount_week,
                ]);
                $full_name = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
                $slug = $this->createSlug($request->first_name);
                /* $model_id = '888888';
                $latest_id = User::orderBy('created_at','DESC')->first();
                if($latest_id){
                    $model_id = ((int)$latest_id->model_id + 1);
                } */

                User::where('id',Auth::user()->id)
                ->update([
                    'is_register_basic'=> 1,
                    'membership_id'=> $request->membership_type_id,
                    'name'=>$full_name,
                    'name_slug'=>$slug,
                    'last_active' => Carbon::now(),
                ]);
            }

            $modelArr = Helper::categoryTypeArray();
            $category = Category::where('id',$request->membership_type_id)->first();
            if(in_array($category->slug,$modelArr)){
                DB::commit();
                return  redirect()->route('user.details.information.create');
            }else{
                DB::commit();
                return redirect()->route('user.registration.plan');
            }

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('user.basic.information.create')->with('error','something went wrong!');
        }

    }

      /**
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($name)
    {
        if (User::whereNameSlug($slug = Str::slug($name))->exists()) {

            $max = User::whereName($name)->latest('id')->skip(1)->value('name_slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDetailsInformation()
    {
        if (Auth::user()->is_register_basic == 0) {
            return redirect()->route('user.basic.information.create');
        }
        $user = User::where('id',Auth::user()->id)->where('is_register_details',1)->first();
        $colours = Colour::all();
        $ethnicities = Ethnicity::all();
        $weights = Weight::orderBy('weight')->get();
        $hairLenths = HairLenth::orderBy('hair_lenth')->get();
        $heights = Height::orderBy('height')->get();
       return view('user.details_information',compact('colours','ethnicities','weights','hairLenths','user','heights'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDetailsInformation(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            "eye_color"    => "required",
            "skin_color"    => "required",
            "hair_color"    => "required",
            "hair_lenth"    => "required",
            "weight"    => "required",
            "height"    => "required",
            "ethnicity"    => "required",
            "shoe_size"    => "required",
            "waist"    => "required",
            "chest"    => "required",
            "dress_size"    => "required",
            "hip"    => "required",
        ]);
        //DB::beginTransaction();
        try{
            UserDetails::where('user_id',Auth::user()->id)->update([
                'eye_color' =>$request->eye_color,
                'skin_color' =>$request->skin_color,
                'hair_color' =>$request->hair_color,
                'hair_lenth' =>$request->hair_lenth,
                'weight' =>$request->weight,
                'height' =>$request->height,
                'ethnicity' =>$request->ethnicity,
                'shoe_size' =>$request->shoe_size,
                'waist' =>$request->waist,
                'chest' =>$request->chest,
                'dress_size' =>$request->dress_size,
                'hip' =>$request->hip,
            ]);
            User::where('id',Auth::user()->id)->update(['is_register_details'=> 1 ]);
            //DB::commit();
            return redirect()->route('user.registration.plan');
            //return  redirect()->route('dashboard');
        }catch(\Exception $e){
            //DB::rollback();
            return redirect()->route('user.details.information.create')->with('error','something went wrong!');
        }

    }

    public function storeUserPlan(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'plan_group_id' => 'required',
            'plan_type' => 'required',
            'plan' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        //DB::beginTransaction();
        try{
            $userplan = UserPlan::where('user_id',Auth::user()->id)->where('status',1)->first();
            //dd($userplan);
            if($userplan){
                UserPlan::where('user_id',Auth::user()->id)->where('status',1)->update(['status'=> 0]);
            }
            $planDetails = PlanDetails::where('plan_id',$request->plan)
                                        ->where('plan_group_id',$request->plan_group_id)
                                        ->get();
            //dd($planDetails);
            if($planDetails && count($planDetails) > 0){
                $price = 0;
                $expiry = '';
                if($request->plan_type == 'monthly'){
                    $price = $planDetails[0]->monthly_value;
                    $expiry = Carbon::now()->addMonth();
                }else if($request->plan_type == 'yearly'){
                    $price = $planDetails[0]->yearly_value;
                    $expiry = Carbon::now()->addYear();
                }
                $user_plan = UserPlan::create([
                    'user_id' => Auth::user()->id,
                    'plan_group_id' => $request->plan_group_id,
                    'plan_id' => $request->plan,
                    'plan_type' => $request->plan_type,
                    'price' => $price,
                    'expiry' => $expiry,
                ]);
                $planDetailsArr=[];
                foreach($planDetails as $plan_detail){
                    if($request->plan_type == 'monthly'){
                        $value = $plan_detail->monthly_value;
                    }else if($request->plan_type == 'yearly'){
                        $value = $plan_detail->yearly_value;
                    }
                    $planDetailsArr[] = [
                        'user_id' => Auth::user()->id,
                        'user_plan_id' => $user_plan->id,
                        'attribute_name' => $plan_detail->attribute->name,
                        'attribute_slug' => $plan_detail->attribute->slug,
                        'value' => $value,
                        'created_at' => Carbon::now(),
                    ];
                }
                UserPlanDetails::insert($planDetailsArr);


                if($price == 0){
                    User::where('id',Auth::user()->id)->update(['is_subscribe'=> 1 ]);
                    return response()->json(['status'=>true,'redirect_url'=>route('dashboard')]);
                }else{
                    return response()->json(['status'=>true,'redirect_url'=>route('user.payment',encrypt($user_plan->id))]);
                }

            }
           // DB::commit();

        }catch(\Exception $e){
            //dd($e);
           // DB::rollBack();
            return response()->json(['status'=>false,'redirect_url'=>route('user.registration.plan')]);
        }

    }

    public function myAccount(){
        $user = User::where('id',Auth::user()->id)->first();
        return view('user.my_account',compact('user'));
    }

    public function updateMyAccount(Request $request){

        $this->validate($request, [
            "first_name"    => "required",
            "gender"    => "required",
            "dob"    => "required",
            "email"    => "required",
            "password"    => "required",
        ]);

        $checkUser = Hash::check( $request->password, Auth::user()->password );
        if($checkUser){
            UserDetails::where('user_id',Auth::user()->id)->update([
                'first_name' =>$request->first_name,
                'middle_name' =>$request->middle_name,
                'last_name' =>$request->last_name,
                'gender' =>$request->gender,
                'dob' =>$request->dob,
            ]);
            $full_name = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
            $slug = $this->createSlug($request->first_name);
            User::where('id',Auth::user()->id)->update(['name'=>$full_name,'name_slug'=>$slug]);
            return back()->with('success', 'Your account has been successfully updated');
        }else{
            return back()->with('error', 'Wrong password enter');
        }

    }

    public function changePassword(){
        return view('user.change_password');
    }

    public function changePasswordUpdate(Request $request){
        $this->validate($request,[
            'current_password'=> "required",
            'password' => 'required|confirmed|min:6',
        ]);

        $checkUser = Hash::check( $request->current_password, Auth::user()->password );
        if($checkUser){
            User::where('id',Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return back()->with('success', 'Your password has been successfully updated');
        }else{
            return back()->with('error', 'Current password not match');
        }

    }

    public function displayOptions(){
        $displayOption = $displayOption = UserDisplayOption::where('user_id', Auth::user()->id)->first();
        return view('user.display_options',compact('displayOption'));
    }

    public function displayOptionsUpdate(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'age_display' => 'required',
            'weight_display' => 'required',
            'my_comment_display' => 'required',
            'pic_comment_display' => 'required',
        ]);
        //DB::beginTransaction();
        try{
            $displayOption = UserDisplayOption::where('user_id', Auth::user()->id)->first();

            if($displayOption){

                UserDisplayOption::where('user_id',Auth::user()->id)->update([
                    'age_display'=>$request->age_display,
                    'weight_display'=>$request->weight_display,
                    'my_comment_display'=>$request->my_comment_display,
                    'pic_comment_display'=>$request->pic_comment_display,
                ]);
            }else{
                UserDisplayOption::create([
                    'user_id' => Auth::user()->id,
                    'age_display'=>$request->age_display,
                    'weight_display'=>$request->weight_display,
                    'my_comment_display'=>$request->my_comment_display,
                    'pic_comment_display'=>$request->pic_comment_display,
                ]);
            }
            return back()->with('success', 'Your Display option has been successfully updated');
           // DB::commit();
        }catch(Exception $e){
            //DB::rollBack();
            return back()->with('error','something went wrong!');
        }
    }

    public function myMembership(){
        $userPlan = UserPlan::where('user_id',Auth::user()->id)->where('status',1)->first();
        return view('user.my_membership',compact('userPlan'));
    }

    public function myBilling(){
        return view('user.my_billing');
    }

    public function viewProfile($category,$slug){
        $getCategory = Category::where('slug',$category)->first();
        $user = User::where('name_slug',$slug)->where('membership_id',$getCategory->id)->first();
        $user_images = Images::where('user_id',$user->id)->latest('created_at')->paginate(12);
        $count_favourite = 0;
        $count_follow = 0;
        //update profile view count
        if($user){
            if(Auth::check()){
                $count_favourite = Favourite::where('user_id',$user->id)->where('favour_by',Auth::user()->id)->count();
                $count_follow = Follow::where('follower_id',$user->id)->where('following_id',Auth::user()->id)->count();
            }
            User::where('id',$user->id)->update(['views_count' => $user->views_count+1]);
            if(Auth::user()){
                $view = ProfileView::where('viewer_id',Auth::user()->id)->where('user_id',$user->id)->get();
                if(Auth::user()->id != $user->id && (count($view)== 0)){
                    ProfileView::create([
                        'user_id'=>$user->id,
                        'viewer_id' => Auth::user()->id,
                    ]);
                }
            }
        }
        //$countres = Country::all();
        $countres = Country::where('id',231)->get();
        return view('user.profile',compact('user','count_favourite','count_follow','countres','user_images'));
    }

    public function profileImageByUser(Request $request,$user_id){
        $user_images = Images::where('user_id',$user_id)->latest('created_at')->paginate(12);
        $image_view = view('user.profile_image',compact('user_images'))->render();
        $image_popup_view = view('user.profile_image_popup',compact('user_images'))->render();
        return response()->json(['data_count'=>$user_images->count(),'user_images'=>$image_view,'image_popup_view'=>$image_popup_view]);
    }
    public function profileEditImageByUser(Request $request){
        $user_id = Auth::user()->id;
        $user_images = Images::where('user_id',$user_id)->latest('created_at')->paginate(12);
        $image_view = view('user.profile_edit.edit_profile_image',compact('user_images'))->render();
        $image_popup_view = view('user.profile_image_popup',compact('user_images'))->render();
        return response()->json(['data_count'=>$user_images->count(),'user_images'=>$image_view,'image_popup_view'=>$image_popup_view]);
    }

    public function myProfileEdit(){
        $user = User::where('id',Auth::user()->id)->first();
        $user_images = Images::where('user_id',$user->id)->latest('created_at')->paginate(12);
        $count_favourite = Favourite::where('user_id',$user->id)->where('favour_by',Auth::user()->id)->count();
        $count_follow = Follow::where('follower_id',$user->id)->where('following_id',Auth::user()->id)->count();
        $colours = Colour::all();
        $ethnicities = Ethnicity::all();
        $weights = Weight::orderBy('weight')->get();
        $hairLenths = HairLenth::orderBy('hair_lenth')->get();
        $categories = Category::all();
        $heights = Height::orderBy('height')->get();
        //$countres = Country::all();
        $countres = Country::where('id',231)->get();
        $image_categories = ImageCategory::where('status',1)->orderBy('name')->get();
        if($user->category->slug == 'models'){
            return view('user.profile_edit.my_profile_edit',compact('user','colours','ethnicities','weights','hairLenths','image_categories','user_images','count_favourite','count_follow','heights'));
        }elseif($user->category->slug == 'photographer' || $user->category->slug == 'casting-director'){
            return view('user.profile_edit.photographer_profile_edit',compact('user','categories','countres','image_categories','user_images','count_favourite','count_follow','heights'));
        }elseif($user->category->slug == 'child-model-and-actor'){
            return view('user.profile_edit.child-model_profile_edit',compact('user','colours','ethnicities','weights','hairLenths','image_categories','user_images','count_favourite','count_follow','heights'));
        }else{
            abort(404);
        }
    }

    public function myProfileUpdate(Request $request){
        //dd($request->all());
        UserDetails::where('user_id',Auth::user()->id)->update([
            'eye_color' =>$request->eye_color,
            'skin_color' =>$request->skin_color,
            'hair_color' =>$request->hair_color,
            'hair_lenth' =>$request->hair_lenth,
            'weight' =>$request->weight,
            'height' =>$request->height,
            'ethnicity' =>$request->ethnicity,
            'shoe_size' =>$request->shoe_size,
            'waist' =>$request->waist,
            'chest' =>$request->chest,
            'dress_size' =>$request->dress_size,
            'hip' =>$request->hip,
            'exprience' =>$request->exprience,
            'compensation' =>$request->has('compensation') ? implode(',',$request->compensation) : '',
            //'compensation' =>$request->has('compensation') ? $request->compensation : '',
            'biography' =>$request->biography,
            'interested' => $request->has('interested') ? implode(',',$request->interested) : '',
            'accepted_job' => $request->has('accepted_job') ? implode(',',$request->accepted_job) : '',
            'language' => $request->has('language') ? implode(',',$request->language) : '',
            'rate_per_hours' => $request->rate_per_hours,
            'rate_half_day' => $request->rate_half_day,
            'rate_full_day' => $request->rate_full_day,
            'booking_amount_hour' => $request->booking_amount_hour,
            'booking_amount_day' => $request->booking_amount_day,
            'booking_amount_week' => $request->booking_amount_week,
            'training' => $request->training,
            'facebook_link' => $request->facebook_link,
            'youtube_link' => $request->youtube_link,
            'twitter_link' => $request->twitter_link,
            'linkedin_link' => $request->linkedin_link,
        ]);

        return response()->json(['status'=>true,'massage'=>'User details saved Successfully']);
    }

    public function ajaxImageChange(Request $request){
        //dd($request->all());
        if($request->image_type == 'profile_iamge'){
            if($request->has('image')) {
                $folderPath = public_path('/img/user/profile-image/');
                $base64Image = explode(";base64,", $request->image);
                $explodeImage = explode("image/", $base64Image[0]);
                $imageType = $explodeImage[1];
                $image_base64 = base64_decode($base64Image[1]);
                $imageName = uniqid() . '.'.$imageType;
                $file = $folderPath . $imageName;
                $profile_image = $imageName;
                file_put_contents($file, $image_base64);
                $user_details = UserDetails::where('user_id',Auth::user()->id)->first();
                if($user_details->profile_image){
                    unlink($folderPath.$user_details->profile_image);
                }
                UserDetails::where('user_id',Auth::user()->id)->update(['profile_image' =>$profile_image]);
            }
        }
        if($request->image_type == 'cover_iamge'){
            if($request->has('image')) {
                $folderPath = public_path('/img/user/cover-image/');
                $base64Image = explode(";base64,", $request->image);
                $explodeImage = explode("image/", $base64Image[0]);
                $imageType = $explodeImage[1];
                $image_base64 = base64_decode($base64Image[1]);
                $imageName = uniqid() . '.'.$imageType;
                $file = $folderPath . $imageName;
                $cover_image = $imageName;
                file_put_contents($file, $image_base64);
                $user_details = UserDetails::where('user_id',Auth::user()->id)->first();
                if($user_details->cover_img){
                    unlink($folderPath.$user_details->cover_img);
                }
                UserDetails::where('user_id',Auth::user()->id)->update(['cover_img' =>$cover_image]);
            }
        }

        return response()->json(['status'=>true,'massage'=>'User image saved Successfully']);

    }

    public function imageUpload(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'image' => 'required',
            'title' => 'required',
            'image_category' => 'required',
        ]);

        $image_count = Images::where('user_id',Auth::user()->id)->count();
        $user_paln = UserPlan::where('user_id',Auth::user()->id)->where('status',1)->first();
        $image_portfolio_limit = 0;
        if($user_paln){
            $user_plan_details = UserPlanDetails::where('user_id',Auth::user()->id)
                ->where('user_plan_id',$user_paln->id)
                ->where('attribute_slug','no-of-images-in-portfolio')
                ->first();
            $image_portfolio_limit = 0;
            if($user_plan_details){
                $image_portfolio_limit = $user_plan_details->value;
            }
        }
       
        if($image_count >= $image_portfolio_limit && $image_portfolio_limit !='Unlimited'){
            return back()->with('error', 'No. of images in portfolio Limit over. Please upgrade your plan');
        }else{
            $image_name = 'NULL';
            if($request->has('image')) {
                $folderPath = public_path('/img/user/images/');
                $base64Image = explode(";base64,", $request->image);
                $explodeImage = explode("image/", $base64Image[0]);
                $imageType = $explodeImage[1];
                $image_base64 = base64_decode($base64Image[1]);
                $imageName = uniqid() . '.'.$imageType;
                $file = $folderPath . $imageName;
                $image_name = $imageName;
                file_put_contents($file, $image_base64);
                /* try {
                    $s3Url = $folderPath . $imageName;
                    Storage::disk('s3.bucket')->put($s3Url, $base64String, 'public');
                } catch (Exception $e) {
                    Log::error($e);
                } */
            }

            Images::create([
                'user_id' => Auth::user()->id,
                'image' => $image_name,
                'title' => $request->title,
                'category' => $request->image_category,
                'description' => $request->description,
            ]);
            return back()->with('success', 'Image upload Successfully');
        }
        
        //return response()->json(['status'=>true,'massage'=>'Image upload Successfully']);
    }

    public function ajaxDeleteImg(Request $request){
        $image = Images::where('id',$request->image_id)->where('user_id',Auth::user()->id)->first();
        if($image){
            unlink(public_path('/img/user/images/'.$image->image)); 
            Images::where("id", $image->id)->delete();
            return response()->json(['status'=>true,'massage'=>'Image delete Successfully']);
        }else{
            return response()->json(['status'=>true,'massage'=>'something went wrong!']);
        }
        
        //dd($request->all());
    }

    //Favourite
    public function ajaxFavourite(Request $request){
        $this->validate($request,[
            'user_id' => 'required',
        ]);
        $favourite = Favourite::where('user_id',$request->user_id)->where('favour_by',Auth::user()->id)->get();
        if(count($favourite) > 0){
            Favourite::where('user_id',$request->user_id)->where('favour_by',Auth::user()->id)->delete();
            return response()->json(['status'=>true,'type'=>'remove','massage'=>'Favorite user remove Successfully']);
        }else{
            Favourite::create([
                'user_id' => $request->user_id,
                'favour_by' => Auth::user()->id,
            ]);
            return response()->json(['status'=>true,'type'=>'add','massage'=>'You have added this user as Favorite']);
        }
        //return back()->with('success', 'Favourite user added Successfully');
    }

    public function ajaxFollow(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'user_id' => 'required',
        ]);
        $follow = Follow::where('follower_id',$request->user_id)->where('following_id',Auth::user()->id)->get();
        if(count($follow) > 0){
            Follow::where('follower_id',$request->user_id)->where('following_id',Auth::user()->id)->delete();
            return response()->json(['status'=>true,'type'=>'remove','massage'=>'Unfollowed Successfully']);
        }else{
            $follow = Follow::create([
                'follower_id' => $request->user_id,
                'following_id' => Auth::user()->id,
            ]);
            Mail::send('emails.follow', ['follow' => $follow], function($message) use($follow){
                $message->to($follow->followingsUser->email);
                $message->subject('Following');
            });
            return response()->json(['status'=>true,'type'=>'add','massage'=>'Follow user added Successfully']);
        }

    }

    public function ajaxLikePhoto(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'photo_id' => 'required'
        ]);
        $photo_like = PhotoLike::where('user_id',Auth::user()->id)->where('photo_id',$request->photo_id)->first();
        //dd($photo_like);
        if($photo_like){
            PhotoLike::where('user_id',Auth::user()->id)->where('photo_id',$request->photo_id)->delete();
            return response()->json(['status'=>true,'type'=>'remove','photo_like'=>$photo_like,'massage'=>'Remove Like']);
        }else{
            $like = PhotoLike::create([
                'photo_id' => $request->photo_id,
                'user_id' => Auth::user()->id,
            ]);
            Mail::send('emails.photo_like', ['like' => $like], function($message) use($like){
                $message->to($like->photo->user->email);
                $message->subject('Like Your Photo');
            });
            return response()->json(['status'=>true,'type'=>'add','photo_like'=>$like,'massage'=>'You have successfully liked this photo']);
        }
    }

    public function booking(){
        $bookings = Books::with('country')->with('state')->where('booked_user_id',Auth::user()->id)->get();
        //dd($bookings);
        return view('user.booking',compact('bookings'));
    }

    public function sendMailToModels(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'modelId'=>'required',
                'subject'=>'required',
                'message'=>'required',
            ]);

            //Send failed response if request is not valid
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $getModels = user::where('id',$request->modelId)->first();
            $data = array(
                'msg' => $request->message,
                'sub' => $request->subject,
                'modelsEmail' => $getModels->email,
                'modelName' => $getModels->name,
                'userEmail' => auth()->user()->email,
                'userName' => auth()->user()->name,
            );
            Mail::send('emails.sendMailToModels', $data, function($m) use ($data) {
                $m->to($data['modelsEmail'],$data['modelName'] );
                $m->subject($data['sub']);
                $m->from($data['userEmail'],$data['userName'] );
            });
            return back()->with('success', 'You send mail successfully');
        } catch (Exception $e) {
            return back()->with('error','something went wrong!'.$e);
        }
    }

    public function ajaxVideoUpload(Request $request){
        //dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'youtube_video_link'=>'required',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif',
            ]);
             //Send failed response if request is not valid
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $image='';
            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('img/user/youtube_thumbnail_image'), $filename);
                $image = $filename;
            }
            Video::create([
                'user_id' => Auth::user()->id,
                'youtube_video_link' => $request->youtube_video_link,
                'thumbnail_image' => $image,
            ]);
            return back()->with('success', 'Video upload Successfully');
        } catch (Exception $e) {
            return back()->with('error','something went wrong!'.$e);
        }
    }

    public function ajaxDeleteVideo(Request $request){
        //dd($request->all());
        $video = Video::where('id',$request->video_id)->where('user_id',Auth::user()->id)->first();
        if($video){
            unlink(public_path('/img/user/youtube_thumbnail_image/'.$video->thumbnail_image)); 
            Video::where("id", $video->id)->delete();
            return response()->json(['status'=>true,'massage'=>'Video delete Successfully']);
        }else{
            return response()->json(['status'=>true,'massage'=>'something went wrong!']);
        }
    }
    
    public function ajaxVideoLike(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'video_id' => 'required'
        ]);
        $video_like = VideoLike::where('user_id',Auth::user()->id)->where('video_id',$request->video_id)->first();
        //dd($photo_like);
        if($video_like){
            VideoLike::where('user_id',Auth::user()->id)->where('video_id',$request->video_id)->delete();
            return response()->json(['status'=>true,'type'=>'remove','video_like'=>$video_like,'massage'=>'Remove Like']);
        }else{
            $like = VideoLike::create([
                'video_id' => $request->video_id,
                'user_id' => Auth::user()->id,
            ]);
            Mail::send('emails.video_like', ['like' => $like], function($message) use($like){
                $message->to($like->video->user->email);
                $message->subject('Like Your Video');
            });
            return response()->json(['status'=>true,'type'=>'add','video_like'=>$like,'massage'=>'Successfully like video']);
        }
    }

}
