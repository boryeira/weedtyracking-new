@extends('layouts.app')

@section('content')

  @if(Auth::guest())
  <div class="main-header">
      <div class="content-bg-wrap bg-orange">
          <div class="content-bg "></div>
      </div>
      <div class="container" >
          <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
                  <div class="main-header-content">
                      <img src="{{url('img/logo.png')}}" width="80" alt="WeedTracking">
                      <h1>WEEDTRACKING 2.0</h1>
                      <h2>Comunidad de cultivadores cannabicos!</h2>
                      <h5 class="text-center">Has seguimiento a tus plantas y mejora en cada cosecha.</h5>
                      {{-- <a class="btn btn-grey btn-lg" style="margin-top: 40px; " href="{{url('login')}}">Iniciar sesión</a>
                      <p class="text-center"><a class="h6 author-name" href="{{url('/register')}}"><strong>o registrate</strong></a></p>
                  </div> --}}
              </div>
          </div>
      </div>

      <img class="img-bottom" src="img/group-bottom.png" alt="friends">
  </div>
  @endif



@endsection
