<table class="table table-hover table-condensed">

    <thead>
    <tr>

        <th class="">Όλες οι προσφορές</th>

        @if($project['user_id'] == Auth::user()->id)

        @endif
        <th class="col-sm-2 text-center">Προσφορά</th>
    </tr>
    </thead>
    <tbody>



    <?php $i = 0; ?>

    @foreach( $bids as $item)



        @if($freelancer['id'] != $item->user_id )
            {{--<option id="{{ $item['id'] }}" value="{{ $item['id'] }}"><a disabled>{{ $item['sign'] }}</a></option>--}}
            @if($item->user_id == Auth::user()->id )

                <tr id="tr{{Auth::user()->id}}">
                    <td>
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object img-responsive" src="http://fashatude.com/static/fashatude/img/user_icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 id="name{{Auth::user()->id}}" class="media-heading" onclick="window.open('/profile/{{$item->user_id}}','')"><a href="#">{{ $item->name }}</a></h4>

                                <?php
                                if($item->rate_quality_of_work != null &&
                                        $item->rate_communication != null &&
                                        $item->$rate_worked_again != null &&
                                        $item->rate_consistent != null){
                                    $sum = ($item->rate_quality_of_work +
                                                    $item->rate_communication +
                                                    $item->$rate_worked_again+
                                                    $item->rate_consistent) /4;
                                }else{
                                    $sum = 0.0;
                                }

                                ?>

                                {{--<h5 class="media-heading">--}}
                                    {{--<input id="rate{{Auth::user()->id}}" type="hidden" class="rating" data-readonly value="{{$sum}}"/>--}}
                                {{--</h5>--}}


                                <span>Περιγραφή: </span><span id="des{{Auth::user()->id}}" class="text-success">
                                                                 {{ $item->description}}
                                                            </span>


                            </div>
                        </div></td>


                    @if($project['project_type'] == 2)

                        <td class="text-center" id="days{{Auth::user()->id}}"><h4>{{$item->amount}}E</h4> σε {{$item->days}} ημέρες</td>

                    @else
                        <td class="text-center" id="hours{{Auth::user()->id}}"><h4>{{$item->amount_per_hour}}E</h4>{{$item->hours}} ώρες ανά εβδομάδα </td>
                    @endif
                </tr>
            @else




                <tr id="bid-item-{{$item->user_id}}" onmouseover="setButton({{$item->user_id}})" onmouseout="resetButton({{$item->user_id}})">
                    <td>
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object img-responsive" src="http://fashatude.com/static/fashatude/img/user_icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4  class="media-heading" onclick="window.open('/profile/{{$item->user_id}}','')"><a href="#" id="name{{$item->user_id}}" >{{ $item->name }}</a> </h4>

                                <?php
                                if($item->rate_quality_of_work != null &&
                                        $item->rate_communication != null &&
                                        $item->$rate_worked_again != null &&
                                        $item->rate_consistent != null){
                                    $sum = ($item->rate_quality_of_work +
                                                    $item->rate_communication +
                                                    $item->$rate_worked_again+
                                                    $item->rate_consistent) /4;
                                }else{
                                    $sum = 0.0;
                                }

                                ?>

                                {{--<h5 class="media-heading">--}}
                                    {{--<input  id="rate{{$item->user_id}}" type="hidden" class="rating" data-readonly value="{{$sum}}"/>--}}
                                {{--</h5>--}}
                                @if($project['user_id'] == Auth::user()->id)
                                    <span>Περιγραφή: </span><span id="des{{Auth::user()->id}}" class="text-success">
                                                                 {{ $item->description}}
                                                        </span>
                                @endif
                            </div>
                        </div>
                    </td>

                    @if($project['project_type'] == 2)

                        <td class="text-center"><h4>{{$item->amount}}E</h4> σε {{$item->days}} ημέρες
                            @if($project['user_id'] == Auth::user()->id)
                                @if( $freelancer['id'] != null)
                                    <div class="hire-buttons" style="display:none;">
                                        <div style="margin-top: 10px" id="hire-default{{$item->user_id}}" >  <a   value="{{$item->user_id}}" href="#" class="btn btn-default first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                        <div style="margin-top: 10px; display: none;" id="hire-success{{$item->user_id}}">   <a   value="{{$item->user_id}}" href="#" class="btn btn-success first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                    </div>
                                @else
                                    <div class="hire-buttons">
                                        <div style="margin-top: 10px" id="hire-default{{$item->user_id}}" >  <a   value="{{$item->user_id}}" href="#" class="btn btn-default first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                        <div style="margin-top: 10px; display: none;" id="hire-success{{$item->user_id}}">   <a   value="{{$item->user_id}}" href="#" class="btn btn-success first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                    </div>
                                @endif
                                {{--@if( $conversationsExists[$i] != 1)--}}
                                {{--<a  value="{{$item->user_id}}" class="send-msg btn btn-block" data-toggle="modal" data-target="#sendMsgModal" >Στείλτε μήνυμα</a>--}}
                                {{--@else--}}
                                {{--<a rel="tooltip" title="Έχετε ξεκινήσει συνομιλία"> <img id="after-send" style="width: 25px; height: 25px; margin-top: 10px;" src="https://www.cubi.casa/css/img/icon2_green.png" ></a>--}}
                                {{--@endif--}}

                            @endif

                        </td>



                    @else
                        <td class="text-center"><h4>{{$item->amount_per_hour}}E</h4>{{$item->hours}} ώρες ανά εβδομάδα
                            @if($project['user_id'] == Auth::user()->id)

                                @if( $freelancer['id'] != null)
                                    <div class="hire-buttons" style="display:none;">
                                        <div style="margin-top: 10px" id="hire-default{{$item->user_id}}" >  <a   value="{{$item->user_id}}" href="#" class="btn btn-default first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                        <div style="margin-top: 10px; display: none;" id="hire-success{{$item->user_id}}">   <a   value="{{$item->user_id}}" href="#" class="btn btn-success first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                    </div>
                                @else
                                    <div class="hire-buttons">
                                        <div style="margin-top: 10px" id="hire-default{{$item->user_id}}" >  <a   value="{{$item->user_id}}" href="#" class="btn btn-default first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                        <div style="margin-top: 10px; display: none;" id="hire-success{{$item->user_id}}">   <a   value="{{$item->user_id}}" href="#" class="btn btn-success first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                    </div>
                                @endif

                                {{--@if( $conversationsExists[$i] != 1)--}}
                                {{--<a  value="{{$item->user_id}}" class="send-msg btn btn-block" data-toggle="modal" data-target="#sendMsgModal" >Στείλτε μήνυμα</a>--}}
                                {{--@else--}}
                                {{--<a rel="tooltip" title="Έχετε ξεκινήσει συνομιλία"> <img id="after-send" style="width: 25px; height: 25px; margin-top: 10px;" src="https://www.cubi.casa/css/img/icon2_green.png" ></a>--}}
                                {{--@endif--}}


                            @endif

                        </td>
                    @endif
                </tr>
            @endif

        @else
            <input name="post-hire-user-id" type="hidden" id="post-hire-user-id" value="{{$item->user_id}}" />
            <input name="post-hire-project-id" type="hidden" id="post-hire-project-id" value="{{$project['id']}}" />

            <tr id="bid-item-{{$item->user_id}}" style="display:none;" onmouseover="setButton({{$item->user_id}})" onmouseout="resetButton({{$item->user_id}})">
                <td>
                    <div class="media">
                        <a class="thumbnail pull-left" href="#"> <img class="media-object img-responsive" src="http://fashatude.com/static/fashatude/img/user_icon.png" style="width: 72px; height: 72px;"> </a>
                        <div class="media-body">
                            <h4  class="media-heading" onclick="window.open('/profile/{{$item->user_id}}','')"><a href="#" id="name{{$item->user_id}}" >{{ $item->name }}</a> </h4>

                            <?php
                            if($item->rate_quality_of_work != null &&
                                    $item->rate_communication != null &&
                                    $item->$rate_worked_again != null &&
                                    $item->rate_consistent != null){
                                $sum = ($item->rate_quality_of_work +
                                                $item->rate_communication +
                                                $item->$rate_worked_again+
                                                $item->rate_consistent) /4;
                            }else{
                                $sum = 0.0;
                            }

                            ?>

                            {{--<h5 class="media-heading">--}}
                                {{--<input  id="rate{{$item->user_id}}" type="hidden" class="rating" data-readonly value="{{$sum}}"/>--}}
                            {{--</h5>--}}
                            @if($item->user_id == Auth::user()->id)
                                <span>Περιγραφή: </span><span id="des{{Auth::user()->id}}" class="text-success">
                                                                 {{ $item->description}}
                                                        </span>
                            @endif
                        </div>
                    </div>
                </td>

                @if($project['project_type'] == 2)

                    <td class="text-center"><h4>{{$item->amount}}E</h4> σε {{$item->days}} ημέρες
                        @if($project['user_id'] == Auth::user()->id )

                            @if( $freelancer['id'] != null)
                                <div class="hire-buttons" style="display:none;">
                                    <div style="margin-top: 10px" id="hire-default{{$item->user_id}}" >  <a   value="{{$item->user_id}}" href="#" class="btn btn-default first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                    <div style="margin-top: 10px; display: none;" id="hire-success{{$item->user_id}}">   <a   value="{{$item->user_id}}" href="#" class="btn btn-success first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                </div>
                            @else
                                <div class="hire-buttons">
                                    <div style="margin-top: 10px" id="hire-default{{$item->user_id}}" >  <a   value="{{$item->user_id}}" href="#" class="btn btn-default first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                    <div style="margin-top: 10px; display: none;" id="hire-success{{$item->user_id}}">   <a   value="{{$item->user_id}}" href="#" class="btn btn-success first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                </div>
                            @endif
                            {{--@if( $conversationsExists[$i] != 1)--}}
                            {{--<a  value="{{$item->user_id}}" class="send-msg btn btn-block" data-toggle="modal" data-target="#sendMsgModal" >Στείλτε μήνυμα</a>--}}
                            {{--@else--}}
                            {{--<a rel="tooltip" title="Έχετε ξεκινήσει συνομιλία"> <img id="after-send" style="width: 25px; height: 25px; margin-top: 10px;" src="https://www.cubi.casa/css/img/icon2_green.png" ></a>--}}
                            {{--@endif--}}

                        @endif

                    </td>



                @else
                    <td class="text-center"><h4>{{$item->amount_per_hour}}E</h4>{{$item->hours}} ώρες ανά εβδομάδα
                        @if($project['user_id'] == Auth::user()->id)

                            @if( $freelancer['id'] != null)
                                <div class="hire-buttons" style="display:none;">
                                    <div style="margin-top: 10px" id="hire-default{{$item->user_id}}" >  <a   value="{{$item->user_id}}" href="#" class="btn btn-default first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                    <div style="margin-top: 10px; display: none;" id="hire-success{{$item->user_id}}">   <a   value="{{$item->user_id}}" href="#" class="btn btn-success first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                </div>
                            @else
                                <div class="hire-buttons">
                                    <div style="margin-top: 10px" id="hire-default{{$item->user_id}}" >  <a   value="{{$item->user_id}}" href="#" class="btn btn-default first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                    <div style="margin-top: 10px; display: none;" id="hire-success{{$item->user_id}}">   <a   value="{{$item->user_id}}" href="#" class="btn btn-success first-hire-btn" data-toggle="modal" data-target="#hireModal">Προσλάβετε</a></div>
                                </div>
                            @endif






                        @endif

                    </td>
                @endif
            </tr>
        @endif
        <?php $i++; ?>
    @endforeach


    <tr id="added-Offer" style="display: none; background-color: lightgreen;" onmouseover="setBackground(this)">
        <td>
            <div class="media">
                <a class="thumbnail pull-left" href="#"> <img id="added-offer-img" class="media-object img-responsive" src="" style="width: 72px; height: 72px;"> </a>
                <div class="media-body">
                    <h4 class="media-heading" id="username" onclick="window.open('/profile/{{Auth::user()->id}}','')"></h4>



                    {{--<h5 class="media-heading" >--}}
                        {{--<input id="programmatically-rating" type="hidden" class="rating" data-readonly value=""/>--}}
                    {{--</h5>--}}

                    {{--@if($item->user_id == Auth::user()->id)--}}
                    <span>Περιγραφή: </span><span id="des">


                                                </span>
                    {{--@endif--}}

                </div>
            </div></td>


        <td class="text-center" id="moneylabel"></td>


    </tr>

    </tbody>
</table>

