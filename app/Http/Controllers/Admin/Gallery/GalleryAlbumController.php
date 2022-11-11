<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
class GalleryAlbumController extends Controller
{
    
    /* galary image */
    public function index(Request $request){
        if ($request->ajax()) {
            $data = GalleryAlbum::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<ul class="datatable-action-btn">';
                            $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.gallery.album.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                            $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.gallery.album.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                            $btn .= '</ul>' ;
        
                            return $btn;
                        })
                        ->addColumn('image_name',function($row){
                            return $img = '<img src="'.url('/img/album/'.$row->image.'').'" alt="Girl in a jacket" width="100px">
                            ';
                        })
                        ->rawColumns(['action','image_name'])
                        ->make(true);
        }
        return view('admin.gallery.album'); 
    }
    public function store(Request $request){
        //dd($request->all());
        $this->validate($request, [
            'name'  => 'required|unique:gallery_albums,name',
            //'desc'  => 'required',
            'image'  => 'required|image|mimes:jpg,png,gif,jpeg',
        ]);
        $image='';
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/album'), $filename);
           $image = $filename;
        }
        GalleryAlbum::create([
            'name' => $request['name'],
            'image' => $image,
        ]);
        return redirect()->route('admin.gallery.album.index')->with('success','Add Album successfully !');  
    }
    public function edit(Request $request, $id){
        if ($request->ajax()) {
            $data = GalleryAlbum::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<ul class="datatable-action-btn">';
                           $btn .= '<li><a class="edtBtn edit-btn" href="'.route('admin.gallery.album.edit',$row['id']).'"><i class="fas fa-edit"></i></a></li>';
                           $btn .= '<li><a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.gallery.album.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a></li>';
                           $btn .= '</ul>' ;
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $album = GalleryAlbum::where('id',$id)->first();
        return view('admin.gallery.album',compact('id','album'));
    }
    public function update(Request $request){
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/album'), $filename);
           $image = $filename;
           GalleryAlbum::where('id',$request['id'])->update([
            'name' => $request['name'],
            'image' => $image,
        ]);
        }
        GalleryAlbum::where('id',$request['id'])->update([
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.gallery.album.index')->with('success','Album updated successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        GalleryAlbum::find($id)->delete();
        return redirect()->route('admin.gallery.album.index')->with('success','Album deleted successfully !');
    }
}
