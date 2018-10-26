@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="my-10">
                <h1 class="text-center my-10">Where will you take a cup today?</h1>
            </div>
            <div class="row">
                @foreach ($caffes as $caffe)
                <div class="col-lg-4 my-4">
                    <div class="card bg-light mb-3 h-100" style="max-width: 18rem;">
                        <div class="card-header text-center">

                            <a href="/caffes/{{$caffe->id}}">
                                <h4>{{$caffe->name}}</h4>
                                <div class="center rounded-circle logo-large photo-div" style="background-image: URL({{$caffe->logo_url}}); "></div>                                
                            </a>
                            <br /><em>
                            {{$caffe->followers()->count()}}

                            <!-- Código para adicionar um s quando o número de clientes é diferente de 1 -->
                            @if($caffe->followers()->count() != 1)
                            customers
                            @else
                            customer
                            @endif
                        </em>
                            </div>

                        <div class="card-body">
                            <p class="card-text">{{$caffe->description}}</p>
                        </div>
                        <div class="card-footer text-muted text-right">
                            <em>Owner: {{$caffe->user->name}}</em>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{$caffes->links()}}
        </div>
    </div>
    <div>
        <div class="row my-4">
            <div class="col-md-6">
                <h3>Not finding what you're looking for?</h3>
                
                <form class="form-group" method="get" action="/search">
                @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" name="q" class="form-control" placeholder="Search Caffes, Users and Tags..."/>
                        
                    </div>                                        
                </form>

            </div>
        </div>
    </div>
</div>

@endsection