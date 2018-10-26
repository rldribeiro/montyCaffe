@extends('layouts.app')
 
@section('content')
<div class="container">
<h2>Tickets : </h2>
    @if(count($contacts) == 0 )
        <h2>No open Tickets</h2>
    @else

        @if($feedbackUnread > 0)
        <p>
        <strong class="text-danger">{{$feedbackUnread}} new message(s)!</strong>
        </p>
        @endif

        @foreach($contacts as $contact)

        <div class="qa-message-list" id="wallmessages">
            <div class="message-item" id="m16">
                <br>
                <div class="message-inner">
                    <a href="#" class="fill-div" data-toggle="modal" data-target="#favoritesModal"></a>

                    <div class="message-head clearfix">

                        <div class="user-detail">
                            <div id="postheader">    
                            <h5 class="handle" style="padding-top:2px"><a class="fill-div" href="#">                            
                                @if($contact->read == false)
                                <img src="https://i0.wp.com/www.falmouthpubliclibrary.org/wp-content/uploads/2018/07/xpop-up-alert.png.pagespeed.ic_.vwzzZnK_Rf.png?w=777" alt="Logo" class="rounded-circle img-thumbnail logo-small" />
                                
                                <span class="text-danger"><strong>NEW!</strong></span>
                                @endif
                                {{$contact->subject}}</a></h5>

                            </div>

                            <div class="post-meta">
                                <div class="asker-meta">
                                    <span class="qa-message-what"></span>
                                    <span class="qa-message-when">
                                        <span class="qa-message-when-data">{{$contact->created_at}}</span>
                                    </span>
                                    <span class="qa-message-who">
                                        <span class="qa-message-who-pad">by </span>
                                        {{$contact->name}}</a></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="qa-message-content" style="padding:3%">
                        <a href="#" class="fill-div" data-toggle="modal" data-target="#favoritesModal{{$contact->id}}" style="text-decoration: none">
                            <p>{{$contact->message}}</p>
                        </a>
                        <hr />
                    </div>
                    <div class="modal fade" id="favoritesModal{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="mcontent">

                    <div class="modal-header">
                        <h4 class="modal-title" id="favoritesModalLabel"><img src="https://i0.wp.com/www.falmouthpubliclibrary.org/wp-content/uploads/2018/07/xpop-up-alert.png.pagespeed.ic_.vwzzZnK_Rf.png?w=777" alt="Logo" class="rounded-circle img-thumbnail logo-small" /> {{$contact->name}}</h4>                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">                
                        
                        <p>Email : {{$contact->email}}</p>
                        <p>Contact : {{$contact->contact}}</p>
                        <p>Subject: {{$contact->subject}}</p>
                        <p>Message :{{$contact->message}}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>

            @endforeach
            </div>
    @endif
@endsection