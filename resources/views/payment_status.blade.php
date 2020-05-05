@extends('default')


@section('head')
    @parent
    @include('head')


    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/modern-business.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/addproject.css') !!}" media="all" rel="stylesheet" type="text/css" />
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
    <link href="{!! asset('css/chosen.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/chosen.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/style2.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{!! asset('js/addproject.js') !!}"></script>
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







    <div class="container" style="padding-top: 120px;">
        <div class="row-fluid" >
            <div class="span6 offset6" style="float: none; margin: 0 auto;">
                <h3>
                    Κατατέθηκαν επιτυχώς {{$amount}} € στον λογαρισμό σας.
                </h3>

            </div>
        </div>
        <div class="row-fluid" >
            <div class="span6 offset6" style="float: none; margin: 0 auto;">
                <h3>
                    Τρέχον υπόλοιπο λογαριασμού: {{$balance}} €
                </h3>

            </div>
        </div>
        <div class="row-fluid" >
            <div class="span6 offset6" style="float: none; margin: 0 auto;">
                <h3 class="page-header">
                    Κατάθεση Χρημάτων - Paypal
                </h3>

            </div>
        </div>

        <div class="row-fluid" >
            <div class="span6 offset6" style="float: none; margin: 0 auto;">

                <form data-toggle="validator" role="form" method="POST" action="/payment" enctype="multipart/form-data">

                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />

                    <div id="formDiv">




                        <div class="form-group">
                            <label for="inputName" class="control-label">Ποσό</label>
                            <input type="number" id="amount" min="0" data-bind="value:replyNumber"  name="amount" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Κατάθεση</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>



@stop