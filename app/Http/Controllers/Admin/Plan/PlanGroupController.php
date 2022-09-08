<?php

namespace App\Http\Controllers\Admin\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlanGroup;
use App\Models\PlanAttribute;
use App\Models\PlanType;
use DataTables;

class PlanGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PlanGroup::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.plan_group.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                            //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                            //$btn .= '<a class="delBtn" href="'.route('admin.ethnicity.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.plan_group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planAttributes = PlanAttribute::all();    
        $planTypes = PlanType::all();    
        return view('admin.plan_group.create',compact('planAttributes','planTypes'));
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
            'name'  => 'required',
            "plan_attributes.*"  => "required",
            "plan_attributes"  => "required",
            //"plan_types.*"  => "required",
            //"plan_types"  => "required",
        ]);
        $plan_attributes = '';
        if($request->has('plan_attributes')){
            $plan_attributes = implode(', ', $request['plan_attributes']);
        }
        /* $plan_types = '';
        if($request->has('plan_types')){
            $plan_types = implode(', ', $request['plan_types']);
        } */
        //echo $plan_attributes;die;
        PlanGroup::create([
            'name' => $request['name'],
            'details' => $request['details'],
            'plan_attributes' => $plan_attributes,
            //'plan_types' => $plan_types,
        ]);
        return redirect()->route('admin.plan_group.index')->with('success','Add Plan Group successfully !');
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
        //dd($request->all());die;
        if ($request->ajax()) {
            $data = PlanGroup::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a class="edtBtn" href="'.route('admin.plan_group.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                           //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                           //$btn .= '<a class="delBtn" href="'.route('admin.ethnicity.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $get_plan_group = PlanGroup::where('id',$id)->first();
        $planAttributes = PlanAttribute::all();    
        $planTypes = PlanType::all();    
        return view('admin.plan_group.edit',compact('id','get_plan_group','planAttributes','planTypes'));
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
            'name'  => 'required',
            "plan_attributes.*"  => "required",
            "plan_attributes"  => "required",
            //"plan_types.*"  => "required",
            //"plan_types"  => "required",
        ]);

        $plan_attributes = '';
        if($request->has('plan_attributes')){
            $plan_attributes = implode(', ', $request['plan_attributes']);
        }
       
        /* $plan_types = '';
        if($request->has('plan_types')){
            $plan_types = implode(', ', $request['plan_types']);
        } */
        
        PlanGroup::where('id',$request['id'])->update([
            'name' => $request['name'],
            'details' => $request['details'],
            'plan_attributes' => $plan_attributes,
            //'plan_types' => $plan_types,
        ]);
        return redirect()->route('admin.plan_group.index')->with('success','Plan Group updated successfully !');
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
}
