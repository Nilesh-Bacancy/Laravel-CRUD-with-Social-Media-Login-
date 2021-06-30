<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\comment;
use Session;
class productcontroller extends Controller
{
    //
    function index()
    {
        $data=product::all()->toArray();
        return view('customerhome',compact('data'));
    }

    function productdetail($id)
    {
       $product=product::find($id);
       $userid=Session::get('customer')['id'];
       $comment=comment::where('user_id',$userid)->where('product_id',$id)->first();
     
       return view('productdetail',['product'=>$product]);
     
    }
    function addcomment(Request $req)
    {
       $comment=new comment();
       $comment->user_id=$req->uid;
       $comment->product_id=$req->pid;
       $comment->comment_desc=$req->comment;
       $comment->save();
       $data=product::all()->toArray();
      return view('customerhome',compact('data'));
    }

    static function getcomment($id)
    {
        $userid=Session::get('customer')['id'];
        $c=comment::where('user_id',$userid)->where('product_id',$id)->first();
        return $c;
    }

    function productsearch(Request $req)
    {
        $data=product::where('name','like','%'.$req->input('search').'%')->get();
         return view('productsearch',['data'=>$data]);
    }
}
