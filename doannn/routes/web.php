<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/// frontend
Route::get('/','HomeController@index');

Route::get('/trang-chu','HomeController@index');

////backend
Route::get('/admin','AdminController@index');

Route::get('/dashboard','AdminController@showdashboard');
Route::get('/logout','AdminController@logout');

Route::post('/admin-dashboard','AdminController@dashboard');
//thong ke dat cong
Route::get('/edit-category/{makhudat}','categoryland@edit_categoryland');
Route::get('/delete-category/{makhudat}','categoryland@delete_categoryland');
 // duong dan toi add dat cong
Route::get('/add-category','categoryland@add_categoryland');
 ///
Route::get('/all-category','categoryland@all_categoryland')->name('all-category');
Route::post('/save-category','categoryland@save_category');
Route::post('/update-category/{makhudat}','categoryland@update_category');
 //webiste
Route::get('/login/','HomeController@login');


 //user
Route::get('/all-user','UserController@all_user'); 
Route::post('/add-user','UserController@add_user'); 
Route::get('/delete-user/{macb}','UserController@delete_user'); 
Route::get('/index-user','UserController@index'); 
Route::put('/update/{macb}','UserController@update_user'); 
Route::post('/edit-user','UserController@edit_user')->name('edit-user');





 //cap nhat dat cong
Route::post('/add-datcong','DatCongController@add_datcong')->name('add-datcong'); 
Route::get('/layphuongxa','DatCongController@lay_phuongxa')->name('layphuongxa'); 
Route::get('/laymakhudat','DatCongController@lay_makhudat')->name('laymakhudat'); 
Route::get('/laymamucdich','DatCongController@lay_mamucdich')->name('laymamucdich'); 
Route::get('/laymahuyen','DatCongController@lay_mahuyen')->name('laymahuyen'); 
Route::post('/editdatcong','DatCongController@edit_datcong')->name('editdatcong'); 
Route::post('/deletedatcong','DatCongController@deletedatcong')->name('deletedatcong'); 
Route::get('/kiemtradatcong','DatCongController@kiemtra_datcong')->name('kiemtradatcong'); 


//muddich
Route::get('/mucdich','mucdichController@all_md')->name('mucdich'); 
Route::post('/add-mucdich','mucdichController@add_md')->name('add-mucdich'); 


//donvicongtac
Route::get('/donvi','donvi@all_dv')->name('donvi');
Route::post('/add-dv','donvi@add_dv')->name('add-dv'); 

//thong ke dat cong
Route::get('/lietkedc','categoryland@all_category')->name('lietkedc'); 






