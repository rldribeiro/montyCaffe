<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Caffe;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        //  $caffes = Caffe::orderBy("created_at", "desc")->paginate(5);
    }

    public function show($userId)
    {   
        $user =  User::findOrFail($userId);
        //$posts = Post::find($user)->orderBy("created_at", "desc")->paginate(10)->get();
        $posts = User::find($user->id)->posts()->orderBy("created_at", "desc")->paginate(10);
        $cmts= $user->comments()->get();
        $caffes = Caffe::orderBy("created_at", "desc")->paginate(2);      
        return view('user.show')->with(compact('caffes','posts','cmts','user'));
    }

    public function edit(User $user)
    {
        if($user->id == Auth::User()->id)              
            return view('user.edit')->with(compact('user'));
        else
            return \Redirect::route('users.show', $user->id); 
    }


    
    public function destroy(User $user)
    {
        //dd($user);
        if(Auth::User()->isAdmin == 1)  {

            $user->delete();

        }else{
            dd('asdasdasdas');
            Auth::logout();
            $user->delete();

        }

        return \Redirect::route('caffes.index'); 
           
    }


    public function update(Request $request, User $user)
    {           
        // Verifica se o utilizador autenticado é o utilizador a alterar:
        if(Auth::User()->id == $user->id)
        {  
            // Verifica se o email foi alterado:
            if($request->email != $user->email){
                $validatedEmail = $request->validate([            
                    'email' => 'string|email|max:255|unique:users'
                    ]);
                $user->email = $request->email;
            }

            // Verifica se foi introduzida password:
            if($request->password != null){
                $validatedPassword = $request->validate([ 
                    'password' => 'string|min:6|confirmed'
                ]);
                $user->password = Hash::make($request->password);
            }

            // Verifica se o logo_url foi preenchido
            if ($request->foto_url != null) {
                $url = $request->foto_url;
                $url_headers = @get_headers($url);

                // Verifica se o URL inserido corresponde a um link que existe. Não verifica se é uma imagem.
                if ($url_headers && $url_headers[0] != 'HTTP/1.1 404 Not Found') {
                    $user->foto_url = $request->foto_url;
                }
            }

            if ($request->description != null) {
                $user->description = $request->description;
            }

            $user->save();
            return \Redirect::route('home');
        }
        
        return \Redirect::route('users.show', $user->id);
    }

    public function promote(User $user)
    {
        if($user->isAdmin)
            $user->isAdmin = false;
        else
            $user->isAdmin = true;

        $user->save();
        
        return \Redirect::route('users.show', $user->id);
    }
}