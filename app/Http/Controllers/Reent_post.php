<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use DB;
use Validator;
use App\Models\rent_post;
use App\Models\tenant;
//use App\Models\admin;


class Reent_post extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /*public function login_admin(Request $request){
        $admin = admin::latest('id')->get();
        $object = json_decode(json_encode($admin[0]));
        if($request->input('username')==$object->username &&$request->input('password')==$object->password ){
            return view('Admin');
        }else{
            return view('Login');
        }
    }

    
    function logout(){
        Auth::logout();
        return redirect('/');
    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $Rent = new rent_post();
        $Rent->name=$request->input('name');
        $Rent->phone=$request->input('phone');
        $Rent->area=$request->input('area');
        $Rent->build_type=$request->input('build_type');
        $Rent->parking=$request->input('parking');
        $Rent->rooms=$request->input('rooms');
        $Rent->description=$request->input('description');
        $Rent->showToAdmin='no';
        $random_post_id=Str::random(12);
        $other_post_ids = rent_post::where('post_id', '=', $random_post_id)->first();
        if ($other_post_ids !== null) {
            $random_post_id=Str::random(12);
        }
        $Rent->post_id=$random_post_id;
        $Rent->save();
        $string_to_share="تم نشر إعلانك بنجاح. رقم المنشور الخاص بك";
        $string_to_share.=' ';
        $string_to_share.=$random_post_id;
        $string_to_share.='. سيتم أيضاً إرسالة رسالة واتس أب تضمن كامل التفاصيل.';
        return redirect()->route('main.show')->with('publish_success',$string_to_share);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tenant_store(Request $request){
        $Rent = new tenant();
        $Rent->description=$request->input('description');
        $Rent->area=$request->input('area');
        $Rent->showToAdmin='no';
        $random_post_id=Str::random(12);
        $other_post_ids = tenant::where('post_id', '=', $random_post_id)->first();
        if($other_post_ids !== null) {
            $random_post_id=Str::random(12);
        }
        $Rent->post_id=$random_post_id;
        $Rent->save();
        $string_to_share="تم نشر إعلانك بنجاح. رقم المنشور الخاص بك";
        $string_to_share.=' ';
        $string_to_share.=$random_post_id;
        $string_to_share.='. سيتم أيضاً إرسالة رسالة واتس أب تضمن كامل التفاصيل.';
        return redirect()->route('main.show')->with('publish_success',$string_to_share);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $rents = rent_post::latest('id')->get();
        return view('posts',['post'=>$rents]);
    }

    public function tenants_show(){
        $tenants = tenant::latest('id')->get();
        return view('tenants_show',['post'=>$tenants]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }

    public function search(){
        return view('search');
    }

    public function direct_to_edit(){
        return view('edit_post');
    }
    
    public function edit_post_by_user(Request $request){
        $get_post_num=$request->input('post_num');
        $post_num = rent_post::where('post_id', '=', $get_post_num)->first();
        $post_tenant_num = tenant::where('post_id', '=', $get_post_num)->first();
        if ($post_num !== null) {//display all post details
            $user = rent_post::where('post_id',$get_post_num)->get();
            if($user){
               $object = json_decode(json_encode($user[0]));
            //return view('list_post_detailes',['post'=>$object]); 
                return view('list_post_detailes',['post'=>$user]);           
            }else{
                return redirect()->route('edit.show')->with('edit_redirect_failed','رقم المنشور الذي تم إدخاله غير صحيح. لمعلومات أوفى قم بالتواصل مع طاقم الموقع.');
            }            
        }elseif($post_tenant_num !== null){
            $user = tenant::where('post_id',$get_post_num)->get();
            if($user){
               $object = json_decode(json_encode($user[0]));
            //return view('list_post_detailes',['post'=>$object]); 
                return view('list_tenant_post_detailes',['post'=>$user]);           
            }else{
                return redirect()->route('edit.show')->with('edit_redirect_failed','رقم المنشور الذي تم إدخاله غير صحيح. لمعلومات أوفى قم بالتواصل مع طاقم الموقع.');
            }
        }
        else{
            return redirect()->route('edit.show')->with('edit_redirect_failed','رقم المنشور الذي تم إدخاله غير صحيح. لمعلومات أوفى قم بالتواصل مع طاقم الموقع.');
        }
    }

    public function update_post_by_tenant(Request $request){
        $get_post_num=$request->input('post_num');
        $tenant_user = tenant::where('post_id',$get_post_num)->get();
        if($tenant_user){     
            $object = json_decode(json_encode($tenant_user[0]));
            $id=$object->id; 
            switch ($request->input('action')) {
                case 'upload':                
                    if($request->input('description')!=null){
                        $description = $request->input('description');
                        $update_data = DB::update('update tenant set description = ? where id = ?',[$description,$id]);
                    }                
                    return redirect()->route('main.show')->with('update_success','لقد تم التعديل بنجاح');
                    break;
        
                case 'delete':
                    $delete_data = DB::delete('delete from tenant where id = ?',[$id]);
                    return redirect()->route('main.show')->with('delete_success','لقد تم الحذف بنجاح, شكراً لإستخدامكم موقف أجارك');
                    break;
            }
        }
    }

    public function update_post(Request $request){
        $get_post_num=$request->input('post_num');
        $user = rent_post::where('post_id',$get_post_num)->get();
        if($user){
            $object = json_decode(json_encode($user[0]));
            $id=$object->id; 
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
                    return redirect()->route('main.show')->with('update_success','لقد تم التعديل بنجاح');
                    break;
        
                case 'delete':
                    $delete_data = DB::delete('delete from rent_post where id = ?',[$id]);
                    return redirect()->route('main.show')->with('delete_success','لقد تم الحذف بنجاح, شكراً لإستخدامكم موقف أجارك');
                    break;
            }
        }        
    }

    public function search_by_user(Request $request){
        if($request->input('area')!=null&&($request->input('build_type')==1||$request->input('build_type')==2)){
            $search_area=$request->input('area');
            $search_build_type=$request->input('build_type');
            $search_post = rent_post::where('area', '=', $search_area)->where('build_type', '=', $search_build_type)->get();
            if(count($search_post)==0){
                return view('search',['post'=>$search_post])->with('no_search_input','لاتوجد بعد أي نتائج توافق مدخلات البحث');
            }else{
                return view('search',['post'=>$search_post]);
            }
        }
        elseif($request->input('area')!=null&&$request->input('build_type')!=1&&$request->input('build_type')!=2){
            $search_area=$request->input('area');
            $search_post = rent_post::where('area', '=', $search_area)->get();
            if(count($search_post)==0){
                return view('search',['post'=>$search_post])->with('no_search_input','لاتوجد بعد أي نتائج توافق مدخلات البحث');
            }else{
                return view('search',['post'=>$search_post]);
            }
        }
        elseif($request->input('area')==null&&($request->input('build_type')==1||$request->input('build_type')==2)){
            $search_build_type=$request->input('build_type');
            $search_post = rent_post::where('build_type', '=', $search_build_type)->get();
            if(count($search_post)==0){
                return view('search',['post'=>$search_post])->with('no_search_input','لاتوجد بعد أي نتائج توافق مدخلات البحث');
            }else{
                return view('search',['post'=>$search_post])->with('search_just_about_build','تم البحث عن عقار دون تحديد المنطقة');
            }
        }
        else{
            return redirect()->route('search.show')->with('search_faild','يرجى إختيار مدخل(منطقة/نوع مبنى) ليتم البحث عنه');      
            /* $str=url()->current();
            if (strpos($str, 'main') !== false){
                return redirect()->route('main.show')->with('search_faild','يرجى إختيار مدخل(منطقة/نوع مبنى) ليتم البحث عنه');
            }else{
                return redirect()->route('search.show')->with('search_faild','يرجى إختيار مدخل(منطقة/نوع مبنى) ليتم البحث عنه');
            }*/
        }
    }

    public function edit_specific_post(Request $request){
        $get_post_num=$request->input('action');
        $post_num = rent_post::where('post_id', '=', $get_post_num)->first();
        if ($post_num !== null) {//display all post details
            $user = rent_post::where('post_id',$get_post_num)->get();
            if($user){
               $object = json_decode(json_encode($user[0]));
                return view('specific_post_to_edit',['post'=>$user]);           
            }           
        }
    }

    public function edit_specific_tenant_post(Request $request){
        $get_post_num=$request->input('action');
        $post_num = tenant::where('post_id', '=', $get_post_num)->first();
        if ($post_num !== null) {//display all post details
            $user = tenant::where('post_id',$get_post_num)->get();
            if($user){
               $object = json_decode(json_encode($user[0]));
                return view('edit_specific_tenant_post',['post'=>$user]);           
            }           
        }
    }

    public function search_method(){

        $rents = rent_post::latest('id')->get();
        return view('search',['post'=>$rents]);
    }

    public function search_to_find_method(){
        return view('search_to_find',['post']);
    }


    public function search_to_find_by_user(Request $request){
        if($request->input('area')!=null){
            $search_area=$request->input('area');
            $search_post = tenant::where('area', '=', $search_area)->get();
            if(count($search_post)==0){
                return view('search_to_find',['post'=>$search_post])->with('no_search_input','لاتوجد بعد أي نتائج توافق مدخلات البحث');
            }else{
                return view('search_to_find',['post'=>$search_post]);
            }
        }
        else{
            return redirect()->route('find.show')->with('search_faild','يرجى إختيار مدخل(منطقة/نوع مبنى) ليتم البحث عنه');
        }
    }
}
