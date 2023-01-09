<?php

namespace App\Http\Controllers\Admin\Height;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Height;
use DataTables;

class HeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Height::orderBy('height')->get();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
     
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.height.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.height.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>' ;
                           //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                           //$btn .= '<a class="delBtn" href="'.route('admin.category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
       
                            return $btn;
                    })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.height.height');
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
            'height'  => 'required',
        ]);
        Height::create([
            'height' => $request['height']
        ]);
        return redirect()->route('admin.height.index')->with('success','Add height successfully !');
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
            $data = Height::orderBy('height')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                        $btn = '<ul class="datatable-action-btn">';
                        $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.height.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                        $btn .= '<li><a class="delBtn delete-btn" href="'.route('admin.height.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                        $btn .= '</ul>' ;
       
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $height = Height::where('id',$id)->first();
        return view('admin.height.height',compact('id','height'));
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
        $this->validate($request, [
            'height'  => 'required',
        ]);
        Height::where('id',$request['id'])->update([
            'height' => $request['height'],
        ]);
        return redirect()->route('admin.height.index')->with('success','height updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Height::find($id)->delete();
        return redirect()->route('admin.height.index')->with('success','Height deleted successfully !');
    }
}
