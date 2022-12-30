<?php

namespace App\Http\Controllers\Admin\JobCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use DataTables;
use Illuminate\Support\Str;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JobCategory::orderBy('name')->get();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
     
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.job_category.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.job_category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>' ;
                           //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                           //$btn .= '<a class="delBtn" href="'.route('admin.category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
       
                            return $btn;
                    })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.job_category.job_category');
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
            'name'  => 'required',
        ]);
        JobCategory::create([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
        ]);
        return redirect()->route('admin.job_category.index')->with('success','Add job category successfully !');
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
            $data = JobCategory::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                        $btn = '<ul class="datatable-action-btn">';
                        $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.job_category.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                        $btn .= '<li><a class="delBtn delete-btn" href="'.route('admin.job_category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                        $btn .= '</ul>' ;
       
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $jobCategory = JobCategory::where('id',$id)->first();
        return view('admin.job_category.job_category',compact('id','jobCategory'));
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
            'name'  => 'required',
        ]);
        JobCategory::where('id',$request['id'])->update([
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.job_category.index')->with('success','Job Category updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        JobCategory::find($id)->delete();
        return redirect()->route('admin.job_category.index')->with('success','Job Category deleted successfully !');
    }
}
