@extends('layouts.app')

@section('content')

<!-- Profile -->

<div class="container" style="margin:0 auto; float:none;">
	<div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar" style="height:100%">
				<!-- SIDEBAR USERPIC -->
				<div class="center rounded-circle logo-large photo-div" style="background-image: URL({{Auth::user()->foto_url}}); "></div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle center">
					<div class="profile-usertitle-name">
						<a href="/users/{{auth()->user()->id}}" style="color: black;">{{auth()->user()->name}}</a>
					</div>
					<div>
					<p>{{auth()->user()->description}}</p>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->

				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<a href="{{ route('users.edit', Auth::user()->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-wrench"></i> CHANGE DETAILS</a>
				</div>
				<!-- END SIDEBAR BUTTONS -->

			</div>
		</div>

		<div class="col-md-9">
			<div class="profile-content">
				<div style="padding:10px; display-in-line:block">

					<h1>Caffes You Own</h1>

					@if(count(auth()->user()->caffes) == 0)
					<div id="ownedcaffe" class="text-center">
						You don't own any caffe! Open one today!
					</div>
					@else
					@foreach (auth()->user()->caffes as $owned)
					<div id="ownedcaffe" class="text-center">
						<img src="{{$owned->logo_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-medium" />
						<br />
						<a href="/caffes/{{$owned->id}}">{{$owned->name}}</a>
					</div>
					@endforeach
					@endif

					<div class="my-2 text-right">
						@if(count(auth()->user()->caffes) < 4 )
						<a href="{{ route('caffes.create') }}" class="btn btn-success text-white">
							Open a new caffe!
						</a>
						@else
						<em>You already own 4 caffes. That's the limit!</em>
						@endif
					</div>

					<h1>Caffes You Follow</h1>

					@if(count(auth()->user()->follows) == 0)
					<div id="ownedcaffe" class="text-center">
						You're not a client of any caffe.
					</div>
					@else
					@foreach (auth()->user()->follows as $follow)
					<!-- Verifica primeiro se o café está nos cafés de que é dono... -->
					@if( $follow->user_id !== auth()->user()->id )
					<div id="ownedcaffe" class="text-center">
						<img src="{{$follow->logo_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-medium" />
						<br />
						<a href="/caffes/{{$follow->id}}">{{$follow->name}}</a>
					</div>
					@endif
					@endforeach
					@endif					

				</div>
			</div>
		</div>
		<br>
		<br>
	</div>
	<div class="container">
		<div class="row">

			<i class="fas fa-filter fa-3x" style="padding-top:30px"></i>
			<h2 style="padding:30px 30px 30px 30px;">Your Filter</h2><br>

		</div>
		@if(isset($posts))
		@foreach ($posts as $post)
		@if($post->status == true)
		@include('layouts.post')

	
		@endif
		@endforeach
		@endif
	</div>

	@endsection