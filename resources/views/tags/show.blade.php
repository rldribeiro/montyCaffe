@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">
		<div class="col-lg-8">
            <h1>{{$tag->tag}}</h1>
            @foreach ($posts as $post)	
			@if($post->status == true)			

				@include('layouts.post')

			@endif
            @endforeach
            
        </div>
    </div>
</div>
@endsection