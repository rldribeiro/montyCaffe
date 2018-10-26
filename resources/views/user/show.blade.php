@extends('layouts.app')

@section('content')

<!-- Profile -->

<div class="container" style="margin:0 auto; float:none;">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar" style="height:100%">
				<!-- SIDEBAR USERPIC -->
				<div class="center rounded-circle logo-large photo-div" style="background-image: URL({{$user->foto_url}}); "></div>				
				<!-- END SIDEBAR USERPIC -->

				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle center">
					<div class="profile-usertitle-name">
						{{$user->name}}
					</div>
				<p><i class="fas fa-star text-warning"></i> {{$user->score()}}</p>
					<p>{{$user->description}}</p>					
				</div>

				@if(auth()->check() && auth()->user()->isAdmin == true && $user->id != auth()->user()->id)
				
				<h5 class="text-center text-info">ADMIN CONTROLS:</h5>

				<div class="text-center">
					<a href="{{route ('users.promote', $user->id)}}">
						@if($user->isAdmin == false)
						<div class="border rounded text-center text-white btn btn-success btn-sm">
							<i class="fas fa-user-astronaut"></i> Promote to Admin
						</div>
						@else
						<div class="border rounded text-center text-white btn btn-danger btn-sm">
							<i class="fas fa-user-alt-slash"></i> Demote from Admin
						</div>
						@endif
					</a>
				</div>

				@endif
				@if(auth()->check() && auth()->user()->isAdmin == true)
					<div class="profile-usertitle center6">
						<div class="">
							<a href="{{ route('users.destroy', $user->id)}}" class="btn btn-danger btn-sm"  onclick="return confirm('This cannot be UNDONE! Are your sure?')"><i class="fas fa-user-times"></i> Delete account</a>
						</div>
					</div>
				@endif

				<!-- END SIDEBAR USER TITLE -->
			</div>
		</div>
		
		<div class="col-md-9">
            <div class="profile-content">
				<div style="padding:10px; display-in-line:block">
					<h1>Owns</h1>								
					@foreach ($user->caffes as $owned) 
					<div id="ownedcaffe" class="text-center">
						<img src="{{$owned->logo_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-medium"  /><br>
						<a href="/caffes/{{$owned->id}}">{{$owned->name}}</a>
					</div>
					@endforeach

					<h1>Follows</h1>

					@foreach ($user->follows as $follow)
					<!-- Verifica primeiro se o café está nos cafés de que é dono... -->
						@if( $follow->user_id !== $user->id ) 
							<div id="ownedcaffe" class="text-center">
									<img src="{{$follow->logo_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-medium" />
									<br />
									<a href="/caffes/{{$follow->id}}">{{$follow->name}}</a>
							</div>
						@endif
					@endforeach

		</div>
			

	</div>
</div>

<div class="container" >
	<div class="row">
		
	<h2 style="padding:30px 30px 30px 30px;">Posts by {{$user->name}}</h2><br>

	</div>
	
	@foreach ($posts as $post)
	@if($post->status == true)

	@include('layouts.post')		
	
	@endif
	@endforeach
	
</div>

@endsection

