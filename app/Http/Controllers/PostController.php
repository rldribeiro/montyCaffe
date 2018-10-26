<?php

namespace App\Http\Controllers;
use App\Post;
use App\Caffe;
use App\Tag;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        //  $caffes = Caffe::orderBy("created_at", "desc")->paginate(5);
    }

    public function store(Request $request)
    {
        if(!empty($request->comment)){
            $p = new Post();             
            $re = '/#[a-zAZ0-9]*/m';
            $str = $request->comment;
            preg_match_all($re, $str, $tags, PREG_SET_ORDER, 0);
            
            
        
            $p->content = $request->comment;
            $p->user_id = $request->user_id;
            $p->shelf_life = 48;
            $p->image_url= NULL;
            $p->caffe_id = $request->caffe_id;
            $p->save();
            
            if(!empty($tags)){
                foreach($tags as $tag) {
                    $t= new Tag();
                    $t->tag=$tag[0];

                    if(!Tag::where('tag',$t->tag)->exists()){
                        $t->save();
                        $p->tags()->attach($t);
                    }else{
                        $t = Tag::where('tag', $t->tag)->get();
                        $p->tags()->attach($t);
                    }
                }
            }    
        }

        return redirect()->back();   
    }

    public function show(Post $post)
    {
        $comments = $post->Comments()->get();

        return view('posts.show')->with(compact('comments')); 
    }

    public function status(Post $post)
    {
        $caffe = Caffe::find($post->caffe_id);

            if($post->status == true)
                $post->status = false;
            else
                $post->status = true;
            
            $post->save();

        return \Redirect::route('caffes.show', $caffe->id);
    }

    public function tip(Post $post)
    {
        if(Auth::User()) {
            $user = Auth::User();
            $user->likes()->attach($post);
        }
        return redirect()->back();
    }

    public function untip(Post $post)
    {
        if(Auth::User()) {
            $user = Auth::User();
            $user->likes()->detach($post);
        }
        return redirect()->back();
    }
}
