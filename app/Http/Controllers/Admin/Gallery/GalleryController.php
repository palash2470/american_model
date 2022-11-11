<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
class GalleryController extends Controller
{
    
    /* galary image */
    public function index(Request $request){
        $albums = GalleryAlbum::all();
        if ($request->ajax()) {
            $data = Gallery::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.gallery.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.gallery.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>' ;
        
                            return $btn;
                        })
                        ->addColumn('image_name',function($row){
                            return $img = '<img src="'.url('/img/gallery/'.$row->image.'').'" alt="Girl in a jacket" width="100px">
                            ';
                        })
                        ->rawColumns(['action','image_name'])
                        ->make(true);
        }
        return view('admin.gallery.gallery',compact('albums')); 
    }
    public function store(Request $request){
        //dd($request->all());
        $this->validate($request, [
            //'name'  => 'required|unique:home_banners,name',
            //'desc'  => 'required',
            'album'  => 'required',
            'image_name'  => 'required|image|mimes:jpg,png,gif,jpeg',
        ]);
        $image_name='';
        if($request->file('image_name')){
            $file= $request->file('image_name');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/gallery'), $filename);
           $image_name = $filename;
        }
        Gallery::create([
            'name' => $request['name'],
            'album_id' => $request['album'],
            'image' => $image_name,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('admin.gallery.index')->with('success','Add Gallery Image successfully !');  
    }
    public function edit(Request $request, $id){
        $albums = GalleryAlbum::all();
        if ($request->ajax()) {
            $data = Gallery::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<ul class="datatable-action-btn">';
                           $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.gallery.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                           $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.gallery.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                           $btn .= '</ul>' ;
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $gallery = Gallery::where('id',$id)->first();
        return view('admin.gallery.gallery',compact('id','gallery','albums'));
    }
    public function update(Request $request){
        if($request->file('image_name')){
            $file= $request->file('image_name');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/gallery'), $filename);
           $image_name = $filename;
           Gallery::where('id',$request['id'])->update([
            'name' => $request['name'],
            'album_id' => $request['album'],
            'image' => $image_name,
        ]);
        }
        Gallery::where('id',$request['id'])->update([
            'name' => $request['name'],
            'album_id' => $request['album'],
        ]);
        return redirect()->route('admin.gallery.index')->with('success','Gallery Image updated successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        Gallery::find($id)->delete();
        return redirect()->route('admin.gallery.index')->with('success','Gallery image deleted successfully !');
    }
}
