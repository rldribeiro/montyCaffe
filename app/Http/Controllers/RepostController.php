<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repost;
use App\Caffe;

class RepostController extends Controller
{
    public function create($caffe_id,$post_id,$repost_id,$repost_user){

        $repost = new Post();

        $originalcaffe = Caffe::find($caffe_id);
        $originalpost = Post::find($post_id);
        $repostcaffe = Caffe::find($repost_id);

        $repost->content = $originalpost->content;
        $repost->user_id = $repost_user;
        $repost->shelf_life = 48;
        $repost->image_url= NULL;
        $repost->caffe_id = $repostcaffe->id;
        $repost->source_caffe= $originalcaffe->id;
        $repost->source_user= $originalpost->user_id;
        $originalpost->repost_counter = $originalpost->repost_counter + 1 ;
        $originalpost->update();

        $repost-> save();

        return redirect()->route('caffes.show', $caffe_id);
    }
}
