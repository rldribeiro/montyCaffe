<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::Class);
    }

    public function caffes()
    {
        return $this->hasMany(Caffe::Class);
    }

    public function follows(){
        return $this->belongsToMany(Caffe::Class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }
    
    public function likes(){
        return $this->belongsToMany(Post::Class);
    }

    public function staff(){
        return $this->belongsToMany(Caffe::Class);
    }

    public function score(){
        // Corre todos os posts do utilizador e soma o número de tips de cada post.
        $posts = $this->posts()->get();
        $count = 0;

        foreach($posts as $post){
            $likes = count($post->likes()->get());
            $count += $likes;
        }

        return $count;
    }
}
