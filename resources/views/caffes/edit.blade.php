@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4">
        <h1 class="text-center">Let's improve the place!</h1>
    </div>
    <div class="row">
    <div class="col-md-4">
            <div class="center rounded-circle logo-large photo-div" style="background-image: URL({{$caffe->logo_url}}); "></div>                                    
        </div>
        <div class="col-md-6">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="post" action="/caffes/{{$caffe->id}}">
                @method('put')
                @include('caffes.form')
                <button type="submit" class="btn btn-primary my-2">CHANGE</button>
            </form>

        </div>         
    </div>
</div>

@endsection