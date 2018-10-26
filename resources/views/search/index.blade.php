@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="my-10">
                <h2 class="text-center">Searching for <strong class="text-danger">'{{$query or 'nothing, thus getting everything!'}}'</strong>:</h2>

                <div id="caffe-results">
                    <h5 class="my-4">Caffes matching your search:</h5>

                    @if($caffes->count() == 0)
                    <em class="text-info">There were no matches!</em>

                    @else

                    <div class="row">
                        @foreach($caffes as $caffe)
                        <div class="col-md-1">
                            <a class="fill-div" href="/caffes/{{$caffe->id}}">
                                <img src="{{$caffe->logo_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-small" />
                                <br />
                                <h5 class="handle" style="padding-top:2px">{{$caffe->name}}</h5>
                            </a>
                        </div>
                        @endforeach

                        {{$caffes->links()}}

                    </div>

                    @endif
                </div>

                <div id="user-results">
                    <hr />
                    <h5 class="my-4">Users matching your search:</h5>
                    @if($users->count() == 0)
                    <em class="text-info">There were no matches!</em>

                    @else

                    <div class="row">
                        @foreach($users as $user)
                        <div class="col-md-1">
                            <a class="fill-div" href="/users/{{$user->id}}">
                                <img src="{{$user->foto_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-small" />
                                <br />
                                <h5 class="handle" style="padding-top:2px">{{$user->name}}</h5>
                            </a>
                        </div>
                        @endforeach
                        {{$users->links()}}
                    </div>

                    @endif
                </div>

                <div id="tag-results">
                    <hr />
                    <h5 class="my-4">Tags matching your search: </h5>
                    @if($tags->count() == 0)
                    <em class="text-info">There were no matches!</em>

                    @else

                    <div class="row">
                        @foreach($tags as $tag)
                        <div class="mx-3 my-2">
                            <a href="/tags/{{$tag->id}}" class="tag p-1">{{$tag->tag}}</a>
                        </div>
                        @endforeach
                    </div>

                    @endif

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="my-5">
                            <h5>Not happy? Try again!</h5>
                            <form class="form-group" method="get" action="/search">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input type="text" name="q" class="form-control" placeholder="Search Caffes, Users and Tags..." />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection