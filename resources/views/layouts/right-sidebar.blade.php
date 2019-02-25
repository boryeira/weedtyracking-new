

<!-- FIXED SIDEBAR RIGHT -->
<div class="fixed-sidebar right">
  <!-- Fixed Sidebar chica -->
  <div class="fixed-sidebar-right sidebar--small" id="sidebar-right">
    <div class="mCustomScrollbar" data-mcs-theme="dark">
    </div>
    <a  class="olympus-chat inline-items js-sidebar-open fa fa-camera" style="color:white; font-size: 21px"  >
    </a>
  </div>

  @if(!Auth::guest())
  <div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">


        <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark" style="max-height: 600px">

          <div class="ui-block-title ui-block-title-small" style="margin-bottom:0px !important; ">
              <h6   id="track-title" class="title">Bitacora</h6>
          </div>
          <div class="ui-block" style="padding:10px">
            {{Form::open(['route' => ['days.store',$growlog->id], 'method' => 'POST','files' => true])}}
            <div class="text-center" >

              <div class="form-group">
                <select id="growlog_select" name="growlog_id">
                  <option value="0">Elige un seguimiento</option>
                  <optgroup label="Activas">
                    @foreach(Auth::user()->actives as $growlog)
                    <option value="{{$growlog->id}}">{{$growlog->name}}</option>
                    @endforeach

                  </optgroup>
                  <optgroup label="Cosechadas">
                    @foreach(Auth::user()->harvested as $growlog)
                    <option value="{{$growlog->id}}">{{$growlog->name}}</option>
                    @endforeach
                  </optgroup>

                </select>
              </div>
              <div class="form-group">
                <add-media></add-media>
              </div>
              <button type="submit" class="btn btn-success ">Agregar seguimiento</button>
            </div>
            {{Form::close()}}
          </div>


        </div>

        <div  class="olympus-chat text-center" style="padding: 10px;" >
                <a  class="olympus-chat inline-items js-sidebar-open fa fa-camera" style="color:white; font-size: 21px"  >

    </a>
        </div>



  </div>

  @else
  <div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">
    <div class="container">
      <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark" style="max-height: 600px">
            <div class="text-center" >
              <img  src="{{url('img/upload.png')}}" width="100" style="margin:20px">
              <p>Sube imagenes de tus plantas y crea una bitacora de su crecimiento</p>
              <img  src="{{url('img/service.png')}}" width="100" style="margin:20px">
              <p>Registra tus actividades y comparte el conocimiento.</p>
              <a class="btn btn-grey btn-lg" style="margin-top: 40px; " href="{{url('login')}}">Iniciar sesión</a>
              <p class="text-center"><a class="h6 author-name" href="{{url('/register')}}"><strong>o registrate</strong></a></p>

            </div>
            <a id="image_button"></a>
            <a id="image_button_resp"></a>
      </div>
    </div>
  </div>
  @endif



</div>
<!-- ... end Fixed Sidebar Right -->




<!-- FIXED SIDEBAR RIGHT RESPONSIVE-->

  <div class="fixed-sidebar right fixed-sidebar-responsive">

    <div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">
      <a   class="olympus-chat inline-items js-chat-open fa fa-camera" style="color:white; font-size: 21px;" >
      </a>
    </div>

  </div>

  <!-- ... end Fixed Sidebar Right -->

@if(!Auth::guest())
  <!-- ... SEGUIMIENTO RESPONSIVE -->

  <div class="ui-block popup-chat popup-chat-responsive">
    <div class="ui-block-title">
      <h6   id="track-title-resp" class="title">Bitacora</h6>
      <div class="more">
        <a class="fa fa-close js-chat-open" style="font-size: 21px;"></a>
      </div>
    </div>
    <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark">
      <add-media></add-media>

      {{-- <div class="ui-block">
        {{Form::open(['action' => 'FeedController@create','files' => true,'id' => 'seguimiento-sidebar-responsive'])}}
          <div class="comment-form inline-items" >

            <div class="form-group" style=" width: 100%;margin-bottom: 10px">
              <select id="plant_select_resp" name="plant_id">
                <option value="0">Elige una planta</option>
                <optgroup label="Activas">
                  @foreach(Auth::user()->plants as $plant)
                  <option value="{{$plant->id}}">{{$plant->name}}</option>
                  @endforeach

                </optgroup>
                <optgroup label="Cosechadas">
                  @foreach(Auth::user()->harvested as $plant)
                  <option value="{{$plant->id}}">{{$plant->name}}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
            <div class="ui-block">

                <div class="photo-album-item create-album " id="image_button_resp" style="min-height:80px !important;display: block;margin-bottom: 10px" >
                    <a  class="full-block ">
                      <div class="content">

                        <div class="row">
                          <div class="col-sm-4">
                            <a class="btn btn-control bg-primary " style="margin: 0 !important" >
                              <span class="fa fa-camera white" style="color:white;"></span>
                            </a>
                          </div>
                          <div  class="col-sm-8">
                            <p style="margin-top:15px !important;">Selecciona las imagenes</p>

                          </div>
                        </div>
                      </div>
                    </a>
                </div>
                {{--  /end selector de imagenes para seguimiento de planta
                <p class="alert alert-warning " id="plant_warning_resp" style="margin-bottom: 10px">Si no escojes una planta se considerara como un seguimiento rapido o ve a <a href="{{url('/user/'.Auth::user()->slug().'/plants')}}">Tus plantas</a></p>

                <div id="image_inputs_resp">
                    <input type="file" id="image1_resp" multiple="multiple" class="image_file active" name="images[]" hidden/>
                    <input type="file" id="image2_resp" multiple="multiple" class="image_file active" name="images[]" hidden/>
                    <input type="file" id="image3_resp" multiple="multiple" class="image_file active" name="images[]" hidden/>
                    <input type="file" id="image4_resp" multiple="multiple" class="image_file active" name="images[]" hidden/>
                    <input type="file" id="image5_resp" multiple="multiple" class="image_file active" name="images[]" hidden/>
                    <input type="file" id="image6_resp" multiple="multiple" class="image_file active" name="images[]" hidden/>
                </div>
                <div id="image_thumbs_resp" style="display: none">
                  <img width="80" id="img1_resp"/>
                  <img width="80" id="img2_resp"/>
                  <img width="80" id="img3_resp"/>
                  <img width="80" id="img4_resp"/>
                  <img width="80" id="img5_resp"/>
                  <img width="80" id="img6_resp"/>
                </div>
                <div class="form-group is-empty" style="width:100% !important">
                  <textarea class="form-control" placeholder="Texto de tu seguimiento..." name="text"></textarea>
                  <span class="material-input"></span><span class="material-input"></span>
                </div>

                <button class="btn btn-grey btn-lg" id="upload_form_resp" >Realizar seguimiento</button>
            </div>



          </div>
        {{Form::close()}}
      </div> --}}

    </div>

  </div>

  <div id="loading" style="display : none;">
    <img src="{{url('/img/loader.gif')}}">
    <h5>Subiendo imagenes...</h5>
  </div>

<!-- ... end Seguimiento responsive -->

 @else


 @endif
