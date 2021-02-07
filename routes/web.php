<?php

use Illuminate\Support\Facades\Route;


////////////////////////////////Routes//////////////////////////////
Route::get('/',"Reent_post@index");
Route::get('/',"Reent_post@index")->name('main.show');
Route::get('/posts',"Reent_post@show");
Route::get('/contact', function () {return view('contact');});
Route::post('/send_message',"messageController@store");
Route::get('/about', function (){return view('About');});
Route::get('/edit_post', function () {return view('edit_post');});
Route::get('/edit_post',"Reent_post@direct_to_edit")->name('edit.show');
Route::get('/list_post_detailes', function () {return view('list_post_detailes');});
Route::get('/publish', function () {return view('publish');});
Route::get('/publish_of_tenant', function () {return view('publish_of_tenant');});
Route::get('/tenants',"Reent_post@tenants_show");
Route::get('/search', function () {return view('search');});
Route::get('/search',"Reent_post@search_method")->name('search.show');
Route::post('/search',"Reent_post@search_by_user");
Route::get('/find', function () {return view('search_to_find');});
Route::get('/find',"Reent_post@search_to_find_method")->name('find.show');
Route::post('/search_to_find',"Reent_post@search_to_find_by_user");
Route::post('/user_share',"Reent_post@store");
Route::post('/tenant_share',"Reent_post@tenant_store");
Route::post('/user_edit_post',"Reent_post@edit_post_by_user");
Route::post('/update_post',"Reent_post@update_post");
Route::post('/update_post_by_tenant',"Reent_post@update_post_by_tenant");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'Admin_view'])->name('home');


///////////////////////////////////ADMIN//////////////////////////////////////////
/*Route::get('/ajark_admin_login_in_it_man', function () {return view('Login');});
Route::post('/login_admin',"Reent_post@login_admin");
Route::get('/ajark_admin_it_man',"Reent_post@Admin_view");
*/
//Route::get('/admin_edit_posts',"Reent_post@admin_edit_posts_show");
//Route::get('/admin_edit_posts',"Reent_post@admin_edit_posts_show")->name('admin_edit_posts.show');
Route::get('/admin_edit_posts', [App\Http\Controllers\HomeController::class, 'admin_edit_posts_show'])->name('admin_edit_posts');


//Route::post('/admin_edit_specific_post',"Reent_post@edit_specific_post");
Route::post('/admin_edit_specific_post', [App\Http\Controllers\HomeController::class, 'edit_specific_post']);


//Route::post('/admin_update_post',"Reent_post@update_post_by_admin");
Route::post('/admin_update_post', [App\Http\Controllers\HomeController::class, 'update_post_by_admin']);


//Route::get('/admin_edit_tenant_posts',"Reent_post@admin_edit_tenant_posts_show");
Route::get('/admin_edit_tenant_posts', [App\Http\Controllers\HomeController::class, 'admin_edit_tenant_posts_show']);


//Route::get('/admin_edit_tenant_posts_show',"Reent_post@admin_edit_tenant_posts_show")->name('admin_edit_tenant_posts_show.show');
Route::get('/admin_edit_tenant_posts_show', [App\Http\Controllers\HomeController::class, 'admin_edit_tenant_posts_show'])->name('admin_edit_tenant_posts_show.show');


//Route::post('/admin_edit_specific_tenant_post',"Reent_post@edit_specific_tenant_post");
Route::post('/admin_edit_specific_tenant_post', [App\Http\Controllers\HomeController::class, 'edit_specific_tenant_post']);


Route::post('/admin_update_tenant_post',"Reent_post@update_tenant_post_by_admin");
Route::post('/admin_update_tenant_post', [App\Http\Controllers\HomeController::class, 'update_tenant_post_by_admin']);


//Route::get('/admin_check_new_posts',"Reent_post@admin_check_new_posts_show");
Route::get('/admin_check_new_posts', [App\Http\Controllers\HomeController::class, 'admin_check_new_posts_show']);


//Route::get('/admin_delete_post_as_new/{id}',"Reent_post@admin_delete_post_as_new");
Route::get('/admin_delete_post_as_new/{id}', [App\Http\Controllers\HomeController::class, 'admin_delete_post_as_new']);


//Route::get('/admin_get_message', function () {return view('admin_get_message');});
Route::get('/admin_get_message', [App\Http\Controllers\HomeController::class, 'admin_get_message']);


Route::get('/admin_get_message',"messageController@show");
Route::get('/admin_delete_message/{id}',"messageController@destroy");
////////////////////////////////////////for any other Link/////////////////
Route::any('{any}', function () {return redirect('/');});

