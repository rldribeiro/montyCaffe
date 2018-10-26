<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\Repost;
use App\Caffe;

class Post extends Model
{
    public function Caffe(){
        return $this->belongsTo(Caffe::Class);
    }

    public function User(){
        return $this->belongsTo(User::Class);
    }

    public function Comments(){
        return $this->hasMany(Comment::Class);
    }

    public function likes(){
        return $this->belongsToMany(User::Class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::Class);
    }

    public function OriginalCaffe(){
        $orCaffe = Caffe::find($this->source_caffe);
        return $orCaffe;
    }

}