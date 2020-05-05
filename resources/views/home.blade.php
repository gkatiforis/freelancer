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

    <link href="{!! asset('css/home.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/chosen.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/chosen.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    {{--<link href="{!! asset('css/style2.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}

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





    <div class="container" style="padding-top: 40px;">
        <div class="row">
            <div class="col-md-2 col-lg-2">
                <h2>Ανακοινώσεις</h2>
                </div>
            </div>
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <h3>Τι είναι freelancer</h3>
                <p>Είναι ένας πρωτοποριακός τρόπος εργασίας εξ αποστάσεως στον οποίο ο ελεύθερος επαγγελματίας  εργάζεται από το σπίτι τους προσφέροντας τις υπηρεσίες του σε πολλούς διαφορετικούς τομείς.</p>
                <div>
                    <div class="more label"><a href="http://homebusiness.about.com/od/homebusinessglossar1/g/freelancer.htm">Περισσότερα</a></div>

                </div>
                <div class="clear"></div>
                <hr>
                <h2>Laravel</h2>
                <p>Είναι ένα δωρεάν, ανοιχτού κώδικα PHP  web framework, που δημιουργήθηκε από τον Taylor Otwell και προορίζεται για την ανάπτυξη εφαρμογών web ακολουθώντας το Model-View-Controller (MVC) αρχιτεκτονικό πρότυπο. </p>
                <div>
                    <div class="more label"><a href="https://laravel.com/docs/5.2">Περισσότερα</a></div>

                </div>
                <hr>
                <!-- /.featured-article -->
            </div>
            {{--<div class="col-md-4 col-lg-4">--}}
                {{--<ul class="media-list main-list">--}}
                    {{--<li class="media">--}}
                        {{--<a class="pull-left" href="#">--}}
                            {{--<img class="media-object" src="http://placehold.it/150x90" alt="...">--}}
                        {{--</a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">Lorem ipsum dolor asit amet</h4>--}}
                            {{--<p class="by-author">By Jhon Doe</p>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<a class="pull-left" href="#">--}}
                            {{--<img class="media-object" src="http://placehold.it/150x90" alt="...">--}}
                        {{--</a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">Lorem ipsum dolor asit amet</h4>--}}
                            {{--<p class="by-author">By Jhon Doe</p>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<a class="pull-left" href="#">--}}
                            {{--<img class="media-object" src="http://placehold.it/150x90" alt="...">--}}
                        {{--</a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">Lorem ipsum dolor asit amet</h4>--}}
                            {{--<p class="by-author">By Jhon Doe</p>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
@stop
