var currentUser="";
$(document).ready(function()
{




    $('.conv').click(function() {


        var host = window.location.host;


        var convUserId = $('#conv-user-id'+this.id).val();
        $('#conv-user-id').val(convUserId);


        $('#conv-id').val(this.id);

        $('#msg-panel').empty();
        $("#loading").show();
        $.ajax({
            url: 'http://' + host + '/getConversation',
            type: "post",
            dataType: 'JSON',
            data: {
                '_token': $('input[name=_token]').val(),
                'conversation_id':this.id

            },
            success: function (data) {
                var haha = data['messages'];
                var msg;
                $("#loading").hide();



                for(var i = 0; i<haha.length; i++){
                    $currentUser =  haha[i]['name'];
                     msg = " <div class=\"media msg \">"+
                        "<a class=\"pull-left\" href=\"#\"> <img class=\"media-object\" src=\"http://fashatude.com/static/fashatude/img/user_icon.png\" alt=\"64x64\" style=\"width: 32px; height: 32px;\" src=\"\"> </a>" +
                        "<div class=\"media-body\">"+

                        "<h5>" + haha[i]['name'] +"</h5>" +
                        "<small class=\"col-lg-10\"> "+ haha[i]['message'] +" </small> </div> </div>";
//alert(msg);


                   $(msg).hide().appendTo("#msg-panel").fadeIn(500);

                   // $('#msg-panel').append(msg).fadeIn(1000);
                }



            }
        });

    });


   //pullData();
    $('#send-msg-btn').click(function() {
        sendMessage();

    });



    $(document).keyup(function(e) {
        if (e.keyCode == 13){
            sendMessage();

        }

       // else
         //   isTyping();
    });
});

//function pullData()
//{
//    ;
//    //retrieveTypingStatus();
//    setTimeout(retrieveChatMessages(),3000);
//}

setInterval(retrieveChatMessages, 3000);

function retrieveChatMessages() {
    //$.post('http://localhost/retrieveChatMessages', {_token: $('input[name=_token]').val(),username: username}, function(data)
    //{
    //    if (data.length > 0)
    //        $('#chat-window').append('<br><div>'+data+'</div><br>');
    //});


    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/retrieveChatMessages',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'conv_id': $('input[name=conv-id]').val(),
            'user_id': $('input[name=conv-user-id]').val(),
            'user_name': $('input[name=conv-user-name]').val()
        },
        success: function (data) {
            var messages = data['messages']
            //if (data.length > 0) {
          //  $.each(data, function(k, v){
            for(var i = 0; i<messages.length; i++){
                msg = " <div class=\"media msg \">"+
                    "<a class=\"pull-left\" href=\"#\"> <img class=\"media-object\" src=\"http://fashatude.com/static/fashatude/img/user_icon.png\" alt=\"64x64\" style=\"width: 32px; height: 32px;\" src=\"\"> </a>" +
                    "<div class=\"media-body\">"+

                    "<h5>" + $currentUser +"</h5>" +
                    "<small class=\"col-lg-10\"> "+ messages[i]['message'] +" </small> </div> </div>";
//alert(msg);


                $(msg).hide().appendTo("#msg-panel").fadeIn(500);

                // $('#msg-panel').append(msg).fadeIn(1000);
            }


           // });


           // }
        }
    });
}

//function retrieveTypingStatus()
//{
//    $.post('http://localhost/retrieveTypingStatus', {_token: $('input[name=_token]').val(),username: username}, function(username)
//    {
//        if (username.length > 0)
//            $('#typingStatus').html(username+' is typing');
//        else
//            $('#typingStatus').html('');
//    });


    //var host = window.location.host;
    //$.ajax({
    //    url: 'http://' + host + '/retrieveTypingStatus',
    //    type: "post",
    //    dataType: 'JSON',
    //    data: {
    //        '_token': $('input[name=_token]').val(),
    //
    //        'username':username
    //    },
    //    success: function (data) {
    //
    //    }
    //});

//}

function sendMessage()
{
    var text = $('#text').val();


    if (text.length > 0)
    {



        var host = window.location.host;
        $.ajax({
            url: 'http://' + host + '/sendMessage',
            type: "post",
            dataType: 'JSON',
            data: {
                '_token': $('input[name=_token]').val(),
                'text': $('textarea[name=text]').val(),
                'conv_id': $('input[name=conv-id]').val(),
                'user_id': $('input[name=user-id]').val(),
                'user_name': $('input[name=user-name]').val()
            },
            success: function (data) {
               //$('#chat-window').append('<br><div style="text-align: right">'+text+'</div><br>');
              //  $('#text').val('');
               // notTyping();

                var msg = " <div class=\"media msg \">"+
                    "<a class=\"pull-left\" href=\"#\"> <img class=\"media-object\" src=\"http://fashatude.com/static/fashatude/img/user_icon.png\" alt=\"64x64\" style=\"width: 32px; height: 32px;\" src=\"\"> </a>" +
                    "<div class=\"media-body\">"+

                    "<h5> " + $('input[name=user-name]').val()  +" </h5>" +
                    "<small class=\"col-lg-10\"> "+  $('#text').val() +" </small> </div> </div>";
//alert(msg);

                $('#text').val("");


                function scroll(height, ele) {
                    this.stop().animate({ scrollTop: height }, 1000, function () {
                        var dir = height ? "top" : "bottom";
                        $(ele).html("scroll to "+ dir).attr({ id: dir });
                    });
                };
                var wtf = $('#msg-panel');
                var height = wtf[0].scrollHeight;
                scroll.call(wtf, height, this);
                $(msg).hide().appendTo("#msg-panel").fadeIn(500);
            }
        });


    }
}


//function isTyping()
//{
//    //alert('typing');
//       var host = window.location.host;
//    $.ajax({
//        url: 'http://' + host + '/isTyping',
//        type: "post",
//        dataType: 'JSON',
//        data: {
//            '_token': $('input[name=_token]').val(),
//
//            'username':username
//        },
//        success: function (data) {
//
//        }
//    });
//}
//
//function notTyping()
//{
//    var host = window.location.host;
//    $.ajax({
//        url: 'http://' + host + '/notTyping',
//        type: "post",
//        dataType: 'JSON',
//        data: {
//            '_token': $('input[name=_token]').val(),
//
//            'username':username
//        },
//        success: function (data) {
//
//        }
//    });
//}