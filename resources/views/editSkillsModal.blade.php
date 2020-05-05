<div class="modal fade" id="editSkillsModal" tabindex="-1" role="dialog" aria-labelledby="sendMsgModal" aria-hidden="true">
    <div class="modal-dialog">




        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Χ</button>
                <h4 class="modal-title" id="myModalLabel">Αποστολή μηνύματος</h4>
            </div>
            <div class="modal-body">

                @include('addskills')

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