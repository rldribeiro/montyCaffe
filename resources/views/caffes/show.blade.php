@extends('layouts.app') @section('content')

<div class="container">



	<div class="my-10">
		<h1 class="text-center my-10">
			<i class="fas fa-coffee"></i> {{$caffe->name}}
		</h1>

		<p class="text-center">
			Owned by <a href="/users/{{$caffe->user->id}}" style="color: black;"><strong>{{$caffe->user->name}}</strong></a>!
		</p>

		<p class="text-center">
			<em>{{$caffe->description}}</em>
		</p>
	</div>

	<div class="row justify-content-center">
		<div class="col-lg-8">

			{{-- Se o café estiver encerrado mostra a imagem e a mensagem de encerramento! --}}
			@if($caffe->status == false)
			<img src="{{ asset('imgs/wereclosed.jpg')}}" alt="Sorry! Whe're Closed!" class="img-fluid rounded my-5">

			{{-- Mostra uma mensagem caso exista --}}
			@if($caffe->status_message != '')

			<h5>Here's a brief message from
				@if($caffe->locked == true)
				THE ADMINISTRATION
				@else
				{{$caffe->user->name}}
				@endif
				:</h5>
			<div class="border border-muted bg-white rounded my-2 p-3">
				{{$caffe->status_message}}
			</div>
			@endif
			@else

			{{-- Caixa para inserir posts. Só activa para utilizadores autenticados e clientes --}}
			@if(Auth::check() && Auth::user()->follows()->find($caffe->id))
			<div id="caffepost" class="message-inner my-2">
				<form action="/posts/store" method="post">
					@csrf()
					<div class="form-group">
						<textarea rows="3" name="comment" class="form-control" placeholder="What are you doing right now?"></textarea>
						<button type="submit" class="btn btn-success green my-2">
							<i class="fa fa-share"></i> Comment</button>
						<input type="hidden" name="caffe_id" value="{{$caffe->id}}">
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					</div>
				</form>
			</div>
			@endif

			@foreach ($posts as $post)

			@if(($post->status == false && ((Auth::check() && ($caffe->user_id == Auth::User()->id || Auth::User()->isAdmin ==
			true || $members[0] == 1))) || $post->status == true ))

			{{-- Lista de Posts --}}
			@include('layouts.post')

			@endif
			@endforeach

			@endif
		</div>

		<!-- INFORMAÇÃO LATERAL -->

		<div class="col-lg-4 text-center">
			<!-- Logo do Café -->
			<div class="center rounded-circle logo-large photo-div" style="background-image: URL({{$caffe->logo_url}}); ">
			</div>

			<div class="my-4 text-center">

				@if(Auth::check() && Auth::user()->id === $caffe->user->id)
				<div class="border rounded text-center youown bg-light my-2">
					<i class="fas fa-crown bg-light text-warning"></i> You own this place! <i class="fas fa-crown bg-light text-warning"></i>
				</div>

				<a href="{{ route('caffes.edit', $caffe->id) }}">
					<div class="border rounded text-center text-white btn btn-success">
						<i class="fas fa-paint-roller"></i> Modify
					</div>
				</a>

				@if(Auth::check() && Auth::user()->id === $caffe->user->id && count($caffe->followers()->get() ) > 1 )
				<a href="/caffes/staff/{{$caffe->id}}" class="unfollow-button">
					<div class="border rounded text-center btn btn-info">
						<i class="fas fa-people-carry"></i> Staff
					</div>
				</a>
				@endif

				<form method="post" action="/caffes/{{$caffe->id}}">
					@csrf
					@method('delete')

					@if($caffe->locked ==true)
					<div class="border border-danger rounded text-center youown bg-light p-3 my-2">
						This caffe was locked by an administrator. Was your place in order? Get in touch if you believe it was a mistake or the problem is gone.
					</div>

					@elseif($caffe->status == true)
					<button type="button" class="btn btn-danger my-2" data-toggle="modal" data-target="#closeMessageModal">
						<i class="fas fa-window-close"></i> Close
					</button>

					{{-- Modal para mensagem de encerramento --}}
					<div class="modal" tabindex="-1" role="dialog" id="closeMessageModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Leave your customers a message:</strong></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body text-center">
									<textarea rows="3" cols="50" name="status_message" class="rounded bg-light p-3">{{$caffe->status_message}}</textarea>
								</div>

								<div class="modal-footer">
									<input type="submit" class="btn btn-danger btn-sm my-2" value="Pin the message and close the door" />
								</div>
							</div>
						</div>
					</div>
					@else
					<input type="submit" class="btn btn-primary btn-sm my-2" value="Open the caffe!" />
					@endif
				</form>


				@elseif(Auth::check() && Auth::user()->follows()->find($caffe->id))
				<div class="border rounded text-center bg-light my-4">
					You're a customer!
				</div>

				<a href="{{ route('caffes.unfollow', $caffe->id) }}" class="unfollow-button">
					<div class="border rounded text-center btn btn-danger">
						<i class="fas fa-hand-point-left"></i> Leave
					</div>
				</a>

				@elseif(Auth::check())
				<a href="{{ route('caffes.follow', $caffe->id) }}" class="follow-button">
					<div class="border rounded text-center btn btn-success">
						<i class="fas fa-hand-holding-usd"></i> Be a customer!
					</div>
				</a>
				@endif

				@if(Auth::check() && Auth::user()->isAdmin == true)
				<h5 class="text-info my-4">ADMIN CONTROLS</h5>
				<form method="post" action="/caffes/{{$caffe->id}}/lock">
					@csrf

					@if($caffe->locked == false)
					<a href="#" data-toggle="modal" data-target="#lockMessageModal">
						<div class="border rounded text-center btn btn-info">
							<i class="fas fa-lock"></i> Lock the caffe
						</div>
					</a>

					{{-- Modal para mensagem de encerramento --}}
					<div class="modal" tabindex="-1" role="dialog" id="lockMessageModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Leave a message :</strong></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body text-center">
									<textarea rows="3" cols="50" name="status_message" class="rounded bg-light p-3">{{$caffe->status_message}}</textarea>
								</div>

								<div class="modal-footer">
									<input type="submit" class="btn btn-danger btn-sm my-2" value="Pin the message and lock the place!" />
								</div>
							</div>
						</div>
					</div>
					@else
					<input type="submit" class="btn btn-primary btn-sm my-2" value=" Unlock the caffe!" />
					@endif
				</form>
				@endif
			</div>

			<div class="my-4">
				<em>{{$caffe->name}}'s Staff</em>
				<br />
				@foreach($staff as $s)
				@foreach($s as $members)
				@if($members[0] == 1)
				<div id="followerinfo">
					<a href="/users/{{$s[0]->id}}">
						<div class="center rounded-circle logo-small photo-div" style="background-image: URL({{$s[0]->foto_url}}); "></div>
						<p>{{$s[0]->name}}</p>
					</a>
				</div>

				@endif
				@endforeach
				@endforeach
			</div>

			<div class="my-4">
				<em>{{$caffe->name}}'s customers...</em>
				<br />

				@if(count($followers) == 1)
				<div class="border rounded text-center bg-light my-2">
					There's no one here but the owner!
				</div>
				@endif
				<div id="followers">
					@foreach($followers as $follower)
					<!-- Verifica se o $follower é o dono do café ou o próprio utilizador - não lista nesse caso. -->
					@if((!Auth::check() || $follower->id !== Auth::user()->id) && $follower->id !== $caffe->user->id)
					<div id="followerinfo">
						<a href="/users/{{$follower->id}}">
							<div class="center rounded-circle logo-small photo-div" style="background-image: URL({{$follower->foto_url}}); "></div>
							<p>{{$follower->name}}</p>
						</a>
					</div>
					@endif
					@endforeach
				</div>
			</div>

		</div>
	</div>
</div>
@endsection