@extends('default')


@section('head')
    @parent
    @include('head')


    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/modern-business.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/addskills.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    {{--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
    <!-- resources/views/auth/register.blade.php -->
    <link href="{!! asset('css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap-responsive.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />

    {{--<script type="text/javascript" src="{!! asset('js/jquery-min.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="{!! asset('js/bootstrap-min.js') !!}"></script>--}}


    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />


    <script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>



    {{--<script type="text/javascript" src="{!! asset('js/bootstrap-multiselect.js') !!}"></script>--}}
    {{--<link href="{!! asset('css/bootstrap-multiselect.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{!! asset('css/modal.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}



    {{--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">--}}

@show

@section('navbar')


    @include('homeNavbar')

@stop

@section('content')




    {{--{{Auth::user()->id}}--}}



    <div class="panel panel-default">
        <div class="panel-body">


                <h3>Προσθήκη Ικανοτήτων </h3>

                <div class="row">

                    <div class="col-sm-4">
                       <p> <h4> Επιλέξτε Κατηγορία</h4> </p>
                        <div class="list-group" id="categoriesList" >
                            <?php $index = 0 ?>
                            @foreach($skill_categories as $item)
                                <a onmouseover="fadeCategories()" onmouseout="fadeOutCategories()"  href="#" id="{{ $item['id'] }}" class="list-group-item">
                                    <span  id="countIcon{{$index}}" name="countIcon" class="badge">{{count($skillsByCategory[$index])}}</span>
                                    <span style=" display:none" id="moveIcon{{$index}}" name="moveIcon" class="badge"><span class="glyphicon glyphicon-chevron-right"> </span></span>
                                    {{ $item['sign'] }}
                                </a>

                                    <?php $index = 1 + $index?>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-sm-4">
                        {{--<p> <h4> 2. Epilekste eidikothtes </h4> </p>--}}
                        <?php $index = 0 ?>
                        @foreach($skillsByCategory as $categories)


                            <div id="div{{$skill_categories[$index]['id']}}" class="categoryGroup" style="display:none">


                                <div class="form-group">
                                    <input class="form-control" id="searchinput{{$skill_categories[$index]['id']}}" name="searchInput" type="search" placeholder="Αναζήτηση..." />
                                </div>
                                <div id="searchlist{{$skill_categories[$index]['id']}}" class="list-group" name="list">
                                    @foreach($categories as $skill)
                                        <?php $exist = 0; ?>
                                        @foreach($userSkills as $selectedSkill)
                                                @if($skill['id'] == $selectedSkill['id'])
                                                  <?php $exist = 1; ?>
                                                @endif
                                        @endforeach
                                          @if($exist == 0)
                                                <div class="row">
                                                    <a class="list-group-item" id="skill{{$skill['id']}}" value="{{ $skill['sign'] }}" name="no selected" href="#">
                                                        <span>{{ $skill['sign'] }}</span>

                                                        <div  style="background:gray" id="plusIconskill{{$skill['id']}}"  class="badge"> <div class="glyphicon glyphicon-plus" > </div></div>
                                                        <div style="background:gray; display:none" id="minusIconskill{{$skill['id']}}"  class="badge"> <div class="glyphicon glyphicon-remove"> </div></div>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <a class="list-group-item" id="skill{{$skill['id']}}" value="{{ $skill['sign'] }}" name="firstSelected" href="#">
                                                        <span>{{ $skill['sign'] }}</span>

                                                        <div  style="background:gray" id="plusIconskill{{$skill['id']}}"  class="badge"> <div class="glyphicon glyphicon-plus" > </div></div>
                                                        <div style="background:gray; display:none" id="minusIconskill{{$skill['id']}}"  class="badge"> <div class="glyphicon glyphicon-remove"> </div></div>
                                                    </a>
                                                </div>

                                            @endif
                                            <?php $exist = 0; ?>
                                    @endforeach

                                </div>

                            <?php $index = 1 + $index?>

                            </div>
                        @endforeach

                        </div>


                        {{--</form>--}}
                        {{--</div>--}}

                    <form id="add-skills-form" class="form-horizontal" method="POST" action="/addskills/{{Auth::user()->id}}">

                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                        <div class="col-sm-4" >
                            <div id="selectedCategories" style="display:none">
                                <p> <h4> Επιλεγμένες Ικανότητες <span id="numOfSkillsSelected">{{count($userSkills)}}</span>/<span id="maxNumOfSkillsSelected">30</span> </h4> </p>
                                <div id="selectedList" class="list-group">
                                    {{--@foreach($userSkills as $skill)--}}
                                        {{--<div class="row">--}}
                                            {{--<a class="list-group-item" id="skill{{$skill['id']}}" value="{{ $skill['sign'] }}" name="selected" href="#">--}}
                                                {{--<span>{{ $skill['sign'] }}</span>--}}

                                                {{--<div  style="background:gray; display:none" id="plusIconskill{{$skill['id']}}"  class="badge"> <div class="glyphicon glyphicon-plus" > </div></div>--}}
                                                {{--<div style="background:gray" id="minusIconskill{{$skill['id']}}"  class="badge"> <div class="glyphicon glyphicon-remove"> </div></div>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}

                                    {{--@endforeach--}}
                                </div>

                                <div id="postData">
                                    {{--@foreach($userSkills as $skill)--}}
                                        {{--<div id="selected{{ $skill['id'] }}">--}}
                                            {{--<input type='hidden' name='selectedItems[]' value='{{$skill['id']}}'>--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}

                                </div>

                                <div style="margin-bottom: 20px" class="input-group">
                                    {{--<input id="agree" class="checkbox" type="checkbox" name="agree">--}}
                                    {{--<label class="control-label" for="message"> Sumfwnw</label>--}}
                                    <button type="submit"  class="btn btn-success btn-large">Αποθήκευση</button>
                                </div>

                             </div>

                        </div>

                    </form>


                </div>



        </div>
        <div class="panel-footer"></div>

    </div>


    <script type="text/javascript">



        function fadeCategories() {
            var countIcons = document.getElementsByName('countIcon');
            var moveIcons = document.getElementsByName('moveIcon');

            for (var i = 0; i < countIcons.length; i++) {
                handleElement(i);
            }

            function handleElement(i) {
                var id = countIcons[i].id;
                $("#" + id).hide();
                var id = moveIcons[i].id;
                $("#" + id).show();
            }
        }

            function fadeOutCategories(){
                var countIcons = document.getElementsByName('countIcon');
                var moveIcons = document.getElementsByName('moveIcon');

                for (var i = 0; i < countIcons.length; i++) {
                    handleElement(i);
                }

                function handleElement(i) {
                    var id = countIcons[i].id;
                    $("#" + id).show();
                    var id = moveIcons[i].id;
                    $("#" + id).hide();
                }

            }


        $('#categoriesList').on('click', '.list-group-item', function(e) {
            e.preventDefault();

            $(".list-group-item").removeClass("active");
            $(e.target).addClass("active");

            // alert(e.target);
        });

        $('#searchlist').on('click', '.list-group-item', function(e) {
            e.preventDefault();

            $(".list-group-item").removeClass("active");
            $(e.target).addClass("active");

            // alert(e.target);
        });


        $(document).ready(function(){

            $("#categoriesList .list-group-item").on('click', function () {
                var contentId = $(this).attr('id');
                var id = "div"+contentId;

                $(".categoryGroup").hide();
                $("#" + id).show(600);




            });


        });

    </script>

    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-list-filter.src.js"></script>
    <script>
        //   $('#searchlist').btsListFilter('#searchinput', {itemChild: 'span'});
        //$('#searchlist2').btsListFilter('#searchinput2', {itemChild: 'span'});



        var selList = document.getElementById('selectedList');
        var numItems =  selList.childElementCount;

        if(numItems> 0){
            $("#selectedCategories").show(300);

        }else{
            $("#selectedCategories").hide();
        }

            var lists = document.getElementsByName('list');
            var searchInputs = document.getElementsByName('searchInput');

            for(var i=0; i<lists.length; i++) {
                handleElement(i);
            }

                function handleElement(i) {
                    var listid = lists[i].id;
                    var inputid = searchInputs[i].id;

                    var items = document.getElementsByName('firstSelected');

                   for(var j=0; j<items.length; j++) {
                       addItems(j);
                    }



                    function addItems(j){

                            var data = document.getElementById('postData');

                            var list = document.getElementById('selectedList');
                            var item = items[j];
                            var itemId =  item.id;
                            var maxNumItems =  document.getElementById("maxNumOfSkillsSelected").innerHTML;
                            var numItems =  list.childElementCount;


                            if (numItems < maxNumItems){
                                item.name = "selected";

                                $("#plusIcon"+itemId).hide();
                                $("#minusIcon"+itemId).show();
                                var parent  = item.parentNode;

                                list.appendChild(parent);

                                var text = document.createElement('div');
                                text.id = 'selected' + itemId;
                                var id = itemId.substring(5, itemId.length);
                                text.innerHTML = "<input type='hidden' name='selectedItems[]' value='" + id +"'>";
                                data.appendChild(text);
                            }

                            numItems =  list.childElementCount;
                            if(numItems > 0 ){
                                $("#selectedCategories").show(300);
                                document.getElementById("numOfSkillsSelected").innerHTML =list.childElementCount.toString();

                            }

                    }

                    $('#' + listid).btsListFilter('#' + inputid, {itemChild: 'span'});


                    $("#" + listid + " .list-group-item").on('click', function () {
                        var contentId = $(this).attr('id');
                        var contentName = $(this).attr('name');
                        //
//                        var countIcons = document.getElementsByName('plusIcon');
//                        var moveIcons = document.getElementsByName('moveIcon');

                        if(contentName == "no selected"){


                            var data = document.getElementById('postData');
                            var list = document.getElementById('selectedList');
                            var item = document.getElementById(contentId);
                            var maxNumItems =  document.getElementById("maxNumOfSkillsSelected").innerHTML;
                            var numItems =  list.childElementCount;


                            if (numItems < maxNumItems){
                                item.name = "selected";
                                $("#plusIcon"+contentId).hide();
                                $("#minusIcon"+contentId).show();
                                var parent  = item.parentNode;

                                list.appendChild(parent);

                                var text = document.createElement('div');
                                text.id = 'selected' + contentId;
                                var id = contentId.substring(5, contentId.length);
                                text.innerHTML = "<input type='hidden' name='selectedItems[]' value='" + id +"'>";
                                data.appendChild(text);
                            }

                            numItems =  list.childElementCount;
                            if(numItems > 0 ){
                                $("#selectedCategories").show(300);
                                document.getElementById("numOfSkillsSelected").innerHTML =list.childElementCount.toString();

                            }

                        }else{

                            var list = document.getElementById(listid);
                            var item = document.getElementById(contentId);
                            item.name = "no selected";
                            $("#plusIcon"+contentId).show();
                            $("#minusIcon"+contentId).hide();
                            var parent  = item.parentNode;
                            list.appendChild(parent);
                            document.getElementById("selected" + contentId).remove();
                            var slist = document.getElementById('selectedList');

                            if(slist.childElementCount < 1 ){
                                $("#selectedCategories").hide(300);
                            }
                            document.getElementById("numOfSkillsSelected").innerHTML =slist.childElementCount.toString();
                        }
                    });

                }





    </script>

    <script src="/labs-common.js"></script>


@stop
