<div class="modal fade" id="sendMsgModal" tabindex="-1" role="dialog" aria-labelledby="sendMsgModal" aria-hidden="true">
    <div class="modal-dialog">




        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Χ</button>
                <h4 class="modal-title" id="myModalLabel">Αποστολή μηνύματος</h4>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row profile">
                        <div class="col-md-2">
                            <div class="profile-sidebar">
                                <!-- SIDEBAR USERPIC -->
                                <div class="profile-userpic">
                                    <img src="http://designbump.com/wp-content/uploads/2011/04/vector-male-portrait-tutorial-001.jpg" class="img-responsive" alt="">
                                </div>
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name" id="send-modal-username">

                                    </div>
                                    <div class="profile-usertitle-job" id="send-modal-rate">

                                    </div>
                                    <div class="profile-usertitle-job">
                                        web and mobile Developer
                                    </div>
                                </div>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR BUTTONS -->
                                <div class="profile-userbuttons">
                                    <button type="button" class="btn btn-primary">Προβολή προφίλ</button>
                                    {{--<button type="button" class="btn btn-danger btn-sm">Message</button>--}}
                                </div>
                                <!-- END SIDEBAR BUTTONS -->

                            </div>
                        </div>
                        <div class="col-md-4">
                            <input name="post-user-id1" type="hidden" value="{{Auth::user()->id}}" />
                            <input name="post-user-id2" type="hidden" id="post-user-id2" value="" />
                            <div class="profile-content">
                                <p class="text-justify" style="margin-bottom: 30px" >
                                    Ξεκινήστε μία νέα συνομιλία και μάθετε περισσότερες πληροφορίες σχετικά με την προσφορά!
                                </p>
                                <textarea id="hire-textarea" class="form-control" cols="70" name="post-hire-des" placeholder="Μου άρεσες. . . " rows="7"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <br>


            </div>
            <div class="modal-footer">
                <a type="button" class="btn" id="close-send-modal" data-dismiss="modal">κλείσιμο</a>
                <button type="button" class="send-message btn btn-success"> <span id="send-post-go"  data-position="top-left" class="glyphicon"></span>Αποστολή μηνύματος</button>
            </div>
        </div>

    </div>
</div>