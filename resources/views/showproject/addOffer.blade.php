<div id="addOffer">



                <div class="text-right">
                    <a class="btn btn-success btn-green open-review-box" href="#" data-id="post-review-box-1">Δώστε προσφορά</a>
                </div>
                <div class="row post-review-box" id="post-review-box-1" style="display:none;">
                    <div class="col-md-12">
                        <form role="form" method="POST"  id="add-bid-form" >

                            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                            <input id="project-id" name="project-id" type="hidden" value="{{ $project['id'] }}">
                            <input id="user-id" name="user-id" type="hidden" value="{{Auth::user()->id}}">

                            <div class="input-group"  style="text-align: right; padding-top: 10px">

                                <h4>  Δώστε προφορά </h4>

                            </div>
                            <div class="input-group"  style="text-align: right; padding-top: 10px">
                                Περιγραφή

                            </div>
                            <div class="input-group"  style="text-align: right; padding-top: 10px">
                                <textarea class="form-control animated new-review" cols="100" id="new-review" name="description" placeholder="Γιατί να επιλέξει εσένα ο εργοδότης;" rows="4" required maxlength="250"></textarea>
                            </div>


                            @if($project['project_type'] == 2)

                                <div id="kathorismeno-panel">
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <div class="input-group"  style="text-align: left; padding-top: 15px">

                                                Προσφορά:

                                            </div>

                                            <div class="form-group input-group" style="width: 150px;padding-top: 10px">


                                                {{--<span class="input-group-addon">X</span>--}}
                                                <input class="form-control" id="money"  name="offer" type="number" min="0" step="1" data-bind="value:replyNumber" required>
                                                <span style="width: 55px;" class="input-group-addon">ευρώ</span>
                                            </div>
                                            {{--<div class="input-group"  style="text-align: left; ">--}}

                                                {{--<p class="text-info" id="money-msg">--}}

                                                {{--</p>--}}

                                            {{--</div>--}}
                                        </div>

                                        <div class='col-md-3'>

                                            <div class="input-group"  style="text-align: right; text-align:right; padding-top: 15px">

                                                Παράδωση σε

                                            </div>


                                            <div class="form-group input-group" style="width: 150px; padding-top: 10px; text-align:right;">
                                                {{--<span class="input-group-addon">X</span>--}}
                                                <input type="number" min="0" step="1" data-bind="value:replyNumber" required class="form-control" id="svX" name="days">
                                                <span style="width: 55px;" class="input-group-addon">ημέρες</span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @else
                                <div id="anawra-panel">
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <div class="input-group"  style="text-align: left; padding-top: 15px">

                                                Προσφορά:

                                            </div>

                                            <div class="form-group input-group" style="width: 200px;padding-top: 10px">


                                                {{--<span class="input-group-addon">X</span>--}}
                                                <input type="number" min="0" step="1" data-bind="value:replyNumber" required class="form-control" id="money-per-hour" name="money-per-hour">
                                                <span style="width: 55px;" class="input-group-addon" >ευρώ ανά ώρα</span>
                                            </div>
                                            {{--<div class="input-group"  style="text-align: left; ">--}}

                                                {{--<p class="text-info" id="money-per-hour-msg">--}}

                                                {{--</p>--}}

                                            {{--</div>--}}
                                        </div>

                                        <div class='col-md-3'>

                                            <div class="input-group"  style="text-align: right; text-align:right; padding-top: 15px">

                                                Ώρες

                                            </div>


                                            <div class="form-group input-group" style="width: 200px; padding-top: 10px; text-align:right;">
                                                {{--<span class="input-group-addon">X</span>--}}
                                                <input type="number" min="0" step="1" data-bind="value:replyNumber" required class="form-control" id="svX" name="hours">
                                                <span style="width: 55px;" class="input-group-addon">ανά εβδομάδα</span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endif
                            <div class="text-right">
                                {{--<div id="loading" style=""><img src="https://portal.ehawaii.gov/assets/images/loading.gif" alt="Smiley face" height="30" width="30"></div>--}}
                                <a class="close-review-box" href="#" id="close-review-box" data-id="post-review-box-1" style="display:none; margin-right: 10px;">
                                    κλείσιμο
                                </a>

                                <button class="btn btn-success" type="submit"> <span id="go" class="glyphicon"></span> Δώστε προσφορά</button>


                            </div>

                        </form>
                    </div>
                </div>


</div>