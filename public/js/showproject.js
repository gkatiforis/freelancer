
$('#file-save-cancel') .click(function() {

    $('#textarea-file').fadeOut(400);
});

$('input[type=file]').change(function(e){
    $in=$(this);



    var file = " <tr id='newfile'>"+
        "<td>"+
        "<div class=\"media-body\">" +
        "<h4  class=\"media-heading\" id=\"new_file_name\" name=\"\">  </h4>"+
        "<span id=\"des\" class=\"text-justify\"></span>"+
        "</div>"+

        "</td>"+
        "<td class=\"text-right text-nowrap\">"+
        "<div id=\"loading\" style=\"text-align: center\"><img src=\"http://www.nse.com.ng/_catalogs/masterpage/website/images/circular.gif\" alt=\"Smiley face\" height=\"30\" width=\"30\"></div>"+
        "<button style=\"display: none;\" class=\"btn btn-xs btn-success\"> <span class=\"glyphicon glyphicon-download\"></span></button>"+
        "<button style=\"display: none;\" class=\"btn btn-xs btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span></button>"+
        "</td>"+
        "</tr>";

    $('#file-list').append(file);
   // $('#upload-file').fadeOut();
   //
    //$('#textarea-file').fadeIn(400);

    var form = document.forms.namedItem("file_form"); // high importance!, here you need change "yourformname" with the name of your form
    var formdata = new FormData(form);


    var host = window.location.host;

    $.ajax({
        url: 'http://' + host + '/postProjectFile',
        type: "post",
        dataType: 'JSON',
        contentType: false, // high importance!
        processData: false, // high importance!
        data: formdata,
        success: function (data) {
            $('#loading').fadeOut();
            $("#newfile").click(function(){  window.location = data["file_path"];  });
            $("#new_file_name").html(data["file_name"]);
            $("#new_file_name").attr("name",data["id"]);

        }
    });

});




$('#file-save').click(function() {


    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/file-save',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'postprojectid': $('input[name=postprojectid]').val(),
            'file_description': $('textarea[name=file-description]').val(),
            'file_id': $(this).attr('name'),
        },
        success: function (data) {
alert($('input[name=postprojectid]').val());
        }

    });

});
$('#ignore-rating').click(function() {

    $(".rating-freelancer").hide(300);
});

$('#rate-freelancer').click(function(e) {
    e.preventDefault();

    var host = window.location.host;

    $(".rating-freelancer").hide(300);
    $.ajax({
        url: 'http://' + host + '/rating-freelancer',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'freelancer_id': $('input[name=postfreelanceridmilistone]').val(),
            'comment': $('textarea[name=comment]').val(),
            'rating': $("#ratings-hidden").val(),


        },
        success: function (data) {
            var host = window.location.host;
            window.location = 'http://' + host + '/home';

        }

    });
});

$('#endproject').click(function(e) {

    e.preventDefault();
    var host = window.location.host;
    

    $.ajax({
        url: 'http://' + host + '/end-project',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'project_id': $('input[name=postprojectid]').val(),


        },
        success: function (data) {

            if(data['success'] == 1){
                $(this).hide();
                $(".rating-freelancer").show(300);
                $('#fail-end').hide();
            }else{

                $('#fail-end').show();
            }

        }

    });
});
$('.reject-milestone').click(function() {

    var btn = $(this);
    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/milistone-reject',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'milestone_id': btn.attr('name'),
            'freelancer_id': $('input[name=postfreelanceridmilistone]').val(),
            'project_user_id':$('input[name=postprojectuseridmilistone]').val(),

        },
        success: function (data) {

                //btn.hide();
                $('#before-accept-milestone-' + btn.attr('name')).hide();
            $('#after-accept-milestone-' + btn.attr('name')).hide();
            $('#fail-accept-' + btn.attr('name')).hide();
        }

    });
});


$('.after-accept-milestone').click(function() {
    var btn = $(this);
    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/milistone-pay',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'milestone_id': btn.attr('name'),
            'freelancer_id': $('input[name=postfreelanceridmilistone]').val(),
            'project_user_id':$('input[name=postprojectuseridmilistone]').val(),

        },
        success: function (data) {


                btn.css('visibility', 'hidden');
                $('#paid-milestone-' + btn.attr('name')).css('visibility', 'visible');


        }

    });
});

$('.before-accept-milestone').click(function() {

    var btn = $(this);
    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/milistone-accept',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'milestone_id': btn.attr('name'),
            'freelancer_id': $('input[name=postfreelanceridmilistone]').val(),
            'project_user_id':$('input[name=postprojectuseridmilistone]').val(),

        },
        success: function (data) {
            if(data['success'] == 1){
                btn.hide();
                $('#after-accept-milestone-' + btn.attr('name')).css('visibility', 'visible');
                $('#reject-milestone-' + btn.attr('name')).hide();
                $('#before-accept-milestone-' + btn.attr('name')).hide();

                $('#fail-accept-' + btn.attr('name')).hide();
            }else{

                $('#fail-accept-' + btn.attr('name')).css('visibility', 'visible');
                $('#fail-accept-' + btn.attr('name')).show();
            }
        }

    });
});


$('#milistone-add').click(function(e) {
      e.preventDefault();
    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/milistone-add',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id': $('input[name=postuserid]').val(),
            'project_id': $('input[name=postprojectid]').val(),
            'des': $('input[name=m-des]').val(),
            'money': $('input[name=money]').val()
        },
        success: function (data) {
            var mySecondDiv="<tr><td> " + $('input[name=m-des]').val() + " για " + $('input[name=money]').val()  + "€</td> " +
                "  <td style='width: 30px;'> </td>    <td style='width: 30px;'>  <div class='wait-accept-milestone'><img src='https://cdn3.iconfinder.com/data/icons/computer-system-and-data/512/27-512.png' alt='accept' height='22' width='22'></div></td>" +

                "</tr>";

            $("#milistone-list  tbody").append(mySecondDiv);
            $('input[name=m-des]').val("");
            $('input[name=money]').val("");
        }

    });
});

$('#accept-hire').click(function() {
    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/accept-hire',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id': $('input[name=post-freelancer-user-id]').val(),
            'project_id': $('input[name=post-freelancer-project-id]').val()
        },
        success: function (data) {
            var user = data;
            $('.projectState').html('<button  class="btn btn-primary btn-xs text-center" style="margin-bottom:4px;  height:38px; width: 90px;"><span>Σε εξέλιξη</span><i class="icon-ok" style=" vertical-align: middle;"></i></button>');
            $('.accept-or-reject').fadeOut(200);
            $('.milestonesPanel').fadeIn(500);
        }

    });
});
$('#refuse-hire').click(function() {

    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/refuse-hire',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id': $('input[name=post-freelancer-user-id]').val(),
            'project_id': $('input[name=post-freelancer-project-id]').val()
        },
        success: function (data) {
            var user = data;
            var userId = $('input[name=post-freelancer-user-id]').val();
            $('.projectState').html('<button  class="btn btn-success btn-xs text-center" style="margin-bottom:4px;  height:38px; width: 90px;"><span>Ανοιχτό</span><i class="icon-ok" style=" vertical-align: middle;"></i></button>');
            $('.accept-or-reject').fadeOut(200);
            $('#show-hired-offer').fadeOut(500);
            $('#bid-item-' + userId).fadeIn(1000);
        }

    });
});
$('#cancel-hire').click(function() {
    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/cancel-hire',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id': $('input[name=post-hire-user-id]').val(),
            'project_id': $('input[name=post-hire-project-id]').val()
        },
        success: function (data) {
            var user = data;

            $('#show-hired-offer').fadeOut(500);
            /// $('.cancel-hire-btn').fadeOut(500);
            $('#bid-item-' + user['user_id']).fadeIn(1000);
            $(".hire-buttons").fadeIn(500);
            $('.projectState').html('<button  class="btn btn-success btn-xs text-center" style="margin-bottom:4px;  height:38px; width: 90px;"><span>Ανοιχτό</span><i class="icon-ok" style=" vertical-align: middle;"></i></button>');
            //$('#edit-offer-go').show();
        }

    });

});

function cancelBid(){

    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/cancel-hire',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id': $('input[name=post-hire-user-id]').val(),
            'project_id': $('input[name=post-hire-project-id]').val()
        },
        success: function (data) {
            var user = data;

            $('#show-hired-offer').fadeOut(500);
            //$('.cancel-hire-btn').fadeOut(500);
            $('#bid-item-' + userId).fadeIn(1000);
            $(".hire-buttons").fadeIn(500);
        }

    });

}
$('#last-hire-post-go').click(function() {


    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/hire',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id': $('input[name=post-hire-user-id]').val(),
            'project_id': $('input[name=post-hire-project-id]').val()
        },
        success: function (data) {
            //var user = data;

            $('.projectState').html("<button  class=\"btn btn-primary btn-xs text-center\" style=\"margin-bottom:4px;  height:38px; width: 90px;\"><span>Σε αναμονή</span><i class=\"icon-ok\" style=\" vertical-align: middle;\"></i></button>");
            var bid=data['bid'];
            var user=data['user'];

            document.getElementById("close-hire-modal").click();
            $(".hire-buttons").hide();

            //$("#go").removeClass("glyphicon-refresh glyphicon-refresh-animate");
            //  $("#addOffer").hide();
            //$("#addOffer").html("");

            //   $('#editOffer').show();
            $("#hired-icon").html("<img src=\"http://fashatude.com/static/fashatude/img/user_icon.png\" class=\"img-responsive\" style=\"width: 72px; height: 72px;\">");

            $("#hired-name").html("<a href=\"#\">"+ user['name'] +"</a>");
           // $('#hired-rate').rating('rate',5);////////////////////////////////////////////////// to do////
            $("#hired-offer-des").html(bid[0]['description']);

            if( bid[0]['amount'] != null){
                $("#cancel-labels").html("");

                $("#cancel-labels").prepend("<h4> "+bid[0]['amount'] +"E</h4> σε "+  bid[0]['days'] +" ημέρες" +
                    " " +
                    " " +
                    "");
                $("#cancel-hire").html("");
                $("#cancel-hire").prepend("" +
                    " " +
                    " <a  value=\"\"  class=\"btn btn-default\" >Ακύρωση επιλογής</a>" +
                    "");

            }else{
                $("#cancel-labels").html("");
                $("#cancel-labels").prepend("<h4>"+ bid[0]['amount_per_hour'] +"E</h4> " + bid[0]['hours'] +" ώρες ανά εβδομάδα");

                    $("#cancel-hire").html("");
                $("#cancel-hire").prepend("" +
                    " " +
                    " <a  value=\"\"  class=\"btn btn-default\" >Ακύρωση επιλογής</a>" +
                    "");
            }


            $("#hired-img").attr("src", user['image_url']);


//                            document.getElementById("des-bot").innerHTML =  ;
//                            document.getElementById("hours-bot").value =  bid['hours'];
//                            document.getElementById("days-bot").value =  bid['days'];
//                            document.getElementById("money-bot").value =  bid['amount'];
//                            document.getElementById("money-per-hour-bot").value =  bid[''];




            $('#show-hired-offer').fadeIn(1000);
            $('#bid-item-' + bid[0]['user_id']).fadeOut(1000);


            $('html, body').animate({
                scrollTop: $("#show-hired-offer").offset().top
            }, 600);


        }

    });


});





$('.first-hire-btn').click(function() {
    var itemUserId = $(this).attr("value");

    var username = document.getElementById("name"+itemUserId).innerHTML;
    // var rating = document.getElementById().rating();
    var rate = $('#rate'+itemUserId).val();

    document.getElementById("hire-model-username").innerHTML = username;

    $('#hire-model-rate').rating('rate', rate);
    $('#post-hire-user-id').val(itemUserId);



});

$('.send-msg').click(function() {
    var itemUserId = $(this).attr("value");

    var username = document.getElementById("name"+itemUserId).innerHTML;
    // var rating = document.getElementById().rating();
    var rate = $('#rate'+itemUserId).val();

    document.getElementById("send-modal-username").innerHTML = username;

    $('#send-modal-rate').rating('rate', rate);
    $('#post-user-id2').val(itemUserId);

});

$('.send-message').click(function() {
    $("#send-post-go").addClass("glyphicon-refresh glyphicon-refresh-animate");
    var host = window.location.host;
    $.ajax({
        url: 'http://' + host + '/sendHireMessage',
        type: "post",
        dataType: 'JSON',
        data: {
            '_token': $('input[name=_token]').val(),
            'user-two':$('input[name=post-user-id1]').val(),
            'user-one':$('input[name=post-user-id2]').val(),
            'message':$('textarea[name=post-hire-des]').val()
        },
        success: function (data) {
//                        if (data.length > 0)
//                            $('#chat-window').append('<br><div>'+data+'</div><br>');


            $("#send-post-go").removeClass("glyphicon-refresh glyphicon-refresh-animate");

            document.getElementById("close-send-modal").click();
            $("#before-send").hide();
            $("#after-send").show(200);
        }
    });

});




function setBackground(element){

    element.style.backgroundColor="transparent";
}
function setButton(id){
    /// $(".btn .btn .btn-default").removeClass(".btn-default");
    $("#hire-default"+id).hide();
    $("#hire-success"+id).show();

}

function resetButton(id){
    /// $(".btn .btn .btn-default").removeClass(".btn-default");
    $("#hire-default"+id).show();
    $("#hire-success"+id).hide();

}
$(document).ready(function(){


    $( '#edit-post-form' ).on( 'submit', function(e) {
        e.preventDefault();

        $("a#edit-post-save-cancel").hide();
        $("#edit-post-go").addClass("glyphicon-refresh glyphicon-refresh-animate");


        var host = window.location.host;
        $.ajax({
            url: 'http://' + host + '/editproject',
            type: "post",
            dataType: 'JSON',
            data: {
                '_token': $('input[name=_token]').val(),
                'description': $('textarea[name=postdescription]').val(),
                'project_id': $('input[name=postprojectid]').val()
            },
            success: function (data) {
                var description=data['description'];
                $("#edit-post-go").removeClass("glyphicon-refresh glyphicon-refresh-animate");
                $('#edit-post-text').show(100);
                $('#edit-post-textarea').hide();
                $("#edit-post-save").hide();
                $("#edit-post-link").show(500);

                $('#edit-post-text').empty();
                $('#edit-post-text').append(description);
            }
        });
    });




    $( '#add-bid-form' ).on( 'submit', function(e) {
        e.preventDefault();

        $("#go").addClass("glyphicon-refresh glyphicon-refresh-animate");

        var host = window.location.host;
        $.ajax({
            url: 'http://'+host+'/addbid',
            type: "post",
            dataType: 'JSON',
            data: {'_token': $('input[name=_token]').val(),
                'offer': $('input[name=offer]').val(),
                'description': $('textarea[name=description]').val(),
                'days': $('input[name=days]').val(),
                'hours': $('input[name=hours]').val(),
                'hoursmoney': $('input[name=money-per-hour]').val(),
                'project_id': $('input[name=project-id]').val(),
                'user_id': $('input[name=user-id]').val()

            },
            success: function (data) {
                var bid=data['bid'];
                var user=data['user'];


                $("#go").removeClass("glyphicon-refresh glyphicon-refresh-animate");
                //  $("#addOffer").hide();
                $("#addOffer").html("");

                //   $('#editOffer').show();
                $("#username").html("<a href=\"#\">"+ user['name'] +"</a>");
                $('#programmatically-rating').rating('rate',5);////////////////////////////////////////////////// to do////
                $("#des").html(bid['description']);

                if( bid['amount'] != null){
                    $("#moneylabel").html("<h4> "+bid['amount'] +"E</h4> σε "+  bid['days'] +" ημέρες");

                }else{
                    $("#moneylabel").html("<h4>"+ bid['amount_per_hour'] +"E</h4> " + bid['hours'] +" ώρες ανά εβδομάδα");
                }


                $("#added-offer-img").attr("src", 'http://fashatude.com/static/fashatude/img/user_icon.png');


//                            document.getElementById("des-bot").innerHTML =  ;
//                            document.getElementById("hours-bot").value =  bid['hours'];
//                            document.getElementById("days-bot").value =  bid['days'];
//                            document.getElementById("money-bot").value =  bid['amount'];
//                            document.getElementById("money-per-hour-bot").value =  bid[''];


                $("#des-bot").val(bid['description']);
                $("#hours-bot").val(bid['hours']);
                $("#days-bot").val(bid['days']);
                $("#money-bot").val(bid['amount']);
                $("#money-per-hour-bot").val(bid['amount_per_hour']);
                $("#no-offers").empty();



                $('#added-Offer').show(1000);
                $('#edit-offer-bot').show(900);


                $('html, body').animate({
                    scrollTop: $("#added-Offer").offset().top
                }, 600);

            }
        });
    });




    //  $('#example').toolght'});
    $('#money').on(' keyup ', function (e) {
        // Handle e.type
        var money = this.value;

        if(money == ""){
            document.getElementById("money-msg").innerHTML = "";
            return;
        }
        var pososto = 5;

        //alert(money);
        var moneyafter = pososto/100*money;
        var usermoney = money - moneyafter;
        document.getElementById("money-msg").innerHTML = "Πληρωτέο σε εσάς: " + usermoney + "E " +
            "  <i class='glyphicon glyphicon-info-sign'  id=\"example5\" rel=\"popover\"> </i> ";
        $("#example5").popover({title: 'Φόρος', content: " Ένα ποσοστό " + pososto + "% πάει σε εμάς."});
//            $("#example2").popover({title: 'Twitter Bootstrap Popover', content: " Ένα ποσοστό " + pososto + "% πάει σε εμάς."});
//                   "oltip\" ε εμάς. \" id=\"example\"> </i>"+"";


    });

    $('#money-per-hour').on(' keyup ', function (e) {
        // Handle e.type
        var money = this.value;

        if(money == ""){
            document.getElementById("money-per-hour-msg").innerHTML = "";
            return;
        }
        var pososto = 1;

        //alert(money);
        var moneyafter = pososto/100*money;
        var usermoney = money - moneyafter;
        document.getElementById("money-per-hour-msg").innerHTML = "Πληρωτέο σε εσάς: " + usermoney + "E " +
            "  <i class='glyphicon glyphicon-info-sign'  id=\"example5\" rel=\"popover\"> </i> ";
        $("#example5").popover({title: 'Φόρος', content: " Ένα ποσοστό " + pososto + "% πάει σε εμάς."});
//            $("#example2").popover({title: 'Twitter Bootstrap Popover', content: " Ένα ποσοστό " + pososto + "% πάει σε εμάς."});
//                   "oltip\" ε εμάς. \" id=\"example\"> </i>"+"";


    });



});




$('a#edit-post-link').click(function(){

    document.getElementById('edit-post-textarea').innerHTML = document.getElementById('edit-post-text').innerHTML.trim();
    $('a#edit-post-link').hide();
    $('a#edit-post-save-cancel').show();
    $('#edit-post-save').show();
    $('#edit-post-text').hide();
    $('#edit-post-textarea').show(100);

    return false;
});


$('a#edit-post-save-cancel').click(function(){
    $('#edit-post-save').hide();
    $('#edit-post-textarea').hide();
    $('a#edit-post-save-cancel').hide();
    $('a#edit-post-link').show();
    $('#edit-post-text').show();

    return false;
});


$(function () {
    $('input.check').on('change', function () {
        alert('Rating: ' + $(this).val());
    });
    $('#programmatically-set').click(function () {
        $('#programmatically-rating').rating('rate', $('#programmatically-value').val());
    });
    $('#programmatically-get').click(function () {
        alert($('#programmatically-rating').rating('rate'));
    });
    $('.rating-tooltip').rating({
        extendSymbol: function (rate) {
            $(this).tooltip({
                container: 'body',
                placement: 'bottom',
                title: 'Rate ' + rate
            });
        }
    });
    $('.rating-tooltip-manual').rating({
        extendSymbol: function () {
            var title;
            $(this).tooltip({
                container: 'body',
                placement: 'bottom',
                trigger: 'manual',
                title: function () {
                    return title;
                }
            });
            $(this).on('rating.rateenter', function (e, rate) {
                    title = rate;
                    $(this).tooltip('show');
                })
                .on('rating.rateleave', function () {
                    $(this).tooltip('hide');
                });
        }
    });
    $('.rating').each(function () {
        $('<span class="label label-default"></span>')
            .text($(this).val() || ' ')
            .insertAfter(this);
    });
    $('.rating').on('change', function () {
        $(this).next('.label').text($(this).val());
    });
});

















(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

    $('#new-review').autosize({append: "\n"});

    //var reviewBox = $('.post-review-box');
    //var newReview = $('.new-review');
    var openReviewBtn = $('.open-review-box');
    var closeReviewBtn = $('.close-review-box');
    var ratingsField = $('#ratings-hidden');

    openReviewBtn.click(function(e)
    {
        // Get the data from the data-X attribute in the HTML so we know which box
        // box to expand
        e.preventDefault();
        $('#edit-panel').show();
        var linkId = $(this).data("id");
        console.log('-> ID', linkId);
        // Get a handle on the element to expand
        var formBox = $('#'+linkId);
        console.log('-> Form', formBox);
        // Find the close button inside
        var closeReviewBtn = formBox.find('.close-review-box');
        // Find the open review button inside
        var openReviewBtn = $(this);
        // Slide the from box down
        formBox.slideDown(400, function()
        {
            var reviewField = $('.new-review');
            reviewField.trigger('autosize.resize');
            reviewField.focus();
        });
        // Fadeout the review button
        openReviewBtn.fadeOut(100);
        // Show the close button
        closeReviewBtn.show();
    });

    closeReviewBtn.click(function(e)
    {
        e.preventDefault();
        // Get the data from the data-X attribute in the HTML so we know which box
        // box to expand

        var linkId = $(this).data("id");
        // Get a handle on the element to expand
        var formBox = $('#'+linkId);
        // Find the open review button inside
        var closeReviewBtn = formBox.find('.close-review-box');

        formBox.slideUp(300, function()
        {
            var reviewField = $('.new-review');
            reviewField.trigger('autosize.resize');
            reviewField.focus();
            openReviewBtn.fadeIn(400);
        });
        closeReviewBtn.hide();
        $('#edit-panel').fadeOut(200);
    });

    $('.starrr').on('starrr:change', function(e, value){
        ratingsField.val(value);
    });
});


(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

    $('#new-review').autosize({append: "\n"});

    var reviewBox = $('#post-review-box');
    var newReview = $('#new-review');
    var openReviewBtn = $('#open-review-box');
    var closeReviewBtn = $('#close-review-box');


    openReviewBtn.click(function(e)
    {
        reviewBox.slideDown(400, function()
        {
            $('#new-review').trigger('autosize.resize');
            newReview.focus();
        });
        openReviewBtn.fadeOut(100);
        closeReviewBtn.show();
    });

    closeReviewBtn.click(function(e)
    {
        e.preventDefault();
        reviewBox.slideUp(300, function()
        {
            newReview.focus();
            openReviewBtn.fadeIn(200);
        });
        closeReviewBtn.hide();

    });

    $('.starrr').on('starrr:change', function(e, value){
          $('#ratings-hidden').val(value);
    });
});