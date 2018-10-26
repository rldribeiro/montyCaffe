@extends('layouts.app') @section('content')

<div class="container">
    <div class="my-4">
        <h1 class="text-center">Let's hire some Staff!!</h1>
    </div>
    <div class="row">
        <div class="col-md-6">

            <form method="post" action="/caffes/staff/hire">
            @csrf
                <input type="hidden" name="caffe_id" value="{{$caffe->id}}">
                <div class="form-group">
                    <label>Caffe Name:</label>

                    @if(isset($caffe))
                    <input type="text" class="form-control" id="caffeName" name="name" placeholder="Ex.: Monty" value="{{$caffe->name or old('name')}}" disabled />
                    @endif

                </div>
                <!-- pode escolher qualquer follower do cafe para ser moderador ^menos o dono porque utomaticamente é -->
                <div class="form-group" >
                    <label>Candidates:</label><br>

                    @foreach($followers as $follower)
                        @if($follower->id != $caffe->user->id)
                        <label>
                            <input type="checkbox" name="checkbox[]" value="{{$follower->id}}"/>
                            <span class="seatButton">{{$follower->name}}</span>
                        </label>
                    <br> 
                    @endif
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary my-2">HIRE!</button>
            </form>
            <br>
       
        <!-- Remove moderators -->


            <form method="post" action="/caffes/staff/remove">
            
            @csrf

                <div class="form-group" >
                    <label>Active Staff:</label><br>

                    @foreach($followers as $follower)
                        @if($follower->id != $caffe->user->id)
                        <label>
                            <input type="checkbox" name="checkbox[]" value="{{$follower->id}}"/>
                            <span class="seatButton">{{$follower->name}}</span>
                        </label>
                    <br> 
                    @endif
                    @endforeach
                </div>
                <input type="hidden" name="caffe_id" value="{{$caffe->id}}">
                <button type="submit" class="btn btn-danger my-2">Remove!</button>
            </form>

        </div>        
        <div class="col-md-6">
            <img src="https://cdn.shopify.com/s/files/1/1285/4651/files/14716277_1290804677617955_6722590650526659182_n.jpg?v=1518472140" alt="Hire"
                class="img-fluid rounded" />
        </div>
    </div>
</div>


@endsection