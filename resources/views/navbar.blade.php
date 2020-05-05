



<link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>



<script type="text/javascript" src="{!! asset('js/bootstrap-multiselect.js') !!}"></script>
<link href="{!! asset('css/bootstrap-multiselect.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/modal.css') !!}" media="all" rel="stylesheet" type="text/css" />


<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Greeklancing</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Register
                    </button>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">login <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <h3>Login</h3>
                        <form action="[YOUR ACTION]" method="post" accept-charset="UTF-8">
                            <input id="user_username" style="margin-bottom: 15px;" type="text" name="user[username]" size="30" />
                            <input id="user_password" style="margin-bottom: 15px;" type="password" name="user[password]" size="30" />
                            <input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="user[remember_me]" value="1" />
                            <label class="string optional" for="user_remember_me"> Remember me</label>

                            <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
                        </form>
                    </ul>
                </li>

                <li>
                    <a href="/logout" class="btn btn-info" role="button">Logout</a>
                </li>



            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>



<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-xl" id="myModal">
        <div class="modal-content">

            <div class="panel panel-default">
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="post.php">
                        <h3>Add skills </h3>
                        <div class="row">

                            <div class="col-sm-4">

                                <div class="list-group" id="categoriesList" >
                                    <a href="#" id="category1" class="list-group-item active"> <span class="badge">14</span>Cras justo odio</a>
                                    <a href="#" id="category2" class="list-group-item"><span class="badge">14</span>Dapibus ac facilisis in</a>
                                    <a href="#" id="category3" class="list-group-item"> <span class="badge">14</span>Morbi leo risus</a>
                                    <a href="#" id="category4" class="list-group-item"> <span class="badge">14</span>Porta ac consectetur acgfdfghfgdhfgh</a>
                                    <a href="#" id="category5" class="list-group-item"> <span class="badge">14</span>Vestibulum at eros</a>
                                </div>
                            </div>

                            <div class="col-sm-4">



                                {{--<div class="solTitle"> <a href="#"  id="solution0">Solution0 </a></div>--}}
                                {{--<div class="solTitle"> <a href="#"  id="solution1">Solution1 </a></div>--}}

                                {{--<div id="summary_solution0" style="display:none" class="summary">--}}
                                {{--<div class="container">--}}
                                    {{--<form role="form">--}}
                                        <div class="form-group">
                                            <input class="form-control" id="searchinput" type="search" placeholder="Anazhthsh..." />
                                        </div>
                                        <div id="searchlist" class="list-group">
                                            <a class="list-group-item" id="skill1" name="red" href="#"><span>red</span><i style="background:red" class="badge">&nbsp;</i></a>
                                            <a class="list-group-item" id="skill1"  name="rosybrown" href="#"><span>rosybrown</span><i style="background:rosybrown" class="badge">&nbsp;</i></a>
                                            <a class="list-group-item" id="skill1"  name="royalblue" href="#"><span>royalblue</span><i style="background:royalblue" class="badge">&nbsp;</i></a>
                                            <a class="list-group-item" id="skill1"  name="salmon" style=""  href="#"><span>salmon</span><i style="background:salmon" class="badge">&nbsp;</i></a>




                                            <a class="list-group-item" id="skill2" name="seagreen" href="#"><span>seagreen</span><i style="background:seagreen" class="badge">&nbsp;</i></a>
                                            <a class="list-group-item" id="skill2" name="silver" href="#"><span>silver</span><i style="background:silver" class="badge">&nbsp;</i></a>
                                            <a class="list-group-item" id="skill2" name="skyblue" href="#"><span>skyblue</span><i style="background:skyblue" class="badge">&nbsp;</i></a>
                                            <a class="list-group-item" id="skill2" name="yellow" href="#"><span>yellow</span><i style="background:yellow" class="badge">&nbsp;</i></a>
                                        </div>
                                    {{--</form>--}}
                                {{--</div>--}}

                            </div>

                            <div class="col-sm-4" >

                                <div id="selectedList" class="list-group">

                                    <a class="list-group-item" id="skill2" name="seagreen" href="#"><span>seagreen</span><i style="background:seagreen" class="badge">&nbsp;</i></a>
                                    <a class="list-group-item" id="skill2" name="silver" href="#"><span>silver</span><i style="background:silver" class="badge">&nbsp;</i></a>
                                    <a class="list-group-item" id="skill2" name="skyblue" href="#"><span>skyblue</span><i style="background:skyblue" class="badge">&nbsp;</i></a>
                                    <a class="list-group-item" id="skill2" name="yellow" href="#"><span>yellow</span><i style="background:yellow" class="badge">&nbsp;</i></a>
                                </div>

                            </div>



                        </div>
                    </form>


                </div>
                <div class="panel-footer"></div>
            </div>



        </div>
    </div>
</div>



<script type="text/javascript">


    $('#categoriesList').on('click', '.list-group-item', function(e) {
        e.preventDefault();

        $(".list-group-item").removeClass("active");
        $(e.target).addClass("active");

        // alert(e.target);
    });

    $('#skillsList').on('click', '.list-group-item', function(e) {
        e.preventDefault();

        $(".list-group-item").removeClass("active");
        $(e.target).addClass("active");

        // alert(e.target);
    });


    $(document).ready(function(){


        $("#categoriesList .list-group-item").on('click', function () {
            var contentId = $(this).attr('id');
//            alert(contentId);

            $("#searchlist .list-group-item").hide();
            $("#searchlist #" + contentId).show();
        });

        $("#searchlist .list-group-item").on('click', function () {
            var contentId = $(this).attr('id');
            var contentName = $(this).attr('name');

         //   alert(contentId);
            $('#selectedList').append("  <li class='list-group-item'> " + contentName +"</li>")
           $(this).hide()
        });


    });
    //    $("#example-post").multiselect({
    //
    //    };

    //
    //    $(document).ready(function() {
    //        $('.dropdowns').multiselect({
    //            onDropdownShow: function(event) {
    //                var menu = $(event.currentTarget).find(".dropdown-menu");
    //                var original = $(event.currentTarget).prev("select").attr("id");
    //
    //                // Custom functions here based on original select id
    //                //if (original === "example-post") menu.css("width", 1500);
    //             //   if (original === "example-post") menu.css("background", "red");
    //
    //            }
    //        });
    //    });

    //    $(document).ready(function() {
    //        $('#example-post').multiselect({
    //            includeSelectAllOption: true,
    //            enableFiltering: true
    //        });
    //    });
</script>

{{--<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>--}}
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
{{--<script src="js/bootstrap-list-filter.src.js"></script>--}}
{{--<script>--}}

    {{--$('#searchlist').btsListFilter('#searchinput', {itemChild: 'span'});--}}

{{--</script>--}}

{{--<script src="/labs-common.js"></script>--}}
