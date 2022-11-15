<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetails;
use Exception;
use Yajra\DataTables\Facades\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function Index(Request $request)
    {
        $users = User::where('user_type','!=','1')->orderBy('id','desc')->paginate(10);
        /* if ($request->ajax()) {
            $data = User::all();
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->editColumn('user_type', function ($row) {
                            return $row->user_type == 1 ? 'Admin' : 'Customer';
                        })
                        ->editColumn('name', function ($row) {
                            return $row->name;
                        })
                        ->editColumn('created_at', function ($row) {
                            return date('d-m-Y', strtotime($row->created_at));
                        })
                        ->addColumn('action', function($row){
        
                            //$btn = '<a class="edtBtn" href="'.route('admin.edit.plan',$row['id']).'"><i class="fas fa-edit"></i></a>';
        
                                //return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        } */
        return view('admin.user.index',compact('users'));
    }
    public function bulkActionAjax(Request $request){
        try{
            if($request->has('type') && $request->type !='' && count($request->ids) > 0){
                if($request->type == 'active'){
                    foreach($request->ids as $user_id){
                        User::where('id',$user_id)->update(['status'=> 1]);
                    }
                    $return_data['status'] = 1;
                    $return_data['massage'] = 'Users successfully Activated';
                }elseif($request->type == 'deactive'){
                    foreach($request->ids as $user_id){
                        User::where('id',$user_id)->update(['status'=> 2]);
                    }
                    $return_data['status'] = 1;
                    $return_data['massage'] = 'Users successfully Deactiveed';
                }elseif($request->type == 'delete'){
                    foreach($request->ids as $user_id){
                        User::where('id',$user_id)->delete();
                    }
                    $return_data['status'] = 1;
                    $return_data['massage'] = 'Users successfully Deleted';
                }else{
                    $return_data['status'] = 0;
                    $return_data['massage'] = 'something went wrong!';
                }
                echo json_encode($return_data);	
            }
        }catch(\Exception $e){
            $return_data['status'] = 0;
            $return_data['massage'] = 'something went wrong!';
            echo json_encode($return_data);	
            //return redirect()->back()->with('error','something went wrong!');
        }
        
    }

    public function edit($id){
        $id = base64_decode($id);
        $user = User::find($id);
        $countres = Country::all();
        $categories = Category::all();
        return view('admin.user.edit',compact('user','countres','categories'));
    }

    public function update(Request $request){
        //dd($request->all());
        try{
            $this->validate($request, [
                "first_name"    => "required",
                /* "last_name"    => "required",
                "gender"    => "required",
                "dob"    => "required",
                "country_id"    => "required",
                "state_id"    => "required",
                "city_name"    => "required",
                "zip_code"    => "required", */
            ]);
            UserDetails::where('user_id',$request->id)->update([
                'first_name' =>$request->first_name,
                'middle_name' =>$request->middle_name,
                'last_name' =>$request->last_name,
                'gender' =>$request->gender,
                'dob' =>$request->dob,
                'country_id' =>$request->country_id,
                'state_id' =>$request->state_id,
                'city_name' =>$request->city_name,
                'zip_code' =>$request->zip_code,
            ]);
            $full_name = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
            $user = User::where('id',$request->id)->first();
            User::where('id',$request->id)->update([
                'name'=>$full_name,
                'status'=> $request->status,
                'feature_model' =>isset($request->feature_model) ? 1 : 0, 
                'convention_and_trade' =>isset($request->convention_and_trade) ? 1 : 0, 
                'feature_photographer' =>isset($request->feature_photographer) ? 1 : 0, 
            ]);
            if($user->status == 0 && $request->status == 1){
                Mail::send('emails.account_approved', ['user' => $user], function($message) use($user){
                    $message->to($user->email);
                    $message->subject('Account has been approved');
                });
            }
            return redirect()->back()->with('success', 'User data successfully update ');
        }catch(\Exception $e){
            //dd($e);
            return redirect()->back()->with('error', 'Something went wrong. Please try later. ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $id = base64_decode($id);
            $user = User::where('id',$id)->first();
            Mail::send('emails.user_delete',['user'=>$user], function($message) use($user){
                $message->to($user->email);
                $message->subject('Account Delete');
            });  
            User::find($id)->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try later. ' . $e->getMessage());
        }
    }

    public function ban($id){
        try {
            $id = base64_decode($id);
            User::where('id',$id)->update(['status' =>2]);
            return redirect()->back()->with('success', 'User decative successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try later. ' . $e->getMessage());
        }
    }
}
