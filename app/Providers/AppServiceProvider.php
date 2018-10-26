<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Contact;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $allContacts = Contact::all();

        $feedbackCount = count($allContacts);
        $feedbackUnread = 0;

        foreach($allContacts as $contact){
            if($contact->read == false){
                $feedbackUnread += 1;
            }
        }        
        
        View::share('feedbackCount', $feedbackCount);
        View::share('feedbackUnread', $feedbackUnread);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
