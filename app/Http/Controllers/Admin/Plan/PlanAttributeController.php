<?php

namespace App\Http\Controllers\Admin\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlanAttribute;
use DataTables;
use Illuminate\Support\Str;

class PlanAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PlanAttribute::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.plan_attribute.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                            //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                            //$btn .= '<a class="delBtn" href="'.route('admin.ethnicity.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.plan.planattribute');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ]);
        PlanAttribute::create([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'input_type' => $request['input_type'],
        ]);
        return redirect()->route('admin.plan_attribute.index')->with('success','Add Plan Attribute successfully !');
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
            $data = PlanAttribute::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a class="edtBtn" href="'.route('admin.plan_attribute.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                           //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                           //$btn .= '<a class="delBtn" href="'.route('admin.ethnicity.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $get_plan_attribute = PlanAttribute::where('id',$id)->first();
        return view('admin.plan.planattribute',compact('id','get_plan_attribute'));
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
        PlanAttribute::where('id',$request['id'])->update([
            'name' => $request['name'],
            //'slug' => Str::slug($request['name']),
            'input_type' => $request['input_type'],
        ]);
        return redirect()->route('admin.plan_attribute.index')->with('success','Plan Attribute updated successfully !');
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
