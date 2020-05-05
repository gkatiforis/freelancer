<!doctype html>
<html>
<head>
    @yield('head')
</head>
<body style="" >
<div class="container main-container" >

    <header class="row">
        @yield('navbar')
    </header>

    <div  style="" id="main" class="row fill" >

        @yield('content')
    </div>

    <footer class="row">
        @include('footer')
    </footer>

</div>
</body>
</html>


<style>



    html,body{height:100%;
        /*background-image: url("http://media02.hongkiat.com/using-freelancers-guide/freelancer-working.jpg");*/
        /*background-repeat: no-repeat;*/
    }

    .container {
        height:100%;
    }

    .fill{

        height:100%;
        min-height:100%;

    }

</style>
