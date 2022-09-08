<?php

namespace App\Http\Controllers\Admin\Colour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colour;
use DataTables;

class ColourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Colour::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.colour.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                            //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                            //$btn .= '<a class="delBtn" href="'.route('admin.colour.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
        
                                return $btn;
                        })
                        ->addColumn('eye', function($row){
                            return $row['eye'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                            ' ;
                        })
                        ->addColumn('skin', function($row){
                            return $row['skin'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                            ' ;
                        })
                        ->addColumn('hair', function($row){
                            return $row['hair'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                            ' ;
                        })
                        ->rawColumns(['action','eye','skin','hair'])
                        ->make(true);
        }
        
        return view('admin.colour.colour');
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
        Colour::create([
            'name' => $request['name'],
            'eye' => $request->has('eye') ? 1 : 0,
            'skin' => $request->has('skin') ? 1 : 0,
            'hair' => $request->has('hair') ? 1 : 0,
        ]);
        return redirect()->route('admin.colour.index')->with('success','Add Colour successfully !');
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
            $data = Colour::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a class="edtBtn" href="'.route('admin.category.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                           //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                           //$btn .= '<a class="delBtn" href="'.route('admin.category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
       
                            return $btn;
                    })
                    ->addColumn('eye', function($row){
                        return $row['eye'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                        ' ;
                    })
                    ->addColumn('skin', function($row){
                        return $row['skin'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                        ' ;
                    })
                    ->addColumn('hair', function($row){
                        return $row['hair'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fa fa-times-circle" aria-hidden="true"></i>
                        ' ;
                    })
                    ->rawColumns(['action','eye','skin','hair'])
                    ->make(true);
        }
        $get_colour = Colour::where('id',$id)->first();
        return view('admin.colour.colour',compact('id','get_colour'));
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
        Colour::where('id',$request['id'])->update([
            'name' => $request['name'],
            'eye' => $request->has('eye'),
            'skin' => $request->has('skin'),
            'hair' => $request->has('hair'),
        ]);
        return redirect()->route('admin.colour.index')->with('success','Colour updated successfully !');
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
