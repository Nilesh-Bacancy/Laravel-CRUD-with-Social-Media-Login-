<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\category;
use App\Models\product;
class admincontroller extends Controller
{
    //
    function index()
    {


        $user = DB::table('users')->where('is_admin','0')->get();
        $customer=count($user);
        $product = DB::table('products')->count();
        $category = DB::table('categories')->count();
        $comment = DB::table('comments')->count();
       
        
        return view('Admin/adminhome',compact('customer','product','category','comment'));
       
    }

    function customer()
    {
        $alluser=User::all()->where('is_admin','0')->toArray();
        $user1 = DB::table('users')->where([['is_admin','0'],['status','1']])->get();
        $user2 = DB::table('users')->where('status',' 0')->get();
  
        $active=count($user1);
        $inactive=count($user2);
        return view('Admin/admincustomer',compact('active','inactive','alluser'));
    }

    function category()
    {
        $cat=category::all()->toArray();
     
         return view('Admin/admincategory',compact('cat'));
    }

    function product()
    {
        $cat=category::all();
       $pro=product::with('category')->get();
        return view('Admin/adminproduct',compact('pro','cat'));
    }

    function comment()
    {
        $comment = DB::table('comments')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->join('products', 'products.id', '=', 'comments.product_id')
        ->select('comments.id','comments.comment_desc','users.name','products.name as pname')
        ->get();
     
        return view('Admin/admincomment',compact('comment'));
    }

    static function getadmin($id)
    {
        
        return User::find($id)->first();

    }

   
}
