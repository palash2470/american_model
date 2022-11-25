<?php

namespace App\Http\Controllers\Admin\ImageCategory;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\ImageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
class ImageCategoryController extends Controller
{
    
    /* galary image */
    public function index(Request $request){
        if ($request->ajax()) {
            $data = ImageCategory::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.image_category.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            /* $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.image_category.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>'; */
                            $btn .= '</ul>' ;
        
                            return $btn;
                        })
                        ->addColumn('image_name',function($row){
                            return $img = '<img src="'.url('/img/photo_cat_image/'.$row->image.'').'" alt="Girl in a jacket" width="100px">
                            ';
                        })
                        ->addColumn('status',function($row){
                                if($row->status == 0){
                                    return 'Inactive';
                                }else{
                                    return 'Active';
                                }
                            
                        })
                        ->rawColumns(['action','image_name','status'])
                        ->make(true);
        }
        return view('admin.image_category.image_category'); 
    }
    public function store(Request $request){
        //dd($request->all());
        $this->validate($request, [
            'name'  => 'required|unique:image_categories,name',
            //'desc'  => 'required',
            'image'  => 'required|image|mimes:jpg,png,gif,jpeg',
        ]);
        $image='';
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/photo_cat_image'), $filename);
            $image = $filename;
        }
        ImageCategory::create([
            'name' => $request['name'],
            'image' => $image,
        ]);
        return redirect()->route('admin.image_category.index')->with('success','Add image category successfully !');  
    }
    public function edit(Request $request, $id){
        if ($request->ajax()) {
            $data = ImageCategory::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<ul class="datatable-action-btn">';
                           $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.image_category.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                           //$btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.gallery.album.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                           $btn .= '</ul>' ;
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $image_category = ImageCategory::where('id',$id)->first();
        return view('admin.image_category.image_category',compact('id','image_category'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'name'  => 'required|unique:image_categories,name,'.$request->id,
            //'desc'  => 'required',
            'image'  => 'nullable|image|mimes:jpg,png,gif,jpeg',
        ]);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/photo_cat_image'), $filename);
           $image = $filename;
           ImageCategory::where('id',$request['id'])->update([
            'name' => $request['name'],
            'image' => $image,
            'status' => $request['status'],
        ]);
        }
        ImageCategory::where('id',$request['id'])->update([
            'name' => $request['name'],
            'status' => $request['status'],
        ]);
        return redirect()->route('admin.image_category.index')->with('success','Image category updated successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        ImageCategory::find($id)->delete();
        return redirect()->route('admin.gallery.album.index')->with('success','Album deleted successfully !');
    }
}
