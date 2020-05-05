@extends('default')


@section('head')
    @parent
    @include('head')


    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/modern-business.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/addproject.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap-min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap-responsive.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="{!! asset('css/chosen.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/chosen.min.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{!! asset('js/addproject.js') !!}"></script>


@stop

@section('navbar')


    @include('homeNavbar')

@stop

@section('content')



    <div class="container" style="">
        <div class="row-fluid" >
            <div class="span6 offset6" style="float: none; margin: 0 auto;">
                <h1>Προσθήκη έργου</h1>
            </div>
        </div>

        <div class="row-fluid" >
            <div class="span6 offset6" style="float: none; margin: 0 auto;">

            <form data-toggle="validator" role="form" method="POST" action="/addproject/{{Auth::user()->id}}" enctype="multipart/form-data">

                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />


                <div class="dropdown" id="categoryListForm">


                    <select class="form-control"  id="categoryList" name="categoryList">
                        <option id="defaultItem" value="-1"><a disabled>Επιλέξτε Κατηγορία</a></option>
                        @foreach($skill_categories as $item)
                            <option id="{{ $item['id'] }}" value="{{ $item['id'] }}"><a disabled>{{ $item['sign'] }}</a></option>
                        @endforeach

                    </select>

                </div>

                <div id="formDiv">

                    <div class="row">
                        <div class="col-md-1">
                            {{--<h3><div id="cancelCategory"  class="disbled"><a disabled> (allagh)</a></div></h3>--}}
                            <h4>  <div id="cancelCategory" class="disbled"><a disabled><i class="glyphicon glyphicon-arrow-left"></i></a></div></h4>
                        </div>
                        <div class="col-md-15">
                            <h4><div id="categoryTitle"></div> </h4>
                        </div>
                      </div>




                    <div class="form-group">
                        <label for="inputName" class="control-label">Τίτλος</label>
                        <input type="text" name="projecttitle" class="form-control" id="inputName" placeholder="" required maxlength="45">
                    </div>


                    <div class="form-group">
                        <label for="comment">Περιγραφή</label>
                        <textarea name="projectdes" class="form-control" rows="5" id="comment" required maxlength="250"></textarea>
                    </div>

                    <div style="margin-bottom: 20px;"  id="selectSkillsPanel">
                        <div class="form-group">
                            <select data-placeholder="Επέλεξε ικανότητες" multiple class="chosen-select"  name="skillsList[]" id="searchSkillsList2" style="width:550px;" tabindex="18" id="multiple-label-example" required>
                                @foreach( $skills as $item)
                                    <option id="{{ $item['id'] }}" value="{{ $item['id'] }}"><a disabled>{{ $item['sign'] }}</a></option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="margin-bottom: 20px" class="input-group">
                        @foreach($project_type as $item)
                            <label class="radio-inline"><input id="type{{ $item['id'] }}" type="radio" name="project_type_id" value="{{ $item['id'] }}">{{ $item['type'] }}</label>
                        @endforeach

                    </div>



                    <div  style="margin-bottom: 20px; display: none;" class="input-group" id="pricePanel">
                        <div class="form-group">
                            <div class="dropdown" id="$budgetListForm">

                                {{--<button id="budgetListButton" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">    budget--}}
                                    {{--<span class="caret"></span>--}}
                                {{--</button>--}}

                                <label for="comment">Εκτιμημένη αξία</label>
                                <select class="form-control"  id="budgetList" name="budgetList">
                                    @foreach( $project_budget as $item)
                                        <option id="{{ $item['id'] }}" value="{{ $item['id'] }}"><a disabled>{{ $item['budget'] }}</a></option>
                                    @endforeach

                                </select>

                            </div>
                         </div>
                    </div>


                    <div style="margin-bottom: 20px; display: none;"  id="hoursPanel">

                        <div class="form-group">
                            <label for="comment">Εκτιμημένη τιμή ανά ώρα</label>


                                <div class="input-group">
                                    <input class="form-control" name="euro"   type="number" min="0" step="1" data-bind="value:replyNumber" />
                                    <span class="input-group-addon">
                                       <i class="glyphicon glyphicon glyphicon-euro form-control-feedback"></i>
                                    </span>
                                </div>
                        </div>



                                <div class="form-group">

                                    <div class="dropdown" id="durationListForm">

                                        <div class="form-group">
                                            <label for="comment">Εκτιμημένη διάρκεια</label>
                                            <select class="form-control"  id="durationList" name="durationList">
                                                @foreach( $project_duration as $item)
                                                  <option id="{{ $item['id'] }}" value="{{ $item['id'] }}"><a disabled>{{ $item['duration'] }}</a></option>
                                                @endforeach

                                            </select>

                                        </div>



                                    </div>
                                </div>
                     </div>


                    <div class="form-group">
                        <div style="position:relative;">
                            <a class='btn btn-primary' href='javascript:;'>
                                Επιλογή αρχείου...
                                <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                            </a>
                            {{--&nbsp;--}}
                            {{--<span class='label label-info' id="upload-file-info"></span>--}}
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Προσθήκη</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
    </div>


<script>
$(function(){


    $('#categoryList').on('change', function(){

        var selected = $(this).find("option:selected");

        var div = document.getElementById('categoryTitle');

        div.innerHTML =  selected.text();


        $("#formDiv").hide();
        $("#formDiv").fadeIn(500)
        $("#categoryListForm").hide();
    })




    jQuery("#type2").click(function(e){


        $("#hoursPanel").hide(300);
        $("#pricePanel").fadeIn(500)

    });

    jQuery("#type1").click(function(e){

        $("#hoursPanel").fadeIn(500)
        $("#pricePanel").hide(300);
    });





    $("#categoryList option").on('touchstart', function(e) {
       //  alert($(this).text());
        var div = document.getElementById('categoryTitle');

        div.innerHTML = div.innerHTML + " " + $(this).text();


        $("#formDiv").hide();
        $("#formDiv").fadeIn(500)
        $("#categoryListForm").hide();
    });


    $("#cancelCategory").click(function(){

        // alert($(this).text());
        var div = document.getElementById('categoryTitle');

        div.innerHTML = "";

       // $("#formDiv").show(300);
        $("#formDiv").hide();
        $("#categoryListForm").fadeIn(500);

        $('#categoryList').val("-1");

    });




});


$("#dropdownMenu2").on("click", "li a", function() {
    var platform = $(this).text();
    $("#dropdown_title2").html(platform);
    $('#printPlatform').html(platform);
});




</script>

    <script type="text/javascript" src="{!! asset('js/chosen.jquery.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/chosen.jquery.min.js') !!}"></script>

    <script>
        $(".chosen-select").chosen()
        $("#formDiv").hide();
    </script>
@stop
