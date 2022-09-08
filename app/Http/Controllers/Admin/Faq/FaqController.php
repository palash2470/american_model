<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Faq::all();
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.faq.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                            $btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                            $btn .= '<a class="delBtn" href="'.route('admin.faq.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.faq.faq');
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
            'question'  => 'required',
            'ans'  => 'required',
        ]);
        Faq::create([
            'question' => $request['question'],
            'ans' => $request['ans'],
            'status' => '1',
        ]);
        return redirect()->route('admin.faq')->with('success','Add faq successfully !');
       
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
        if ($request->ajax()) {
            $data = Faq::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a class="edtBtn" href="'.route('admin.faq.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                           $btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                           $btn .= '<a class="delBtn" href="'.route('admin.faq.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $faq = Faq::where('id',$id)->first();
        //dd($faq);
        return view('admin.faq.faq',compact('id','faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        Faq::where('id',$request['id'])->update([
            'question' => $request['question'],
            'ans' => $request['ans'],
        ]);
        return redirect()->route('admin.faq')->with('success','Faq updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::where('id',$id)->delete();
        return redirect()->route('admin.faq')->with('success','Faq deleted successfully !');
    }
}
