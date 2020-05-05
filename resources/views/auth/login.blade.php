
<!-- resources/views/auth/register.blade.php -->
<link href="{!! asset('css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/bootstrap-responsive.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{!! asset('js/jquery-min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/bootstrap-min.js') !!}"></script>

<div class="col-md-9 col-md-offset-4" id="loginform" >
<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <h1>Sundesh</h1>
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
                            <button type="submit" class="btn btn-success btn-large">Syndesh</button>
                        </div>



                    </div>

                </form>

                {{--<div class="col-md-2 col-md-offset-2" style="margin-bottom: 25px" class="input-group">--}}

                    {{--<button id="cancelLogin" class="btn btn-mini"> <span class="glyphicon glyphicon-remove-circle"></span></button>--}}
                {{--</div>--}}
            </div>
            <!-- .span -->
        </div>
        <!-- .row -->

    </div>
    <!-- .container -->
</div>

</div>

<script type="text/javascript" src="{!! asset('js/jquery-1.7.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.validate.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/script.js') !!}"></script>

    <script src="assets/js/jquery-1.7.1.min.js"></script>

    <script src="assets/js/jquery.validate.js"></script>

    <script src="script.js"></script>
<script type="text/javascript">

        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });

        addEventListener('load', prettyPrint, false);
        $(document).ready(function(){
            $('pre').addClass('prettyprint linenums');
        });


    </script>
