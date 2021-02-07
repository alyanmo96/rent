<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use DB;
use Validator;
use App\Models\rent_post;
use App\Models\tenant;
use App\Models\admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function Admin_view(){
        return view('Admin');
    }

    public function admin_get_message(){
        return view('admin_get_message');
    }
    
    public function admin_edit_posts_show(){
        $rents = rent_post::latest('id')->get();
        return view('admin_edit_posts',['post'=>$rents]);
    }

    public function admin_edit_tenant_posts_show(){
        $tenants = tenant::latest('id')->get();
        return view('admin_edit_tenants_posts',['post'=>$tenants]);
    }

    public function admin_check_new_posts_show(){
        $rents = rent_post::latest('id')->get();
        $tenants = tenant::latest('id')->get();
        return view('admin_check_new_posts_show',['rent_post'=>$rents,'tenant'=>$tenants]);
    }

    public function admin_delete_post_as_new($id){
        $rents = rent_post::where('post_id', '=', $id)->first();
        $tenants = tenant::where('post_id', '=', $id)->first();

        if($rents){
            $rents->showToAdmin='yes';
            $rents->save();
        }elseif($tenants){
            $tenants->showToAdmin='yes';
            $tenants->save();
        }
        $rents = rent_post::latest('id')->get();
        $tenants = tenant::latest('id')->get();
        return view('admin_check_new_posts_show',['rent_post'=>$rents,'tenant'=>$tenants])->with('delete_success','تم حذف المنشور من قائمة الجدد');
    }


    public function update_post_by_admin(Request $request){
        $get_post_num=$request->input('post_num');
        $user = rent_post::where('post_id',$get_post_num)->get();
        if($user){
            $object = json_decode(json_encode($user[0]));
            $id=$object->id;                    
        }
        switch ($request->input('action')) {
            case 'upload':                
                if($request->input('phone')!=null&&$request->input('description')!=null){
                    $description = $request->input('description');
                    $phone = $request->input('phone');
                    $s = DB::update('update rent_post set phone=?,description = ? where id = ?',[$phone,$description,$id]);
                }
                elseif($request->input('phone')!=null&&$request->input('description')==null){
                    $phone = $request->input('phone');
                    $update_data = DB::update('update rent_post set phone = ? where id = ?',[$phone,$id]);
                }
                if($request->input('phone')==null&&$request->input('description')!=null){
                    $description = $request->input('description');
                    $update_data = DB::update('update rent_post set description = ? where id = ?',[$description,$id]);
                }                
                return redirect()->route('admin_edit_posts.show')->with('update_success','لقد تم التعديل بنجاح');
                break;
    
            case 'delete':
                $delete_data = DB::delete('delete from rent_post where id = ?',[$id]);
                return redirect()->route('admin_edit_posts.show')->with('delete_success','لقد تم الحذف بنجاح, شكراً لإستخدامكم موقف أجارك');
                break;
        }
    }

    public function update_tenant_post_by_admin(Request $request){
        $get_post_num=$request->input('post_num');
        $user = tenant::where('post_id',$get_post_num)->get();
        if($user){
            $object = json_decode(json_encode($user[0]));
            $id=$object->id;                    
        }
        switch ($request->input('action')) {
            case 'upload':                
                if($request->input('description')!=null){
                    $description = $request->input('description');
                    $update_data = DB::update('update tenant set description = ? where id = ?',[$description,$id]);
                }      
                return redirect()->route('admin_edit_tenant_posts.show')->with('update_success','لقد تم التعديل بنجاح');
                break;
    
            case 'delete':
                $delete_data = DB::delete('delete from tenant where id = ?',[$id]);
                return redirect()->route('admin_edit_tenant_posts.show')->with('delete_success','لقد تم الحذف بنجاح, شكراً لإستخدامكم موقف أجارك');
                break;
        }
    }

}
