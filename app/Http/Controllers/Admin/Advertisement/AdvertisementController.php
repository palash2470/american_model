<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use DataTables;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Advertisement::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.advertisement.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn" href="'.route('admin.advertisement.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>';
                            return $btn;
                        })
                        ->addColumn('image_name',function($row){
                            return $img = '<img src="'.url('/img/home/'.$row->image_name.'').'" alt="Girl in a jacket" width="100px">
                            ';
                        })
                        ->rawColumns(['action','image_name'])
                        ->make(true);
        }
        
        return view('admin.advertisement.advertisement');
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
        $image_name = '';
        if($request->file('image_name')){
            $file= $request->file('image_name');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/home'), $filename);
            $image_name = $filename;
        }
        Advertisement::create([
            'name' => $request['name'],
            'image_name' => $image_name,
            'link' => $request['link'],

        ]);
        return redirect()->route('admin.advertisement.index')->with('success','Add Advertisement successfully !');
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
            $data = Advertisement::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<ul class="datatable-action-btn">';
                        $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.advertisement.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                        $btn .= '<li><a class="delBtn delete-btn" href="'.route('admin.advertisement.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                        $btn .= '</ul>';
       
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $advertisements = Advertisement::where('id',$id)->first();
        return view('admin.advertisement.advertisement',compact('id','advertisements'));
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
        Advertisement::where('id',$request['id'])->update([
            'name' => $request['name'],
            'link' => $request['link'],
        ]);
        if($request->file('image_name')){
            $file= $request->file('image_name');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/home'), $filename);
            $image_name = $filename;
            Advertisement::where('id',$request['id'])->update([
                'image_name' => $image_name,
            ]);
        }
        return redirect()->route('admin.advertisement.index')->with('success','Advertisement updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advertisement::where('id',$id)->delete();
        return redirect()->route('admin.advertisement.index')->with('success','Advertisement deleted successfully !');
    }
}
