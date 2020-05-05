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

    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/profile.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/searchproject.css') !!}" media="all" rel="stylesheet" type="text/css" />
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



    <div class="container" style="padding-top: 50px;">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="http://fashatude.com/static/fashatude/img/user_icon.png" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{$user['name']}}
                        </div>
                        <div class="profile-usertitle-job">
                            {{$user['job_title']}}
                        </div>
                        <div class="profile-rating">
                            {{$user['rating_value']}}
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    {{--<div class="profile-userbuttons">--}}
                        {{--<button type="button" class="btn btn-success btn-sm">Follow</button>--}}
                        {{--<button type="button" class="btn btn-danger btn-sm">Message</button>--}}
                    {{--</div>--}}
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="#" id="overviewClick">
                                    <i class="glyphicon glyphicon-home"></i>
                                    Overview </a>
                            </li>

                            <li>
                                <a href="#" id="portofolioClick">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    Portofolio </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    <div id="overviewPanel">
                        @include('overview')
                    </div>
                    <div id="portofolioPanel" style="display: none;">
                        @include('portofolio')
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br>
    <br>





    <script type="text/javascript" src="{!! asset('js/profile.js') !!}"></script>

@stop


