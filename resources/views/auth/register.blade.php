
<!-- resources/views/auth/register.blade.php -->
<link href="{!! asset('css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/bootstrap-responsive.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{!! asset('js/jquery-min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/bootstrap-min.js') !!}"></script>

<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <h1>Eggrafh</h1>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 offset6">
            <div id="maincontent" class="span8">

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                <form id="registration-form" class="form-horizontal" method="POST" action="register">
                    {!! csrf_field() !!}

                    <br/>

                    <div class="form-control-group">

                        <div style="margin-bottom: 20px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username" value="{{ old('name') }}">
                        </div>

                        <div style="margin-bottom: 20px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="email" type="text" class="form-control" name="email" value="" placeholder="email" value="{{ old('email') }}">
                        </div>

                        <div style="margin-bottom: 20px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">

                        </div>
                        <div style="margin-bottom: 20px" class="input-group">
                            <label class="radio-inline"><input type="radio" name="user_type_id" value="3">Eimai ergodoths</label>
                            <label class="radio-inline"><input type="radio" name="user_type_id" value="4">Eimai freelancer </label>

                        </div>

                        <div style="margin-bottom: 20px" class="input-group">
                            <input id="agree" class="checkbox" type="checkbox" name="agree">
                            <label class="control-label" for="message"> Sumfwnw</label>
                            <button type="submit" class="btn btn-success btn-large">Register</button>
                        </div>





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
