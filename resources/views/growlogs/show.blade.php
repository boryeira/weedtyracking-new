@extends('layouts.app')

@section('content')
<div class="container ">


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- @include('alerts.alert') --}}
        </div>


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- Header --}}
            @include('growlogs.header', ['growlog' => $growlog])
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="clients-grid">
              <div class="row sorting-container grid" id="clients-grid-1" >

                    @foreach($days as $day)
                            <!-- tracking-feed  -->
                            @include('growlogs.days.card', ['day' => $day, 'page'=>'growlog'])
                            <!-- ... end tracking-feed  -->
                            <!-- comment-popup -->
                            {{-- @include('popup.comment', ['feed' => $feed]) --}}
                            <!-- ... end comment-popup -->

                            {{-- @if(!Auth::guest())
                                @if(Auth::user()->id == $plant->user_id)
                                    @include('popup.plant-config', ['plant' => $plant])
                                @endif
                            @endif --}}

                    @endforeach

                    <!-- info-popup -->
                    {{-- @include('popup.plant-info', ['plant' => $plant]) --}}
                    <!-- end info-popup -->

                </div>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center padding80">
            <a class="btn btn-primary text-center" href="{{$days->nextPageUrl()}}"> Cargar mas seguimientos</a>
        </div>
    </div>




</div>





@endsection

@section('script')

  <script defer>
  $( document ).ready(function() {
    $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
    });
    $('.grid').masonry('reloadItems');
  });
  </script>
@endsection
