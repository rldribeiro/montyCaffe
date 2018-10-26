<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Caffe;
use App\User;
use App\Tag;

class SearchController extends Controller
{
    public function index()
    {
        $query = Input::get('q');
        $queryAlt = '%'.$query.'%';
        
        $caffes = Caffe::where('name', 'like', $queryAlt)->paginate(12);
        $users = User::where('name', 'like', $queryAlt)->paginate(12);
        $tags = Tag::where('tag', 'like', $queryAlt)->get();
        
        return view('search.index')->with(compact('caffes', 'users', 'tags', 'query'));
    }
}
