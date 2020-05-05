
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





    <div class="container" style="padding-top: 120px;">


        <p class="text-left"><h3>Αναζήτηση έργου</h3></p>
        <form id="search-projects-form" class="form-horizontal" >
            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
            <div class="well well-sm">

                {{--<div style="margin-bottom: 20px" class="input-group">--}}
                {{--<div class="btn-group">--}}
                {{--<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">--}}
                {{--</span>List</a>--}}

                {{--<a href="#" id="grid" class="btn btn-default btn-sm"><span--}}
                {{--class="glyphicon glyphicon-th"></span>Grid</a>--}}
                {{--</div>--}}


                {{--<div style="margin-bottom: 20px" class="input-group">--}}


                <select onchange="changeSkillsList()" data-placeholder="Πληκτρολογίστε ή επιλέξστε ικανότητες από την λίστα" multiple class="chosen-select" id="searchSkillsList" name="searchSkillsList" style="width:95%;"  id="multiple-label-example">

                    @foreach( $skills as $item)
                        <option id="{{ $item['id'] }}" value="{{ $item['id'] }}"><a disabled>{{ $item['sign'] }}</a></option>
                    @endforeach

                </select>

                {{--</div>--}}


                <div style="margin-bottom: 20px" class="input-group">
                    {{--<input id="agree" class="checkbox" type="checkbox" name="agree">--}}
                    {{--<label class="control-label" for="message"> Sumfwnw</label>--}}
                    <button style="display: none;" type="submit" id="search" class="btn btn-success btn-large">search</button>
                </div>
                {{--<div class="dropdown" id="$sortList">--}}

                {{--<button id="budgetListButton" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">    budget--}}
                {{--<span class="caret"></span>--}}
                {{--</button>--}}

                {{--<select class="form-control"  id=orderbyList" name="orderbyList" style="width:150px;">--}}
                {{--//@foreach( $project_budget as $item)--}}
                {{--<option id="1" name="" value="1" selected><a disabled>hmeromhnia</a></option>--}}
                {{--<option id="2" name="" value="2"><a disabled>timh</a></option>--}}
                {{--<option id="3" name="" value="3" ><a disabled>bind</a></option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
                {{--<ul id="budgetOptions" class="dropdown-menu" id="budgetList">--}}
                {{--@foreach( $project_budget as $item)--}}
                {{--<li id="{{ $item['id'] }}"><a disabled>{{ $item['budget'] }}</a></li>--}}
                {{--@endforeach--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
            <div id="notfound" style="text-align: center; margin-top: 100px">Δεν βρέθηκε κανένα έργο με τα κριτήρια αναζήτησης που δώσατε </div>
            <div id="loading" style="text-align: center; margin-top: 100px"><img src="http://vis.stanford.edu/projects/immens/demo/faa/resources/loading-blue.gif" alt="Smiley face" height="70" width="70"></div>
            <div id="projectsTable">
                <div id="categories-list" class="row list-group">

                </div>
                <nav>
                    <ul id="pages" class="pagination">
                    </ul>
                </nav>
            </div>
            <input type="hidden" id="page" name="page" >
        </form>
    </div>
    <script type="text/javascript" src="{!! asset('js/searchproject.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/chosen.jquery.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/chosen.jquery.min.js') !!}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $( '#search-projects-form' ).on( 'submit', function(e) {
                $("#projectsTable").hide();
                $("#loading").show();
                $("#notfound").hide();
                e.preventDefault();
                $.ajax({
                    url: 'searchproject',
                    type: "post",
                    dataType: 'JSON',
                    data: {'orderbyList':$('select[name=orderbyList]').val(),'searchSkillsList':$('select[name=searchSkillsList]').val(), '_token': $('input[name=_token]').val(), 'page': $('input[name=page]').val()},
                    success: function(data){
                        var projects=data['projects'];
                        var projectsskills=data['projectsskills'];
                        var numberofProjects = data['numberofProjects'];
                        if(numberofProjects <= 0){
                            $("#loading").hide();
                            $("#notfound").show();
                        }
                        document.getElementById("pages").innerHTML = "";
                        var count = numberofProjects / 10 + 1;
//                            var pages = " <li> <a href=\"#\" aria-label=\"Previous\"> <span aria-hidden=\"true\">&laquo;</span> </a> </li>";
                        var pages = " ";
                        for ( i = 1; i< count; i++) {
                            pages += "<li><a href=\"#\" class=\"linkpages\" id=\"" + i +"\">"+ i + "</a></li>";
                        }

//                            pages += " <li> <a href=\"#\" aria-label=\"Next\"> <span aria-hidden=\"true\">&laquo;</span> </a> </li>";
                        document.getElementById("pages").innerHTML = pages;




                        document.getElementById("categories-list").innerHTML = "";


                        for ( i = 0; i< projects.length; i++)
                        {  // alert(projects[i]['id'])
                            var sk =projectsskills[i];
                            var skills = "";
                            for ( j = 0; j< sk.length; j++) {
                                skills += sk[j]['sign'];
                                if(j != sk.length - 1){
                                    skills +=", ";
                                }
                            }

                            var money ="";
                            if(projects[i]['price_per_hour'] != null){
                                money = projects[i]['price_per_hour'] + "€ / ώρα"
                            }else{
                                money = projects[i]['budget']
                            }
                            var item =
                                    " <div id=\""+projects[i]['id']+"\" class=\"item list-group-item\">" +

                                    "<div class=\"caption\" style=\"padding: 10px; background-color: white;\">"+





                                    "<h3 class=\"group inner list-group-item-heading\">" + projects[i]['title'] + "</h3>" +

                                    "<div class=\"col-md-10\">" +
                                    "<p class=\"group inner list-group-item-text\">" + projects[i]['description'] +
                                    "</div>"+
//
                                    "<div class=\"col-md-1 \">" +


                                    "<div class=\"span6\"> "+ money +"</div>" +
                                    "</div>"+

                                    "</p>" +

                                    "<p class=\"group inner list-group-item-text small\">" +skills +"</p>" +


                                    "<div class=\"row\">" +


//


                                    "</div>"+


                                    "</div>" +

                                    " </div>";

                            document.getElementById("categories-list").innerHTML += item;
                            $("#projectsTable").show();
                            $("#loading").hide();
                            $("#notfound").hide();
                        }
                        jQuery("a.linkpages").click(function(){
                            document.getElementById('page').value = this.id;
                            document.getElementById('search').click();
                        });
                        jQuery(".item").click(function(){

                            var userid = JSON.parse("{{ json_encode(Auth::user()->id) }}");
                            window.open('{{route("showproject")}}/'+this.id+'/'+userid);
                        });
                    }
                });
            });

            document.getElementById('search').click();
        });


        function changeSkillsList(){
            document.getElementById('page').value = "1";
            document.getElementById('search').click();
        }

    </script>


    <script>
        $(".chosen-select").chosen()
    </script>


@stop