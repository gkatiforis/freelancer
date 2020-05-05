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
    <link href="{!! asset('css/bootstrap-responsive.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="{!! asset('js/jquery-min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap-min.js') !!}"></script>


    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />


    <script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>



    {{--<script type="text/javascript" src="{!! asset('js/bootstrap-multiselect.js') !!}"></script>--}}
    {{--<link href="{!! asset('css/bootstrap-multiselect.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{!! asset('css/modal.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}

    <link href="{!! asset('css/register.css') !!}" media="all" rel="stylesheet" type="text/css" />

    {{--<script type="text/javascript" src="{!! asset('js/login.js') !!}"></script>--}}
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

@show

@section('navbar')



    <nav class="navbar navbar-default" style="background-color: transparent;border-width: 0px;">
        <div class="container-fluid">

            <div class="navbar-header" style=" height: 50px; ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <div class="row">


                    <a class="navbar-brand" rel="home" href="#" title="Greeklancing">
                        Greeklancing
                    </a>

                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a id="login"   data-toggle="modal">
                            Σύνδεση
                        </a>
                    </li>
                    <li>
                        <button id="register" type="button" class="btn btn-primary btn-lg" data-toggle="modal">
                            Εγγραφή
                        </button>


                    </li>



                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    {{--<!-- Large modal -->--}}
    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>--}}

    {{--<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">--}}
    {{--<div class="modal-dialog modal-xl" id="myModal">--}}
    {{--<div class="modal-content">--}}

    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-body">--}}

    {{--<form class="form-horizontal" method="POST" action="post.php">--}}
    {{--<h3>Add skills </h3>--}}
    {{--<div class="row">--}}

    {{--<div class="col-sm-4">--}}

    {{--<div class="list-group" id="categoriesList" >--}}
    {{--<a href="#" id="category1" class="list-group-item active"> <span class="badge">14</span>Cras justo odio</a>--}}
    {{--<a href="#" id="category2" class="list-group-item"><span class="badge">14</span>Dapibus ac facilisis in</a>--}}
    {{--<a href="#" id="category3" class="list-group-item"> <span class="badge">14</span>Morbi leo risus</a>--}}
    {{--<a href="#" id="category4" class="list-group-item"> <span class="badge">14</span>Porta ac consectetur acgfdfghfgdhfgh</a>--}}
    {{--<a href="#" id="category5" class="list-group-item"> <span class="badge">14</span>Vestibulum at eros</a>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-sm-4">--}}



    {{--<div class="solTitle"> <a href="#"  id="solution0">Solution0 </a></div>--}}
    {{--<div class="solTitle"> <a href="#"  id="solution1">Solution1 </a></div>--}}

    {{--<div id="summary_solution0" style="display:none" class="summary">--}}
    {{--<div class="container">--}}
    {{--<form role="form">--}}
    {{--<div class="form-group">--}}
    {{--<input class="form-control" id="searchinput" type="search" placeholder="Anazhthsh..." />--}}
    {{--</div>--}}
    {{--<div id="searchlist" class="list-group">--}}
    {{--<a class="list-group-item" id="skill1" name="red" href="#"><span>red</span><i style="background:red" class="badge">&nbsp;</i></a>--}}
    {{--<a class="list-group-item" id="skill1"  name="rosybrown" href="#"><span>rosybrown</span><i style="background:rosybrown" class="badge">&nbsp;</i></a>--}}
    {{--<a class="list-group-item" id="skill1"  name="royalblue" href="#"><span>royalblue</span><i style="background:royalblue" class="badge">&nbsp;</i></a>--}}
    {{--<a class="list-group-item" id="skill1"  name="salmon" style=""  href="#"><span>salmon</span><i style="background:salmon" class="badge">&nbsp;</i></a>--}}




    {{--<a class="list-group-item" id="skill2" name="seagreen" href="#"><span>seagreen</span><i style="background:seagreen" class="badge">&nbsp;</i></a>--}}
    {{--<a class="list-group-item" id="skill2" name="silver" href="#"><span>silver</span><i style="background:silver" class="badge">&nbsp;</i></a>--}}
    {{--<a class="list-group-item" id="skill2" name="skyblue" href="#"><span>skyblue</span><i style="background:skyblue" class="badge">&nbsp;</i></a>--}}
    {{--<a class="list-group-item" id="skill2" name="yellow" href="#"><span>yellow</span><i style="background:yellow" class="badge">&nbsp;</i></a>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}

    {{--</div>--}}

    {{--<div class="col-sm-4" >--}}

    {{--<div id="selectedList" class="list-group">--}}

    {{--<a class="list-group-item" id="skill2" name="seagreen" href="#"><span>seagreen</span><i style="background:seagreen" class="badge">&nbsp;</i></a>--}}
    {{--<a class="list-group-item" id="skill2" name="silver" href="#"><span>silver</span><i style="background:silver" class="badge">&nbsp;</i></a>--}}
    {{--<a class="list-group-item" id="skill2" name="skyblue" href="#"><span>skyblue</span><i style="background:skyblue" class="badge">&nbsp;</i></a>--}}
    {{--<a class="list-group-item" id="skill2" name="yellow" href="#"><span>yellow</span><i style="background:yellow" class="badge">&nbsp;</i></a>--}}
    {{--</div>--}}

    {{--</div>--}}



    {{--</div>--}}
    {{--</form>--}}


    {{--</div>--}}
    {{--<div class="panel-footer"></div>--}}
    {{--</div>--}}



    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--{{ print_r($data) }}--}}
    <!-- Modal -->
    {{--<div class="modal fade mo" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
    {{--<div class="modal-dialog" role="document">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-header">--}}
    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
    {{--<h4 class="modal-dialog modal-lg" id="myModalLabel">Insert Skills</h4>--}}
    {{--</div>--}}
    {{--<div class="modal-body">--}}





    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}





@stop

@section('content')
    <p>


    <div class="col-md-6 col-md-offset-4" id="registerform" style="display: none;">
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <h1>Εγγραφή</h1>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 offset6">
                    <div id="maincontent" class="span8">

                        <form id="registration-form" class="form-horizontal" method="POST" action="/register">

                            @foreach ($errors->all() as $error)
                                <div id="registerError" class="alert alert-danger">{{ $error }}</div>
                            @endforeach


                            {!! csrf_field() !!}
                            <br/>

                            <div class="form-control-group">

                                <div style="margin-bottom: 20px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username" value="{{ old('name') }}">

                                </div>

                                <div style="margin-bottom: 20px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" value="" placeholder="email" value="{{ old('email') }}">
                                </div>

                                <div style="margin-bottom: 20px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">

                                </div>
                                <div style="margin-bottom: 20px" class="input-group">
                                    <label class="radio-inline"><input type="radio" name="user_type_id" value="3">Είμαι εργοδότης</label>
                                    <label class="radio-inline"><input type="radio" name="user_type_id" value="4">Είμαι freelancer </label>

                                </div>

                                <div style="margin-bottom: 20px" class="input-group">
                                    Συμφωνώ
                                    <input id="agree" class="checkbox" type="checkbox" name="agree">

                                </div>
                                <button type="submit"  class="btn btn-success btn-large">Εγγραφή</button>
                            </div>

                        </form>
                        <div class="col-md-2 col-md-offset-2" style="margin-bottom: 25px" class="input-group">

                            <button id="cancelRegister" class="btn btn-mini"> <span class="glyphicon glyphicon-remove-circle"></span></button>
                        </div>

                    </div>

                    <!-- .span -->
                </div>
                <!-- .row -->

            </div>
            <!-- .container -->
        </div>



    </div>




    <div class="col-md-6 col-md-offset-4" id="loginform" style="display: none;">

        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <h1>Σύνδεση</h1>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 offset6">
                    <div id="maincontent" class="span8">

                        <form id="login-form" class="form-horizontal" method="POST" action="/login">


                            @foreach ($errors->all() as $error)
                                <div id="loginError" class="alert alert-danger">{{ $error }}</div>
                            @endforeach

                            {!! csrf_field() !!}
                            <br/>
                            <div class="form-control-group">

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" value="" placeholder="email" value="{{ old('email') }}">
                                </div>


                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"> <i class="lyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password"  value="{{ old('password') }}">

                                </div>


                                <div style="margin-bottom: 25px" class="input-group">
                                    <button type="submit" class="btn btn-success btn-large">Σύνδεση</button>
                                </div>



                            </div>

                        </form>

                        <div class="col-md-2 col-md-offset-2" style="margin-bottom: 25px" class="input-group">
                            <button id="cancelLogin" class="btn btn-mini"> <span class="glyphicon glyphicon-remove-circle"></span></button>
                        </div>
                    </div>
                    <!-- .span -->
                </div>
                <!-- .row -->

            </div>
            <!-- .container -->
        </div>




    </div>



    <div id="carouselArea">

        <!-- Header Carousel -->
        <header id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="fill" style="background-image:url('http://artisantalent.com/wp-content/uploads/2012/04/mistakes-to-avoid-when-hiring-freelancers.jpg');"></div>
                    <div class="carousel-caption">
                        <h2></h2>
                    </div>
                </div>
                <div class="item">
                    <div class="fill" style="background-image:url('http://www.brandingmagazine.com/wp-content/uploads/2015/09/art-of-freelancing.jpg');"></div>
                    <div class="carousel-caption">
                        <h2></h2>
                    </div>
                </div>
                <div class="item">
                    <div class="fill" style="background-image:url('https://llamapress.com/wp-content/uploads/2015/08/freelance.png');"></div>
                    <div class="carousel-caption">
                        <h2></h2>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </header>

        <hr>
        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <h4 >
                        <p>  Δοκίμασε ένα καινούριο τρόπο εργασίας  </p>
                    </h4>
                </div>
                <div class="col-md-4">
                    <button id='actionRegister' type="button" class="btn btn-success btn-lg" data-toggle="modal">
                        Εγγραφή Τώρα
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Πως Δουλεύει;
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Ανάρτησε μια δουλειά</h4>
                    </div>
                    <div class="panel-body">
                        <p>
                            Αναρτήστε μια εργασία δωρεάν και λάβετε προσφορές από τους καλύτερους freelancers εντός ολίγων λεπτών.
                        </p>
                        {{--<a href="#" class="btn btn-default">Learn More</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Διάλεξε το καλύτερο</h4>
                    </div>
                    <div class="panel-body">
                        <p>Δείτε το προφίλ των freelancer, συνομιλήστε και κάντε απονομή της δουλειάς σας στον αγαπημένο σας προσφοροδότη.</p>
                        {{--<a href="#" class="btn btn-default">Learn More</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Λάβε προσφορές</h4>
                    </div>
                    <div class="panel-body">
                        <p>Αξιολογήστε τις προσφορές σας και πληρώστε μόνο όταν είστε εντελώς ικανοποιημένοι με τη δουλειά σας.</p>
                        {{--<a href="#" class="btn btn-default">Learn More</a>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>

    {{--<script type="text/javascript">--}}

    {{--addEventListener('load', prettyPrint, false);--}}
    {{--$(document).ready(function(){--}}
    {{--$('pre').addClass('prettyprint linenums');--}}
    {{--});--}}


    {{--</script>--}}
    <script type="text/javascript" src="{!! asset('js/jquery.validate.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/register.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/login.js') !!}"></script>
    {{--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">--}}
    {{--insert skills--}}
    {{--</button>--}}
    <!-- /.container -->

    {{--<!-- jQuery -->--}}
    {{--<script src="js/jquery.js"></script>--}}

    {{--<!-- Bootstrap Core JavaScript -->--}}
    {{--<script src="js/bootstrap.min.js"></script>--}}

    <!-- Script to Activate the Carousel -->

    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })


        //  var  MyDiv1 = document.getElementById('errorDiv');



        $(document).ready(function(){

            var error = $('#registerError').html();

            var error = $('#loginError').html();


            if (typeof error === "undefined") {
                $("#carouselArea").show();
                $("#registerform").hide();
                $("#loginform").hide();
            }else{
                $("#carouselArea").hide();
                $("#loginform").hide();
                $("#registerform").show();

            }



            $("#register").click(function(){
                $("#carouselArea").hide();
                $("#loginform").hide(500);
                $("#registerform").show(500);
            });

            $("#actionRegister").click(function(){
                $("#carouselArea").hide();
                $("#loginform").hide(500);
                $("#registerform").show(500);
            });


            $("#login").click(function(){
                $("#carouselArea").hide();
                $("#registerform").hide(500);
                $("#loginform").show(500);
            });

            $("#cancelRegister").click(function(){
                $("#registerform").hide(500);
                $("#carouselArea").show();
            });
            $("#cancelLogin").click(function(){
                $("#loginform").hide(500);
                $("#carouselArea").show();
            });

        });

    </script>

    {{--<script type="text/javascript" src="{!! asset('js/jquery-1.7.1.min.js') !!}"></script>--}}




@endsection
{{--<script type="text/javascript">--}}
{{----}}
{{--$('#categoriesList').on('click', '.list-group-item', function(e) {--}}
{{--e.preventDefault();--}}
{{--$(".list-group-item").removeClass("active");--}}
{{--$(e.target).addClass("active");--}}
{{--// alert(e.target);--}}
{{--});--}}
{{--$('#skillsList').on('click', '.list-group-item', function(e) {--}}
{{--e.preventDefault();--}}
{{--$(".list-group-item").removeClass("active");--}}
{{--$(e.target).addClass("active");--}}
{{--// alert(e.target);--}}
{{--});--}}
{{--$(document).ready(function(){--}}
{{--$("#categoriesList .list-group-item").on('click', function () {--}}
{{--var contentId = $(this).attr('id');--}}
{{--//            alert(contentId);--}}
{{--$("#searchlist .list-group-item").hide();--}}
{{--$("#searchlist #" + contentId).show();--}}
{{--});--}}
{{--$("#searchlist .list-group-item").on('click', function () {--}}
{{--var contentId = $(this).attr('id');--}}
{{--var contentName = $(this).attr('name');--}}
{{--//   alert(contentId);--}}
{{--$('#selectedList').append("  <li class='list-group-item'> " + contentName +"</li>")--}}
{{--$(this).hide()--}}
{{--});--}}
{{--});--}}
{{----}}
{{--</script>--}}

{{--<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>--}}
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
{{--<script src="js/bootstrap-list-filter.src.js"></script>--}}
{{--<script>--}}
{{--$('#searchlist').btsListFilter('#searchinput', {itemChild: 'span'});--}}
{{--</script>--}}

{{--<script src="/labs-common.js"></script>--}}
{{--</p>--}}
