<!DOCTYPE html>
<html>
<head>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
    <meta charset=utf-8 />
    <title>JS Bin</title>
</head>
<body>


<div class="navbar navbar-default navbar-fixed-top my-custom-nav" role="navigation">

    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/home">Greeklancing</a>



        <div class="navbar-right navbar-text cursor" data-toggle="dropdown" data-target=".user-dropdown">
            <i class="fa fa-user"></i>  {{ Auth::user()->name }} <b class="caret"></b>
        </div>



        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/searchproject">Αναζήτηση Έργου</a></li>
                <li><a href="/addproject">Καταχώρηση Έργου</a></li>
                <li><a href="/payment">Οικονομικά</a></li>
            </ul>
        </div>



        <ul class="nav navbar-nav navbar-user navbar-right">
            <li class="dropdown user-dropdown">

                <ul class="dropdown-menu">
                    <li ><a href="/profile/{{Auth::user()->id}}"><i class="fa fa-user"></i> Προφίλ</a></li>
                    <li><a href="/chat"><i class="fa fa-envelope"></i> Μηνύματα</a></li>
                    {{--<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>--}}
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="fa fa-power-off"></i> Αποσύνδεση</a></li>
                </ul>
            </li>
        </ul>


    </div>
</div>




</body>
</html>
