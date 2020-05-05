@extends('default')


@section('head')
    @parent
    @include('head')


    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/modern-business.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-- resources/views/auth/register.blade.php -->
    <link href="{!! asset('css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap-min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap-responsive.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <script type="text/javascript" src="{!! asset('js/jquery-min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap-min.js') !!}"></script>

    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/showproject.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/searchproject.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/chosen.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/chosen.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    {{--<link href="{!! asset('css/style2.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}
    <link href="{!! asset('css/bootstrap-rating.css') !!}" media="all" rel="stylesheet" type="text/css" />


    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    {{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}


@stop

@section('navbar')


    @include('homeNavbar')

@stop

@section('content')


    <div class="container">



        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    {{--@include('showproject.leftPanel')--}}
                </div>
            </div>
            {{--{{$conversationsExists[0]}}--}}
            <div class="col-md-7">
                <div class="profile-content">
                    <div class="container">
                        <div class="row" >
                            <div class="col-md-8">

                                <div class="well well-sm" style="background-color: transparent; border: transparent;">


                                    @if($project['user_id'] == Auth::user()->id and $project->status_id == 1)
                                        @include('showproject.editableProject')
                                    @else
                                        @include('showproject.project')
                                    @endif

                                    @if( $project->status_id == 4 and
                                    ($project['user_id'] == Auth::user()->id  or
                                     $freelancer['id'] == Auth::user()->id))
                                    @else
                                        @if($project['user_id'] != Auth::user()->id and $project->status_id == 1)
                                            @if($exists == 0)
                                                 @include('showproject.addOffer')
                                            @else
                                                 @include('showproject.editOffer')
                                            @endif
                                        @endif
                                     @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    @if( $project->status_id == 4 and
                        ($project['user_id'] == Auth::user()->id  or
                         $freelancer['id'] == Auth::user()->id))
                        @include('showproject.hiredUser')
                     @endif
                </div>
            </div>
            {{--{{$conversationsExists[0]}}--}}
            <div class="col-md-7">
                <div class="profile-content">
                    <div class="container">
                        <div class="row" >
                            <div class="col-md-8">

                                <div class="well well-sm" style="background-color: transparent; border: transparent;">

                                    @if(
                                    ($project['user_id'] == Auth::user()->id  or
                                     $freelancer['id'] == Auth::user()->id))
                                        @include('showproject.milestoneTable')
                                     @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">


            <div class="col-sm-12 col-md-10 col-md-offset-1">


                    @if($project->status_id == 1 and
                     ($project['user_id'] == Auth::user()->id))
                        @include('showproject.hiredOffer')
                    @endif


               @if($project->status_id == 2 )
                    @include('showproject.hiredOffer')
                @endif
                        @if($project->status_id == 3 )
                            @include('showproject.hiredOffer')
                        @endif

                @include('showproject.offersTable')
                @if(count($bids) < 1)
                    <div id="no-offers">
                        <p class="text-center">Δεν έχουν γίνει ακόμα προσφορές</p>
                    </div>

                @endif
                @include('showproject.editOfferBot')
            </div>

        </div>

    </div>

    @include('showproject.sendMsgModal')
    @include('showproject.hireModal')


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>



    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap-tooltip.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap-popover.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('js/bootstrap-rating.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap-rating.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/showproject.js') !!}"></script>
    {{--<script type="text/javascript" src="{!! asset('js/showproject.js !!}"></script>--}}


    <script>

        var hireUserid = JSON.parse("{{ json_encode($freelancer['id']) }}");
        if(hireUserid != null){
            $('#hired-user').show();
        }


        $( '#edit-bid-form' ).on( 'submit', function(e) {


            e.preventDefault();
            $("#edit-offer-go").addClass("glyphicon-refresh glyphicon-refresh-animate");
            $("#edit-offer-close-top").hide();
            $("#edit-offer-close-bot").hide();
            var host = window.location.host;
            $.ajax({
                url: 'http://' + host + '/editbid',
                type: "post",
                dataType: 'JSON',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'offer': $('input[name=offer]').val(),
                    'description': $('textarea[name=description]').val(),
                    'days': $('input[name=days]').val(),
                    'hours': $('input[name=hours]').val(),
                    'hoursmoney': $('input[name=money-per-hour]').val(),
                    'project_id': $('input[name=project-id]').val(),
                    'user_id': $('input[name=user-id]').val()

                },
                success: function (data) {

                    var amount=data['amount'];
                    var days=data['days'];
                    var description=data['description'];
                    var hours=data['hours'];
                    var amount_per_hour=data['amount_per_hour'];


                    $("#edit-offer-go").removeClass("glyphicon-refresh glyphicon-refresh-animate");
                    $("#edit-offer-close-top").show();
                    $("#edit-offer-close-bot").show();


                    $("#edit-offer-close-top").click();
                    $("#edit-offer-close-bot").click();

                    var userid = JSON.parse("{{ json_encode(Auth::user()->id) }}");
                    var trId = "#tr"+ userid;

                    var des =  document.getElementById("des"+userid);


                    if(des != null){

                        $('html, body').animate({
                            scrollTop: $(trId).offset().top
                        }, 600);

                        $("#des"+userid).html(description);



                        if( amount != null){
                            $("#days"+userid).html("<h4> "+amount +"E</h4> σε "+  days +" ημέρες");

                        }else{
                            $("#hours"+userid).html("<h4>"+ amount_per_hour +"E</h4> " +hours +" ώρες ανά εβδομάδα");
                        }


                    }

//                        document.getElementById("name"+userid).innerHTML = "<a href=\"#\">"+ user['name'] +"</a>";
                    $('#rate'+userid).rating('rate',5);//////////////////////////////////////////////////////////////////////////////////////////////////////////////// to do////

                    var des2 =   $("#des");

                    if(des2 != null){

                        $('html, body').animate({
                            scrollTop: $("#added-Offer").offset().top
                        }, 1000);


                        des2.html(description);

                        if( amount != null){
                            $("#moneylabel").html("<h4> "+amount +"E</h4> σε "+  days +" ημέρες");

                        }else{
                            $("#moneylabel").html("<h4>"+ amount_per_hour +"E</h4> " + hours +" ώρες ανά εβδομάδα");
                        }

                        $("#edit-offer-close-bot").click();
                    }
                }
            });
        });


    </script>
@stop