<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Settings;
class SettingController extends Controller
{
    public function edit(){
        $settings = Settings::where('id',1)->first();
        //dd($settings);
        return view('admin.setting.edit',compact('settings'));
    }
    public function update(Request $request){
        //dd($request->all());
        $request->validate([
            //'order_tax' => 'required',
        ]);
        if($request->file('home_poll_image')){
            $file= $request->file('home_poll_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/home'), $filename);
            $image_name = $filename;
            Settings::where('id',$request['id'])->update([
                'home_poll_image' => $image_name,
            ]);
        }
        
        if($request->file('home_shop_image')){
            $file= $request->file('home_shop_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/home'), $filename);
            $image_name = $filename;
            Settings::where('id',$request['id'])->update([
                'home_shop_image' => $image_name,
            ]);
        }
        
        if($request->file('home_add_img1')){
            $file= $request->file('home_add_img1');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/home'), $filename);
            $image_name = $filename;
            Settings::where('id',$request['id'])->update([
                'home_add_img1' => $image_name,
            ]);
        }
        if($request->file('home_add_img2')){
            $file= $request->file('home_add_img2');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/home'), $filename);
            $image_name = $filename;
            Settings::where('id',$request['id'])->update([
                'home_add_img2' => $image_name,
            ]);
        }
        Settings::where('id',$request->id)
            ->update([
                'home_shop_category'     => $request->home_shop_category,
                'home_shop_discount' => $request->home_shop_discount,
                'home_shop_details'  => $request->home_shop_details,
                'home_add_img1_link' => $request->home_add_img1_link,
                'home_add_img2_link'    => $request->home_add_img2_link,
                'newest_face'           => $request->newest_face,
                'featured_models'           => $request->featured_models,
                'child_model_and_acting'           => $request->child_model_and_acting,
                'top_photographer'           => $request->top_photographer,
                'convention_and_trade_show_model'           => $request->convention_and_trade_show_model,
                'shop_section'           => $request->shop_section,
                'advertisement_section'           => $request->advertisement_section,
                'menu_about_us'           => $request->menu_about_us,
                'menu_search'           => $request->menu_search,
                'menu_become_a_member'           => $request->menu_become_a_member,
                'menu_blog'           => $request->menu_blog,
                'menu_job'           => $request->menu_job,
                'top_header_address'           => $request->top_header_address,
                'top_header_phone_no'           => $request->top_header_phone_no,
                'plan_faq'           => $request->plan_faq,
                'plan_hw_do_upgrade'           => $request->plan_hw_do_upgrade,
            
            ]);
        return redirect()->route('admin.setting.edit',1);
    }
    public function bannerIndex(Request $request){
        if ($request->ajax()) {
            $data = HomeBanner::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.home_banner.edit',$row['id']).'"><i class="fas fa-edit"></i></a>';
                            $btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                            //$btn .= '<a class="delBtn" href="'.route('admin.home_banner.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
                            $btn .= '<a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.home_banner.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
        
                                return $btn;
                        })
                        ->addColumn('image_name',function($row){
                            return $img = '<img src="'.url('/img/home_banner/'.$row->image_name.'').'" alt="Girl in a jacket" width="100px">
                            ';
                        })
                        ->addColumn('status',function($row){
                            return $row->status == 1 ? 'Active' : 'Inactive';
                        })
                        ->rawColumns(['action','image_name','status'])
                        ->make(true);
        }
        return view('admin.setting.home_banner.banner'); 
    }
    public function bannerStore(Request $request){
        $this->validate($request, [
            'name'  => 'required|unique:home_banners,name',
            //'desc'  => 'required',
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
            'sl_no' => $request['sl_no'],
            'image_name' => $image_name,
            'status' => $request['status'],
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
                           //$btn .= '<a class="delBtn" href="'.route('admin.home_banner.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
                           $btn .= '<a class="delBtn delete-btn delete-item" href="#" data-url="'.route('admin.home_banner.delete',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
       
                            return $btn;
                    })
                    ->addColumn('status',function($row){
                        return $row->status == 1 ? 'Active' : 'Inactive';
                    })
                    ->rawColumns(['action','status'])
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
            'sl_no' => $request['sl_no'],
            'status' => $request['status'],
        ]);
        return redirect()->route('admin.home_banner.index')->with('success','Home Banner updated successfully !');
    }
    public function bannerDelete($id){
        $home_banner = HomeBanner::where('id',$id)->first();
        if($home_banner){
            unlink(public_path('/img/home_banner/'.$home_banner->image_name));
            HomeBanner::find($id)->delete();
            return redirect()->route('admin.home_banner.index')->with('success','Home Banner deleted successfully !');
        }else{
            return back()->with('error','something went wrong!');
        }
    }
}
