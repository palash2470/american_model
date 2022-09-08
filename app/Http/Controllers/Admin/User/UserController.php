<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

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
        //$get_user = User::where('user_type','!=','1')->get();
        if ($request->ajax()) {
            $data = User::all();
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->editColumn('user_type', function ($row) {
                            return $row->user_type == 1 ? 'Admin' : 'Customer';
                        })
                        ->editColumn('name', function ($row) {
                            return $row->userDetails?$row->userDetails->name:'';
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
        }
        return view('admin.user.index');
    }
}
