<?php

namespace App\Http\Controllers\Admin\Poll;

use App\Http\Controllers\Controller;
use App\Models\PollUsers;
use App\Models\Polls;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DataTables;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Polls::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.poll.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.poll.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>' ;  
                            return $btn;
                        })
                        ->addColumn('status', function($row){
                            return $row['status'] == 1 ? 'Active' : 'inactive';
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.poll.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('user_type',2)->where('status',1)->get();      
        return view('admin.poll.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'question'  => 'required',
            "user_ids.*"  => "required",
            "user_ids"  => "required",
        ]);
        $pool = Polls::create([
            'question' => $request['question']
        ]);
        if(count($request->user_ids) > 0){
            $user_pollArr = [];
            foreach($request->user_ids as $user_id){
                $user_pollArr[] = [
                    'user_id'=>$user_id,
                    'poll_id' =>$pool->id,
                    'created_at' => Carbon::now(),
                ];
            }
            PollUsers::insert($user_pollArr);
            //print_r($user_pollArr);die;
        }
        return redirect()->route('admin.poll.index')->with('success','Add Poll successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $poll = Polls::where('id',$id)->first();
        $users = User::where('user_type',2)->where('status',1)->get();    
        return view('admin.poll.edit',compact('id','poll','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'question'  => 'required',
            "user_ids.*"  => "required",
            "user_ids"  => "required",
        ]);

        Polls::where('id',$request['id'])->update([
            'question' => $request['question'],
        ]);

        if(count($request->user_ids) > 0){
            PollUsers::where('poll_id',$request['id'])->delete();
            $user_pollArr = [];
            foreach($request->user_ids as $user_id){
                $user_pollArr[] = [
                    'user_id'=>$user_id,
                    'poll_id' =>$request['id'],
                    'created_at' => Carbon::now(),
                ];
            }
            PollUsers::insert($user_pollArr);
            //print_r($user_pollArr);die;
        }

        return redirect()->route('admin.poll.index')->with('success','Poll updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Polls::find($id)->delete();
        return redirect()->route('admin.poll.index')->with('success','Poll deleted successfully !');
    }
}
