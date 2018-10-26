@extends('layouts.app')

@section('content')
<div class="row" id="contatti">
<div class="container mt-5" >

    <div class="row" style="height:550px;">
      <div class="col-md-6 maps"  >
          <div><img id="contactimg" src="https://vignette.wikia.nocookie.net/clubpenguin/images/7/7d/Hot_Chocolate_cup_cutout.png" class="logo-large centre"/></div>
      </div>
      <div class="col-md-6">
        <h2 class="text-uppercase mt-3 font-weight-bold text-Grey">Let´s Talk</h2>
        <form action="/thanks" method="post">
        @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control mt-2" name="name" placeholder="Name" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control mt-2"  name="subject" placeholder="Subject" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="email" class="form-control mt-2" placeholder="Email" name="email" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="number" class="form-control mt-2" name="contact"  placeholder="Contact" required>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <textarea class="form-control" id="text"  name="message" placeholder="Message" rows="3" required></textarea>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-grey" type="submit">Send</button>
            </div>
          </div>
        </form>
        <div class="text-white">
        <h2 class="text-uppercase mt-4 font-weight-bold" style="color:grey">Contacts</h2>

        <i class="fas fa-phone mt-3" style="color:grey"></i> <a href="tel:+" style="color:grey"> (+352) 220110001 </a><br>
        <i class="fa fa-envelope mt-3"  style="color:grey"></i> <a href="" style="color:grey"> montycaffe@montycaffe.com</a><br>
        <i class="fas fa-globe mt-3" style="color:grey"></i><a href="" style="color:grey"> ATEC, Matosinhos, Portugal</a><br>
        </div>
      </div>

    </div>
</div>
</div>
@endsection