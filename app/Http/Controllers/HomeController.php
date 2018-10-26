<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caffe;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::User(); 

        $teste=auth()->user()->follows()->orderBy("created_at", "desc")->paginate(5);

        foreach($teste as $caffe){
            foreach($caffe->posts as $p){
                $posts[] = $p;
            }
        }

        $cmts= $user->comments()->get();
        $caffes = Caffe::orderBy("created_at", "desc")->paginate(20);      
        return view('home')->with(compact('caffes','posts','cmts'));
    }

    
  
}
