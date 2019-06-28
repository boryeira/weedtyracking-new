@extends('layouts.app')

@section('right-sidebar')
  @include('layouts.right-sidebar',['action'=>'growlog-date'])
@endsection

@section('content')

<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
        <div class="ui-block">


				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
            <img src="{{Cloudder::show($growlog->avatar, ["width" =>42, "height" =>42, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="author" >
						<div class="label-avatar bg-primary">2</div>
					</div>
					<div class="birthday-author-name">
						<a  href="{{url('/growlogs/'.$growlog)}}" class="h6 author-name">{{$growlog->name}}</a>
						<div class="birthday-date"><a href="{{url('/strain/'.$growlog->strain_id)}}">{{$growlog->strain->name}}</a></div>
					</div>

					<div class="skills-item">

							<h4>Seguimiento día {{$date->formatLocalized('%A %d')}}</h4>

					</div>

				</div>

			</div>



      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
        <div class="ui-block">

        </div>
      </div>
    </div>
</div>



@endsection
