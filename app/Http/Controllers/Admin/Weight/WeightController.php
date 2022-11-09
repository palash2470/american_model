<?php

namespace App\Http\Controllers\Admin\Weight;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weight;
use DataTables;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Weight::orderBy('weight')->get();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
     
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.weight.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.weight.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>' ;
                           //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                           //$btn .= '<a class="delBtn" href="'.route('admin.category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
       
                            return $btn;
                    })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.weight.weight');
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
        $this->validate($request, [
            'weight'  => 'required',
        ]);
        Weight::create([
            'weight' => $request['weight']
        ]);
        return redirect()->route('admin.weight.index')->with('success','Add weight successfully !');
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
            $data = Weight::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                        $btn = '<ul class="datatable-action-btn">';
                        $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.weight.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                        $btn .= '<li><a class="delBtn delete-btn" href="'.route('admin.weight.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                        $btn .= '</ul>' ;
       
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $weight = Weight::where('id',$id)->first();
        return view('admin.weight.weight',compact('id','weight'));
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
        Weight::where('id',$request['id'])->update([
            'weight' => $request['weight'],
        ]);
        return redirect()->route('admin.weight.index')->with('success','weight updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Weight::find($id)->delete();
        return redirect()->route('admin.weight.index')->with('success','Weight deleted successfully !');
    }
}
