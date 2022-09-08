<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
//use App\Models\Setting;
class SettingController extends Controller
{
    public function edit(){
        //$settings = Setting::where('id',1)->first();
        return view('admin.setting.edit',compact('settings'));
    }
   /*  public function update(Request $request){
        $request->validate([
            'order_tax' => 'required',
        ]);
        Setting::where('id',$request->id)
            ->update([
                'order_tax'     => $request->order_tax,
                'facebook_link' => $request->facebook_link,
                'twitter_link'  => $request->twitter_link,
                'linkedin_link' => $request->linkedin_link,
                'insta_link'    => $request->insta_link,
            
            ]);
        return redirect()->route('admin.setting.edit',1);
    } */
    public function bannerIndex(Request $request){
        if ($request->ajax()) {
            $data = HomeBanner::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.home_banner.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                            $btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                            $btn .= '<a class="delBtn" href="'.route('admin.home_banner.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        return view('admin.setting.home_banner.banner'); 
    }
    public function bannerStore(Request $request){
        $this->validate($request, [
            'name'  => 'required|unique:home_banners,name',
            'desc'  => 'required',
            'image_name'  => 'required',
        ]);
        $image_name='';
        if($request->file('image_name')){
            $file= $request->file('image_name');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/home_banner'), $filename);
           $image_name = $filename;
        }
        HomeBanner::create([
            'name' => $request['name'],
            'desc' => $request['desc'],
            'image_name' => $image_name,
        ]);
        return redirect()->route('admin.home_banner.index')->with('success','Add Home banner successfully !');  
    }
    public function bannerEdit(Request $request, $id){
        if ($request->ajax()) {
            $data = HomeBanner::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a class="edtBtn" href="'.route('admin.home_banner.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                           $btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                           $btn .= '<a class="delBtn" href="'.route('admin.home_banner.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $banner = HomeBanner::where('id',$id)->first();
        return view('admin.setting.home_banner.banner',compact('id','banner'));
    }
    public function bannerUpdate(Request $request){
        if($request->file('image_name')){
            $file= $request->file('image_name');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/home_banner'), $filename);
           $image_name = $filename;
           HomeBanner::where('id',$request['id'])->update([
            'name' => $request['name'],
            'image_name' => $image_name,
        ]);
        }
        HomeBanner::where('id',$request['id'])->update([
            'name' => $request['name'],
            'desc' => $request['desc'],
        ]);
        return redirect()->route('admin.home_banner.index')->with('success','Home Banner updated successfully !');
    }
    public function bannerDelete(){
        
    }
}
