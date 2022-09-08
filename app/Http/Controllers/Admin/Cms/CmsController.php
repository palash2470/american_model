<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\PlanPackage;
use DataTables;
use DB;
use Illuminate\Support\Str;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Cms::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.edit.cms',$row['id']).'"><i class="fas fa-edit"></i></a>';
                            $btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                            //$btn .= '<a class="delBtn" href="'.route('admin.delete.plan',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.cms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.create');
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
            'page_name'  => 'required',
        ]);
        DB::beginTransaction();
        try{

            $cms = Cms::create([
                'page_name' => $request->page_name,
                'slug'      => Str::slug($request->page_name),
                'content'   => $request->content,
                'status'    => '1',
            ]);
            DB::commit();
            return redirect()->route('admin.cms')->with('success','Add CMS page successfully !');
        }catch( \Exception $e){
            DB::rollback();
            return redirect()->route('admin.cms')->with('error','something went wrong!');
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
        $cms = cms::where('id',$id)->first();
        return view('admin.cms.edit',compact('id','cms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'page_name'  => 'required',
        ]);
        //DB::beginTransaction();
        try{
            Cms::where('id',$request['id'])->update([
                'page_name' => $request->page_name,
                'content'   => $request->content,
                //'status'    => '1',
            ]);
            //DB::commit();
            return redirect()->route('admin.cms')->with('success','Cms page updated successfully !');
        }catch( \Exception $e){
           // DB::rollback();
            return $e;
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
}
