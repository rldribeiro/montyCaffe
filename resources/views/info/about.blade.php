@extends('layouts.app')

@section('content')

<div class="container">
    <div class="my-2">
        <h1>So... What is Monty Caffe?</h1>
        <em>Open up a caffe and have conversations with others!</em>
    </div>
    <div class="row">        
        <div class="col-md-6">

            <div class="my-5">
                <strong class="text-info">Here you can:</strong><br />
                • open up to 4 caffes!<br />
                • start conversations at caffes you are custommer of!<br />
                • mark your posts with tags using #hashtag!<br />
                • open and close your caffe at any moment!<br />
                • ... and have fun!<br />
            </div>

            <div class="my-5">
                <strong class="text-danger">Some things you should be aware:</strong><br />
                • Here you can't modify or delete your conversations! What is said is said*! Deal with it!<br />
                • You can't delete a caffe! You can close it and never open it again, but you won't get rid of it!<br />
                • All caffes are public! There is no one at the door telling you you can't get in!<br />
            </div>

            <small>* but if it's beyond acceptable, an administrator, caffe owner or caffe staf can hide the conversation!</small>
        </div>

        <div class="col-md-6 my-5 text-right">
                <img src="http://cdn8.openculture.com/wp-content/uploads/2015/02/22231634/coffee-and-cigarettes.jpg" alt="Iggy Pop and Tom Waits" class="img-fluid rounded" />
                <br />
                <small >Iggy Pop and Tom Waits approve this message!</small>
        </div>

    </div>
</div>

@endsection