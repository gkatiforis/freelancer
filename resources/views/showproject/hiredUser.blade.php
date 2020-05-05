<div id="hired-user" style="display: none; margin-top: 50px">

    <div class="hired-user-profile-userpic">


        <img src="https://d13yacurqjgara.cloudfront.net/users/487964/screenshots/1464859/loading.gif">

    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="hired-user-profile-usertitle">

        <div class="hired-user-profile-usertitle-name" onclick="window.open('/profile/{{$freelancer['id']}}','')">
            {{$freelancer['name']}}
        </div>

        {{--<?php--}}
        {{--if($freelancer['rate_quality_of_work'] != null &&--}}
                {{--$freelancer['rate_communication'] != null &&--}}
                {{--$freelancer['rate_worked_again'] != null &&--}}
                {{--$freelanczr['rate_consistent'] != null){--}}
            {{--$sum = ($rate_quality_of_work +--}}
                            {{--$rate_communication +--}}
                            {{--$rate_worked_again+--}}
                            {{--$rate_consistent) /4;--}}
        {{--}else{--}}
            {{--$sum = 0.0;--}}
        {{--}--}}

        {{--?>--}}
        {{--<div class="hired-user-profile-usertitle-job">--}}
            {{--<input id="" type="hidden" class="rating" data-readonly value="{{$sum}}"/>--}}
        {{--</div>--}}

        @if($project->status_id == 2 )
            <div class="hire-label">
                <button  class="btn btn-default btn-xs text-center" style="margin-bottom:4px;  height:38px; width: 120px;"><span> <strong> Αναμονή για συμφωνία</strong> </span><i class="icon-ok" style=" vertical-align: middle;"></i></button>
            </div>

            @if( Auth::user()->id == $freelancer['id'])
                <div class="hired-user-profile-userbuttons">
                    <button id="accept-hire" type="button" class="btn btn-success btn-sm">Αποδοχή</button>
                    <button id="refuse-hire" type="button" class="btn btn-danger btn-sm">Απόρριψη</button>
                </div>
            @endif

            @if($project['user_id'] == Auth::user()->id)
                <div class="hired-user-profile-userbuttons">
                    <button id="cancel-hire" type="button" class="btn btn-default">Ακύρωση επιλογής</button>
                </div>
            @endif

        @endif

    </div>

</div>