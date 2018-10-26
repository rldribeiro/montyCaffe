<?php

namespace App\Http\Controllers;

use App\Caffe;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaffeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caffes = Caffe::orderBy("created_at", "desc")->paginate(6);
        return view('caffes.index')->with(compact('caffes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::User() && count(Auth::User()->caffes()->get()) < 5)
            return view('caffes.create');
        else
            return \Redirect::route('about'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::User() && count(Auth::User()->caffes()->get()) < 4){
            $user = Auth::User();
            
            // Validar os dados do café e evitar cafés com o mesmo nome.
            $validatedData = $request->validate([
                'name' => 'required|unique:caffes',
                'description' => 'required|max:255'
            ]);

            $caffe = new Caffe();
            $caffe->name = $request->name;
            $caffe->description = $request->description;

            // Verifica se o logo_url foi preenchido
            if ($request->logo_url !== null) {
                $url = $request->logo_url;
                $url_headers = @get_headers($url);
                // Verifica se o URL inserido corresponde a um link que existe. Não verifica se é uma imagem.
                if ($url_headers && $url_headers[0] !== 'HTTP/1.1 404 Not Found') {
                    $caffe->logo_url = $request->logo_url;
                }
            }

            $caffe->user_id = $user->id;
            $caffe->save();
            
            // Vai obter o Id do café criado para redireccionar.
            $caffe = Caffe::where('name', 'like', $caffe->name)->take(1)->get()[0];

            // Adiciona o dono ao seu prórprio café.
            $caffe->followers()->attach($user);

            return redirect()->route('caffes.show', $caffe->id);
        }else{
            return \Redirect::route('about'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caffe  $caffe
     * @return \Illuminate\Http\Response
     */
    public function show(Caffe $caffe)
    {
        $followers = $caffe->followers()->get();
        $posts = $caffe->posts()->orderBy('created_at', 'desc')->get();
        $mytime =Carbon::now();

        foreach($followers as $follwer){

            $s= 
            DB::table('caffe_user')
                ->where('caffe_id',$caffe->id)
                ->where('user_id',$follwer->id)
                ->pluck('isModerator') ;
                $staff[]=([$follwer ,$s]);

               
        }

        foreach($posts as $post){

            if( ($post->created_at->diffInSeconds($mytime)) > 172800 ){
                
                $post->Comments()->delete();
                $post->delete();

            }
        }

        return view('caffes.show')->with(compact('caffe', 'posts', 'followers','staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caffe  $caffe
     * @return \Illuminate\Http\Response
     */
    public function edit(Caffe $caffe)
    {  
        if($caffe->user_id == Auth::User()->id)              
            return view('caffes.edit')->with(compact('caffe'));
        else
            return \Redirect::route('caffes.show', $caffe->id); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caffe  $caffe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caffe $caffe)
    {        
        // Validar os dados do café e evitar cafés com o mesmo nome.
        $validatedData = $request->validate([            
            'description' => 'required|max:255'
        ]);

        $caffe = Caffe::find($caffe->id);

        $caffe->description = $request->description;

        // Verifica se o logo_url foi preenchido
        if ($request->logo_url != null) {
            $url = $request->logo_url;
            $url_headers = @get_headers($url);

            // Verifica se o URL inserido corresponde a um link que existe. Não verifica se é uma imagem.
            if ($url_headers && $url_headers[0] != 'HTTP/1.1 404 Not Found') {
                $caffe->logo_url = $request->logo_url;
            }
        }
        $caffe->save();
        
        return \Redirect::route('caffes.show', $caffe->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caffe  $caffe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Caffe $caffe)
    {
        if(Auth::check() && Auth::User()->id == $caffe->user_id && $caffe->locked == false){        
            if($caffe->status == true){
                $caffe->status_message = trim($request->status_message);
                $caffe->status = false;                
            }
            else
                $caffe->status = true;
            $caffe->save();
        }
        return \Redirect::route('caffes.show', $caffe->id);
    }

    public function lock(Request $request, Caffe $caffe)
    {
        
        if(Auth::check() && Auth::User()->isAdmin == true){
            if($caffe->locked == false){
                $caffe->locked = true;
                $caffe->status = false;
                $caffe->status_message = trim($request->status_message);                
            } else {
                $caffe->locked = false;                            
            }
            $caffe->update();
        }
        return \Redirect::route('caffes.show', $caffe->id);
    }

    public function follow(Caffe $caffe)
    {
        if (Auth::User()) {

            $user = Auth::User();
            
            // Verifica se o utilizador ainda não é cliente do café. 
            $followers = $caffe->followers()->get();
            if (!$followers->contains($user->id)) {
                $caffe->followers()->attach($user);
            }

            return \Redirect::route('caffes.show', $caffe->id);
        } else {
            return view('/');
        }
    }

    public function unfollow(Caffe $caffe)
    {
        if (Auth::User()) {

            $user = Auth::User();
            
            // Verifica se o utilizador já é cliente do café. 
            $followers = $caffe->followers()->get();
            if ($followers->contains($user->id)) {
                $caffe->followers()->detach($user);
            }

            return \Redirect::route('caffes.show', $caffe->id);
        } else {
            return view('/');
        }
    }

    public function staff(Caffe $caffe)
    {
        if($caffe->user_id == Auth::User()->id){

            $followers = $caffe->followers()->get();
            //dd($followers);
        }
        
        return view('caffes.staff')->with(compact('followers','caffe'));
       
    }

    public function staffadd(Request $request)
    {
        //dd($request->checkbox);
        if($request->checkbox != null){

            foreach($request->checkbox as $key=> $value){
            
                if($value != 0 ) {
                    DB::table('caffe_user')
                    ->where('caffe_id',$request->caffe_id)
                    ->where('user_id',$value)
                    ->update(['isModerator' => 1]);
                }
            }
        }
        return \Redirect::route('caffes.show', $request->caffe_id);
    } 
    

    public function staffremove(Request $request)
    {
        if($request->checkbox != null){

            foreach($request->checkbox as $key=> $value){
            
                if($value != 0 ) {
                    DB::table('caffe_user')
                    ->where('caffe_id',$request->caffe_id)
                    ->where('user_id',$value)
                    ->update(['isModerator' => 0]);
                }
            }
        }
        return \Redirect::route('caffes.show', $request->caffe_id);
       
    }
}

 
