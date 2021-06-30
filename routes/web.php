<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registrationcontroller;
use App\Http\Controllers\forgotpasswordcontroller;
use App\Http\Controllers\resetpasswordcontroller;
use App\Http\Controllers\changepasswordcontroller;
use App\Http\Controllers\updateprofilecontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\admincustomercontroller;
use App\Http\Controllers\admincategorycontroller;
use App\Http\Controllers\adminproductcontroller;
use App\Http\Controllers\admincommentcontroller;

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


Route::get('/', function () {
    return view('login');
});

Route::get('login', function () {
    return view('login');
});
Route::POST('login',[logincontroller::class,'login']);

Route::get('logoutadmin', function () {
    Session::forget('admin');
    return redirect('login');
});
Route::get('logoutcustomer', function () {
    Session::forget('customer');
    return redirect('login');
});

Route::get('register', function () {
    return view('register');
});
Route::POST('register',[registrationcontroller::class,'register']);

Route::get('forgotpassword', function () {
    return view('forgotpassword');
});
Route::POST('forgotpassword',[forgotpasswordcontroller::class,'forgotpassword']);

Route::get('resetpassword', function () {
    return view('resetpassword');
});
Route::get('resetpassword/{token}',[resetpasswordcontroller::class,'resetshow']);
Route::POST('/rp',[resetpasswordcontroller::class,'resetpassword']);

Route::get('changepassword', function () {
    return view('changepassword');
});
Route::get('Admin/adminchangepassword', function () {
    return view('Admin/adminchangepassword');
});
Route::POST('/changepassword',[changepasswordcontroller::class,'changepassword']);
Route::POST('Admin/adminchangepassword',[changepasswordcontroller::class,'adminchangepassword']);

// Route::get('/updateprofile/{id}', function () {
//     return view('updateprofile');
// });
Route::get('Admin/adminupdateprofile', function () {
    return view('Admin/adminupdateprofile');
});
Route::get('/updateprofile/{id}',[updateprofilecontroller::class,'getdata']);
Route::POST('/updateprofile',[updateprofilecontroller::class,'updateprofile']);
// Route::POST('Admin/adminupdateprofile','updateprofilecontroller@adminupdateprofile');
Route::POST('Admin/adminupdateprofile',[updateprofilecontroller::class,'adminupdateprofile']);

Route::get('customerhome',[productcontroller::class,'index']);
// Route::get('customerhome', function () {
//     return view('customerhome');
// });
Route::get('productdetail/{id}',[productcontroller::class,'productdetail']);
Route::POST('/pd',[productcontroller::class,'addcomment']);
//  Route::POST('productsearch',[productcontroller::class,'productsearch']);
Route::get('/productsearch',[productcontroller::class,'productsearch']);

Route::get('Admin/adminhome',[admincontroller::class,'index']);
Route::get('Admin/admincustomer',[admincontroller::class,'customer']);
Route::get('Admin/admincategory',[admincontroller::class,'category']);
Route::get('Admin/adminproduct',[admincontroller::class,'product']);
Route::get('Admin/admincomment',[admincontroller::class,'comment']);

Route::POST('Admin/admincustomeradd',[admincustomercontroller::class,'addcustomer']);
Route::POST('Admin/admincustomeredit',[admincustomercontroller::class,'editcustomer']);
Route::POST('Admin/admincustomerdelete',[admincustomercontroller::class,'deletecustomer']);
Route::get('changeStatus',[admincustomercontroller::class,'changeUserStatus']);

 Route::POST('Admin/admincategoryadd',[admincategorycontroller::class,'addcategory']);
 Route::POST('Admin/admincategoryedit',[admincategorycontroller::class,'editcategory']);
 Route::POST('Admin/admincategorydelete',[admincategorycontroller::class,'deletecategory']);

 Route::POST('Admin/adminproductadd',[adminproductcontroller::class,'addproduct']);
 Route::POST('Admin/adminproductedit',[adminproductcontroller::class,'editproduct']);
 Route::POST('Admin/adminproductdelete',[adminproductcontroller::class,'deleteproduct']);


 Route::POST('Admin/admincommentdelete',[admincommentcontroller::class,'deletecomment']);

//  Route::get('/google',[logincontroller::class,'redirectToGoogle'])->name('login.google');
// Route::get('/google/callback',[logincontroller::class,'handleGoogleCallback']);

// Route::get('/github',[LoginController::class,'redirectToGithub'])->name('login.github');
// Route::get('/github/callback',[LoginController::class,'handleGithubCallback']);

Route::get('/{provider}',[logincontroller::class,'redirectTo'],function($provider){});
Route::get('/{provider}/callback',[logincontroller::class,'handleCallback'],function($provider){});