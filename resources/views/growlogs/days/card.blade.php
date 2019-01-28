
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 sorting-item" id="growlog-{{$day->id}}" >


                                <div class="ui-block">
                                    <article class="hentry post">
                                        <div class="post__author author vcard ">


                                            <div class="author-date">
                                                @if($page!='growlog')
                                                <a class="h6 post__author-name fn" href="{{url('/growlogs/'.$day->growlog_id)}}">{{strtoupper($day->growlog->name)}}</a>  -

                                                    @if($day->growlog->strain_id!=null)
                                                    <a href="{{url('/strain/'.$day->growlog->strain_id)}}">{{$day->growlog->strain->name}}</a>
                                                    @endif
                                                @endif
                                                <span class="pull-right">{{$day->date->format('d-m-y')}}</span>
                                                <div class="post__date">
                                                    <i class="fa fa-calendar"></i> {{$day->stage_day}} días en <strong>{{$day->stage->name}}</strong>

                                                </div>


                                            </div>

                                        </div>

                                        {{-- todos los textos --}}
                                         @foreach($day->texts as $text)
                                        <i class="fa fa-edit"></i> {{$text->content}}<br />
                                        @endforeach
                                        <br />

                                        {{-- todas las imagenes --}}
                                        <div class="post-block-photo js-zoom-gallery">
                                        @if(count($day->images)<=2)
                                            @foreach($day->images()->orderBy('created_at','desc')->get() as $count => $image)
                                                    <a href="{{Cloudder::show($image->cloudinary, ["secure" => true])}}" data-fancybox="gallery{{$image->growlog_day_id}}" class="half-width" style="padding:0px !important">
                                                    <img src="{{Cloudder::show($image->cloudinary, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo">
                                                    </a>
                                            @endforeach
                                        @endif

                                        @if(count($day->images)>=3)
                                            @foreach($day->images()->orderBy('created_at','desc')->get() as $count => $image)
                                                    @if($count==0)
                                                        <a href="{{Cloudder::show($image->cloudinary, ["secure" => true])}}" data-fancybox="gallery{{$image->growlog_day_id}}" class="half-width" style="padding:0px !important">
                                                        <img src="{{Cloudder::show($image->cloudinary, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo">
                                                        </a>
                                                    @elseif($count==1)
                                                        <a href="{{Cloudder::show($image->cloudinary, ["secure" => true])}}" data-fancybox="gallery{{$image->growlog_day_id}}" class="half-width" style="padding:0px !important">
                                                        <img src="{{Cloudder::show($image->cloudinary, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo">
                                                            <span class="play-video h3" style="padding: 0px !important;line-height:61px;color:white;">

                                                                +{{count($day->images)-2}}
                                                            </span>
                                                        </a>
                                                    @else
                                                        <a href="{{Cloudder::show($image->cloudinary, ["secure" => true])}}" data-fancybox="gallery{{$image->growlog_day_id}}" class="half-width" hidden style="padding:0px !important" >
                                                        <img src="{{Cloudder::show($image->cloudinary, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo">
                                                            <span class="play-video h3" style="padding: 0px !important;line-height:61px;color:white;">

                                                                +{{count($day->images)-2}}
                                                            </span>
                                                        </a>
                                                    @endif

                                            @endforeach
                                        @endif
                                        </div>

                                        <div class="post-additional-info inline-items">

                                            {{-- <ul class="friends-harmonic">
                                                    @foreach($day->comments as $key => $comment)
                                                        @if($key<=5)
                                                            <li>
                                                                <a   @if(!Auth::guest()) data-toggle="modal" data-target="#open-comments-popup-{{$feed->id}}" @endif>
                                                                    <img @if($comment->user->avatar!=null) src="{{Cloudder::show($comment->user->avatar, ["width" =>28, "height" =>28, "crop"=>"fill", "format"=>"jpg","secure" => true])}}"
                                                                    @else src="{{url('/img/user.png')}}" @endif width="28" heght="28" alt="friend">
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach

                                            </ul> --}}


                                            {{-- <div class="names-people-likes">
                                                @if($feed->comments->count()==1)
                                                Hay un comentario
                                                @endif
                                                @if($feed->comments->count()>1)
                                                {{$feed->comments->count()}} personas han Comentado
                                                @endif
                                            </div> --}}


                                        </div>

                                        <div class="control-block-button post-control-button">
                                            <a href="{{'/growlog/'.$day->growlog_id}}" class="btn btn-control fafeed fa fa-eye">
                                            </a>

                                            @if(!Auth::guest())
                                                <a href="#" class="btn btn-control fafeed fa fa-comments-o" data-toggle="modal" data-target="#open-comments-popup-{{$feed->id}}" ></a>

                                                @if( (Auth::user()->id == $day->user_id))
                                                    <div class="modal fade show text-center" id="delete-feed-{{$day->id}}" >
                                                        <div class="modal-dialog ui-block">
                                                            {{-- {{Form::open(['action' => 'FeedController@delete'])}}
                                                                    <input type="" name="feed_id" id="feed_delete_id" value="{{$feed->id}}" hidden>
                                                                    <h5 class="ui-block-title">Eliminar seguimiento</h5>
                                                                    <p >Si eliminas esta hoja de tu Bitacora se perdera toda la información en ella. </p>
                                                                    <p>¿Deseas continuar?</p>
                                                                    <button class="btn btn-primary btn-lg" type="submit"> Si, eliminar</button>


                                                            {{Form::close()}} --}}
                                                            <a href="#" class="btn btn-blue btn-lg" data-dismiss="modal" aria-label="Close" >Cancelar</a>
                                                        </div>
                                                    </div>

                                                    <a class="btn btn-control fafeed fa fa-ellipsis-v " type="button" id="dropdownFeedTools" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white"></a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownFeedTools">
                                                        {{-- <a class="dropdown-item" href="{{url('growlogs/days/'.$day->id.'/edit')}}">Editar</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete-feed-{{$feed->id}}" >Eliminar</a> --}}
                                                    </div>

                                                 @endif
                                            @endif

                                        </div>


                                    </article>
                                </div>
                            </div>
