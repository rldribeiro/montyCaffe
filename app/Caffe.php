<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caffe extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::Class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::Class);
    }

    public function staff()
    {
        return $this->belongsToMany(User::Class);
    }


}