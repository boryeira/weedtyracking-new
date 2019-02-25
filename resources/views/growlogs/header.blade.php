            <div class="ui-block" style="margin-top: 85px" >
                <div class="top-header">
                  {{-- <div class="top-header-thumb hidden-xs" style="background-color: #ff5e3a !important; height: 150px">

                  </div> --}}

                    <div class="profile-section">
                        <div class="row">

                            <div class="col-lg-5  col-md-5 ">
                                <ul class="profile-menu">
                                    <li>
                                        Imagenes{{-- <a href="{{url('/plant/'.$growlog->id.'/images')}}">Imagenes</a> --}}
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-5 offset-lg-2 col-md-5 offset-md-2">
                                <ul class="profile-menu">
                                    <li>
Pertenece a                                     <a href="{{url('/user/'.$growlog->user_id)}}">Dueño - {{$growlog->user->name}}</a>
                                    </li>
                                    <li>
                                      Seguimientos  {{-- <a href="{{url('/plant/'.$growlog->id)}}">Seguimientos</a> --}}
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            {{-- @if(!Auth::guest())

                                @if(Auth::user()->id==$growlog->user_id)

                                <a href="{{url('/plant/'.$growlog->id.'/edit')}}" class="btn btn-control bg-blue fa fa-edit" style="font-size: 32px;line-height: 1.5">

                                </a>

                                @endif
                            @endif --}}

                        </div>
                    </div>

                    <div class="top-header-author">
                        <a class="author-thumb" href="{{url('growlogs/'.$growlog->id)}}">
                            <img @if($growlog->avatar!=null) src="{{Cloudder::show($growlog->avatar, ["width" =>124, "height" =>124, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/plant.png')}}"@endif alt="author" width=124 height=124>
                        </a>
                        <div class="author-content">
                            <a href="02-ProfilePage.html" class="h4 author-name">{{$growlog->name}}</a>
                            <div class="">
                                @if($growlog->strain_id!=null)
                                    <a href="{{url('strain/'.$growlog->strain_id)}}">{{$growlog->strain->name}}</a>
                                    @if($growlog->strain->bank_id!=null)
                                            del banco
                                    <a href="#">{{$growlog->strain->bank->name}}</a>

                                    @endif()
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
