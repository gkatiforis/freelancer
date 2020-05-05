
@if($freelancer == null)

    <div id="show-hired-offer" style="display: none;">
    <table class="table table-hover table-condensed">

        <thead>
        <tr>

            <th class="">Επιλεγμένη προσφορά</th>

            @if($project['user_id'] == Auth::user()->id)

            @endif
            <th class="col-sm-2 text-center">Προσφορά</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>
                <div class="media">
                    <a class="thumbnail pull-left" href="#" id="hired-icon"> <img id="hired-img" class="media-object img-responsive" src="http://fashatude.com/static/fashatude/img/user_icon.png" style="width: 72px; height: 72px;"> </a>
                    <div class="media-body">
                        <h4 id="hired-name" class="media-heading"></h4>




                        <span>Περιγραφή: </span><span id="hired-offer-des" class="text-success">

                                                            </span>


                    </div>
                </div></td>


            @if($project['project_type'] == 2)
                <td class="text-center" id="hired-days">

                    <div style='margin-top: 10px' id="cancel-labels">

                    </div>
                    <div style='margin-top: 10px' id="cancel-hire">

                    </div>


                </td>
            @else
                <td class="text-center" id="hired-hours">

                    <div style='margin-top: 10px' id="cancel-labels">

                    </div>
                    <div style='margin-top: 10px' id="cancel-hire">

                    </div>
                </td>



            @endif
        </tr>
        </tbody>
    </table>
</div>

@else
    <div id="show-hired-offer">
    @if($freelancer['id'] == Auth::user()->id and $project['status_id'] == 2)
        <div class="text-center accept-or-reject" >
            <p class="text-justify">
                <h3> Συγχαρητήρια η προσφορά σας έχει επιλεγεί! </h3>
                <a id="accept-hire" value=""  class="btn btn-success">Αποδοχή</a>
                <a id="refuse-hire" value=""  class="btn btn-danger">Απόρριψη</a>
        </div>
            <input name="post-freelancer-user-id" type="hidden" id="post-hire-user-id" value="{{$freelancer['id']}}" />
            <input name="post-freelancer-project-id" type="hidden" id="post-hire-project-id" value="{{$project['id']}}" />

    @endif


    <table class="table table-hover table-condensed">

        <thead>
        <tr>

            <th class="">Επιλεγμένη προσφορά</th>

            @if($project['user_id'] == Auth::user()->id)

            @endif
            <th class="col-sm-2 text-center">Προσφορά</th>
        </tr>
        </thead>
        <tbody>

                <tr>
                    <td>
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object img-responsive" src="http://fashatude.com/static/fashatude/img/user_icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 id="hired-name" class="media-heading"><a href="#"> {{$freelancer['name']}}</a></h4>


                                {{--<h5 class="media-heading">--}}
                                    {{--<input id="hired-rate" type="hidden" class="rating" data-readonly value="{{$freelancer['rating']}}"/>--}}

                                {{--</h5>--}}


                                <span>Περιγραφή: </span><span id="hired-offer-des" class="text-success">
                                                                 {{ $bid[0]['description']}}
                                                            </span>


                            </div>
                        </div></td>


                    @if($project['project_type'] == 2)

                        <td class="text-center" id="hired-days"><h4>  {{ $bid[0]['amount']}}E</h4> σε   {{ $bid[0]['days']}} ημέρες
                            @if($project['user_id'] == Auth::user()->id and $freelancer['id'] != null)


                                @if($project['status_id'] == 2)
                                    <div style="margin-top: 10px" id="cancel-hire" >
                                        <a  value="" class="btn btn-default" >Ακύρωση επιλογής</a>
                                    </div>
                                @endif

                            @endif

                        </td>




                    @else
                        <td class="text-center" id="hours{{Auth::user()->id}}"><h4>  {{ $bid[0]['amount_per_hour']}}E</h4>  {{ $bid[0]['hours']}} ώρες ανά εβδομάδα
                        @if($project['user_id'] == Auth::user()->id and $freelancer['id'] != null)


                            @if($project['status_id'] == 2)
                                <div style="margin-top: 10px" id="cancel-hire" >
                                    <a  value="" class="btn btn-default" >Ακύρωση επιλογής</a>
                                </div>
                            @endif

                        @endif
                        </td>
                    @endif
                </tr>
        </tbody>
    </table>
</div>

@endif