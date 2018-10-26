<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use App\Post;


class TagController extends Controller
{
    public function show(Tag $tag)
    {        
        $posts = $tag->posts()->orderBy('created_at', 'desc')->get();

        return view('tags.show')->with(compact('posts', 'tag'));
    }

 


}
