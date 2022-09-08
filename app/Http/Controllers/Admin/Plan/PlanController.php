<?php

namespace App\Http\Controllers\Admin\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlanGroup;
use App\Models\PlanAttribute;
use App\Models\Plan;
use App\Models\PlanDetails;
//use App\Models\SubscriptionPlan;
//use App\Models\PlanPackage;
use DataTables;
//use DB;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Carbon\Carbon;


class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Plan::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.edit.plan',$row['id']).'"><i class="fas fa-edit"></i></a>';
                            $btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                            //$btn .= '<a class="delBtn" href="'.route('admin.delete.plan',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
        
                                return $btn;
                        })
                        ->addcolumn('plan_group',function($row){
                            return $row->plangroup->name;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.plan.plan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $plan_groups = PlanGroup::all();
        return view('admin.plan.create',compact('plan_groups'));
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
            "name"    => "required",
            "plan_group_id"    => "required",
        ]);
        DB::beginTransaction();
        try{
            $plan = Plan::create([
                'plan_group_id' => $request['plan_group_id'],
                'name' => $request['name'],
            ]);
            $data = [];
            $attribute_id_arr = $request->attribute_id;
            foreach($attribute_id_arr as $key=>$value){
                $data[] = [
                    'plan_id'=>$plan->id,
                    'plan_group_id'=>$request->plan_group_id,
                    'plan_attribute_id'=>$value,
                    'yearly_value'=>$request->yearly_value[$key],
                    'monthly_value'=>$request->monthly_value[$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
            PlanDetails::insert($data);
            DB::commit();
            return redirect()->route('admin.plan')->with('success','Add Plan successfully !');
            
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('admin.plan')->with('error','something went wrong!');
        }
          
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $plan = Plan::where('id',$id)->first();
        $plan_groups = PlanGroup::where('id',$plan->plan_group_id)->get();
        $plan_attr_list = PlanAttribute::whereIn('id',$plan_groups[0]['plan_attr_arr'])->get();
        $plan_details = $plan->planDetails;
        return view('admin.plan.edit',compact('id','plan','plan_groups','plan_attr_list','plan_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            "name"    => "required",
            "plan_group_id"    => "required",
            //"yearly_value"    => "required|array",
            //"yearly_value.*"    => "required",
            //"monthly_value"    => "required|array",
            //"monthly_value.*"    => "required",
        ]);
        DB::beginTransaction();
        try{
            $plan = Plan::where('id',$request->id)->update([
                'plan_group_id' => $request['plan_group_id'],
                'name' => $request['name'],
            ]);
            PlanDetails::where('plan_id',$request->id)->delete();
            $data = [];
            $attribute_id_arr = $request->attribute_id;
            foreach($attribute_id_arr as $key=>$value){
                $data[] = [
                    'plan_id'=>$request->id,
                    'plan_group_id'=>$request->plan_group_id,
                    'plan_attribute_id'=>$value,
                    'yearly_value'=>$request->yearly_value[$key],
                    'monthly_value'=>$request->monthly_value[$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
            PlanDetails::insert($data);
            DB::commit();
            return redirect()->route('admin.plan')->with('success','Update Plan successfully !');
            
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('admin.plan')->with('error','something went wrong!');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //ajax get plan attribute list
    public function getPlanAttrBygroup(Request $request){
        $plan_group_id = $request->plan_group_id;
        if($plan_group_id !=''){
            $plan_attr = PlanGroup::where('id',$plan_group_id)->first();
            //$plan_attr_array = $plan_attr->plan_attr_arr;
            $plan_attr_list = PlanAttribute::whereIn('id',$plan_attr->plan_attr_arr)->get();
            //dd($plan_attr_list);die;
            return response()->json(['success'=>'Data list','attributes'=>$plan_attr_list]);
        }else{
            return response()->json(['success'=>'Please select Plan Group','attributes'=>'']);
        }
    }
}
