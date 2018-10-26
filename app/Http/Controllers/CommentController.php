<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use App\Comment;
use phpDocumentor\Reflection\Types\Null_;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Post::find($request->post_id) == null) {
            return redirect()->back();
        }
        
        $p = new Comment();
        $p->content = $request->comment;
        $p->user_id= $request->user_id;
        $p->post_id = $request->post_id;
        $p->save();
        return redirect()->back();
    }
}
