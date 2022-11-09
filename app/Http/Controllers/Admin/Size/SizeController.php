<?php

namespace App\Http\Controllers\Admin\Size;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use DataTables;
use Helper;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //echo  Helper::cmTofeet(30);die;
        if ($request->ajax()) {
            $data = Size::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.size.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.size.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>' ;
        
                            return $btn;
                        })
                        ->addColumn('height', function($row){
                            return $row['height'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                            ' ;
                        })
                        ->addColumn('waist', function($row){
                            return $row['waist'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                            ' ;
                        })
                        ->addColumn('chest', function($row){
                            return $row['chest'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                            ' ;
                        })
                        ->addColumn('hip', function($row){
                            return $row['hip'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                            ' ;
                        })
                        ->rawColumns(['action','height','waist','chest','hip'])
                        ->make(true);
        }
        
        return view('admin.size.size');
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
            'size'  => 'required',
        ]);
        Size::create([
            'size' => $request['size'],
            'height' => $request->has('height') ? 1 : 0,
            'waist' => $request->has('waist') ? 1 : 0,
            'chest' => $request->has('chest') ? 1 : 0,
            'hip' => $request->has('hip') ? 1 : 0,
        ]);
        return redirect()->route('admin.size.index')->with('success','Add Size successfully !');
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
            $data = Size::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                        $btn = '<ul class="datatable-action-btn">';
                        $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.size.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                        $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.size.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                        $btn .= '</ul>' ;
    
                        return $btn;
                    })
                    ->addColumn('height', function($row){
                        return $row['height'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                        ' ;
                    })
                    ->addColumn('waist', function($row){
                        return $row['waist'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                        ' ;
                    })
                    ->addColumn('chest', function($row){
                        return $row['chest'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                        ' ;
                    })
                    ->addColumn('hip', function($row){
                        return $row['hip'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                        ' ;
                    })
                    ->rawColumns(['action','height','waist','chest','hip'])
                    ->make(true);
        }
        $get_size = Size::where('id',$id)->first();
        return view('admin.size.size',compact('id','get_size'));
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
        Size::where('id',$request['id'])->update([
            'size' => $request['size'],
            'height' => $request->has('height'),
            'waist' => $request->has('waist'),
            'chest' => $request->has('chest'),
            'hip' => $request->has('hip'),
        ]);
        return redirect()->route('admin.size.index')->with('success','Size updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Size::find($id)->delete();
        return redirect()->route('admin.size.index')->with('success','Size deleted successfully !');
    }
}
