@extends('default')


@section('head')
    @parent
    @include('head')


    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/modern-business.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    {{--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
    <!-- resources/views/auth/register.blade.php -->
    <link href="{!! asset('css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap-min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap-responsive.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    {{--<script type="text/javascript" src="{!! asset('js/jquery-min.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="{!! asset('js/bootstrap-min.js') !!}"></script>--}}

    <link href="{!! asset('css/chat.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/chosen.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/chosen.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/style2.css') !!}" media="all" rel="stylesheet" type="text/css" />

    {{--<link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{!! asset('css/addproject.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}
    {{--<script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="{!! asset('js/validator.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>--}}

    {{--<script type="text/javascript" src="{!! asset('js/bootstrap-multiselect.js') !!}"></script>--}}
    {{--<link href="{!! asset('css/bootstrap-multiselect.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{!! asset('css/modal.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}

    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    {{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}

@stop

@section('navbar')


    @include('homeNavbar')

@stop

@section('content')



    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


    <div class="container" style="padding-top: 20px;">
        <div class="row">
            <div class="panel panel-collapse">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                <span class="pull-right">
                    <ul class="nav panel-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Tab 1</a></li>
                    </ul>
                </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="test">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="btn-panel btn-panel-conversation">
                                            {{--<a href="" class="btn  col-lg-6 send-message-btn " role="button"><i class="fa fa-search"></i> Search</a>--}}
                                            {{--<a href="" class="btn  col-lg-6  send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> New Message</a>--}}
                                        </div>
                                    </div>

                                    <div class="col-lg-offset-1 col-lg-7">
                                        <div class="btn-panel btn-panel-msg">

                                            {{--<a href="" class="btn  col-lg-3  send-message-btn pull-right" role="button"><i class="fa fa-gears"></i> Settings</a>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="conversation-wrap col-lg-3">

                                        @if(count($users) == 0)

                                            <div class="media conversation">
                                                <div class="media-body text-center"  >
                                                    <h5 class="media-heading" style="margin-top: 10px;">Δεν υπάρχουν συνομιλίες</h5>
                                                </div>
                                            </div>

                                        @else

                                            @for ($x = 0; $x < count($users); $x++)
                                                @for ($y = 0; $y < count($conversations); $y++)
                                                    @if($x == $y)
                                                        <div class="media conversation conv" id="{{$conversations[$y]->id}}" style="cursor:pointer; cursor: hand; ">
                                                            <input  id="conv-user-id{{$conversations[$y]->id}}" type="hidden"  value="{{$users[$x]->id}}"/>

                                                            <a class="pull-left" href="#">
                                                                <img class="media-object" src="http://fashatude.com/static/fashatude/img/user_icon.png" alt="64x64" style="width: 50px; height: 50px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">
                                                            </a>
                                                            <div class="media-body">
                                                                <h5 class="media-heading">{{$users[$x]->name}}</h5>
                                                                <small></small>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endfor
                                            @endfor

                                        @endif
                                    </div>

                                    <input  id="conv-user-id" type="hidden"  name="conv-user-id" value=""/>
                                    <input  id="user-id" type="hidden" name="user-id" value="{{Auth::user()->id}}"/>
                                    <input  id="user-name" type="hidden" name="user-name" value="{{Auth::user()->name}}"/>
                                    <input  id="conv-id" type="hidden" name="conv-id" value=""/>



                                    <div class="message-wrap col-lg-8" >

                                        <div class="msg-wrap" id="msg-panel" style="min-height: 350px;">




                                            {{--<div class="alert alert-info msg-date">--}}
                                            {{--<strong>Today</strong>--}}
                                            {{--</div>--}}



                                        </div>
                                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                        <div class="send-wrap ">
                                            <div id="loading" style="text-align: center; display:none;"><img src="https://d13yacurqjgara.cloudfront.net/users/487964/screenshots/1464859/loading.gif" alt="Smiley face" height="100" width="100"></div>
                                            <textarea class="form-control send-message" rows="3"  name="text" id="text" placeholder="Γράψτε εδώ . . ."></textarea>


                                        </div>
                                        <div class="btn-panel">
                                            {{--<a href="" class=" col-lg-3 btn   send-message-btn " role="button"><i class="fa fa-cloud-upload"></i> Add Files</a>--}}
                                            {{--<a  class=" col-lg-4 text-right btn   send-message-btn pull-right" id="send-msg-btn" role="button"> Αποστολή</a>--}}

                                            <span id="send-msg-btn" class="btn-primary col-lg-4 text-right btn   send-message-btn pull-right" style="color: black;">Αποστολή</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/chats.js"></script>
    <script>


        $(document).ready(function() {

        });

    </script>





@stop