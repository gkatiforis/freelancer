<div class="modal fade" id="hireModal" tabindex="-1" role="dialog" aria-labelledby="hireModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Χ</button>
                <h4 class="modal-title" id="myModalLabel">Προσλάβετε</h4>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row profile">
                        <div class="col-md-2">
                            <div class="profile-sidebar">
                                <!-- SIDEBAR USERPIC -->
                                <div class="profile-userpic">
                                    <img src="http://fashatude.com/static/fashatude/img/user_icon.png" class="img-responsive" alt="">
                                </div>
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name" id="hire-model-username">

                                    </div>
                                    {{--<div class="profile-usertitle-job" id="hire-model-rate">--}}

                                    {{--</div>--}}
                                    {{--<div class="profile-usertitle-job">--}}


                                    {{--</div>--}}
                                </div>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR BUTTONS -->
                                {{--<div class="profile-userbuttons">--}}
                                    {{--<button type="button" class="btn btn-primary">Προβολή προφίλ</button>--}}
                                    {{--<button type="button" class="btn btn-danger btn-sm">Message</button>--}}
                                {{--</div>--}}
                                <!-- END SIDEBAR BUTTONS -->

                            </div>
                        </div>
                        <div class="col-md-4">


                            <input name="post-hire-user-id" type="hidden" id="post-hire-user-id" value="" />
                            <input name="post-hire-project-id" type="hidden" id="post-hire-project-id" value="{{$project['id']}}" />

                            <p class="text-justify" style="margin-bottom: 30px" >
                                Είστε σίγουρος ότι θέλετε να προσλάβετε;

                            </p>

                        </div>
                    </div>
                </div>

                <br>
                <br>


            </div>
            <div class="modal-footer">
                <a type="button" class="btn" id="close-hire-modal" data-dismiss="modal">κλείσιμο</a>
                <button id="last-hire-post-go" type="button" class="btn btn-success"> <span  class="glyphicon"></span>Προσέλαβε</button>
            </div>
        </div>
    </div>
</div>