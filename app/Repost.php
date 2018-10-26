<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repost extends Model
{
    public function Post(){
        return $this->belongsTo(Post::Class);
    }


}
