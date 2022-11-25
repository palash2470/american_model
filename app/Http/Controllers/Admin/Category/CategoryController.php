<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PlanGroup;
use DataTables;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.category.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            //$btn .= '<li><a class="delBtn delete-btn delete-item" href="'.route('admin.category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>' ;  
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        $plan_groups = PlanGroup::all();
        return view('admin.category.category',compact('plan_groups'));
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
            'name'  => 'required|unique:categories,name',
            'plan_group_id'  => 'required',
        ]);
        Category::create([
            'name' => $request['name'],
            'plan_group_id' => $request['plan_group_id'],
            'slug' => Str::slug($request['name'])
        ]);
        return redirect()->route('admin.category.index')->with('success','Add Category successfully !');
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
            $data = Category::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.category.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>' ; 
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $get_category = Category::where('id',$id)->first();
        $plan_groups = PlanGroup::all();
        return view('admin.category.category',compact('id','get_category','plan_groups'));
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
            'name'  => 'required|unique:categories,name,'.$request->id,
            'plan_group_id'  => 'required',
        ]);
        Category::where('id',$request['id'])->update([
            'name' => $request['name'],
            'plan_group_id' => $request['plan_group_id'],
        ]);
        return redirect()->route('admin.category.index')->with('success','Category updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.category.index')->with('success','Category deleted successfully !');
    }
}
