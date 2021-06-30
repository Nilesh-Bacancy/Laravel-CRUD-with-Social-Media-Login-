<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class admincommentcontroller extends Controller
{
    //
    function deletecomment(Request $req)
    {
        $comment= comment::where('id',$req->did)->first();
        $comment->delete();
        return redirect('Admin/admincomment');
    }
}
