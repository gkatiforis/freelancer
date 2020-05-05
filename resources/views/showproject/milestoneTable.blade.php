<?php $display = "display: none;" ?>
@if( $project->status_id == 3)
    <?php $display = "" ?>
@endif

<div class="panel with-nav-tabs panel-default milestonesPanel" style="{{$display}}">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1default" data-toggle="tab">Milestones</a></li>
            <li><a href="#tab3default" data-toggle="tab">Παράδοση Έργου</a></li>
        </ul>
    </div>

    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1default">

                <div id="add-milistone-panel">

                    <div class="panel panel-default">
                        <table class="table table-hover" id="milistone-list">
                            <tbody>
                            @foreach( $milesstone as $item)

                                <tr>
                                    <td>  {{$item->description}}  για  {{$item->amount}} € <br> <span id="fail-accept-{{$item->id}}" style="display:none;" class="text-danger">Μη επαρκές υπόλοιπο </span> </td>
                                    @if($item->user_id == Auth::user()->id)
                                        @if($item->accepted == 1)
                                            <td style="width: 30px;"></td>
                                            <td style="width: 30px;">  <div><img src="https://cdn3.iconfinder.com/data/icons/ose/Tick.png" alt="accept" height="22" width="22"></div></td>
                                        @elseif($item->accepted == 2)
                                            <td style="width: 30px;"></td>
                                            <td  style="width: 30px;" class="reject-milestone" id="reject-milestone-{{$item->id}}" name="{{$item->id}}" >  <div > <img src="https://cdn4.iconfinder.com/data/icons/basic-interface-overcolor/512/cancel-128.png" alt="reject" height="17" width="17"></div></td>
                                        @elseif($item->accepted == 3)
                                            <td style="width: 30px;"></td>
                                            <td style="width: 30px;" id="paid-milestone-{{$item->id}}" style="">  <div  >Πληρωμένο</div></td>

                                        @else
                                            <td style="width: 30px;visibility: hidden;"  id="after-accept-milestone-{{$item->id}}">  <div ><img src="https://cdn3.iconfinder.com/data/icons/ose/Tick.png" alt="accept" height="22" width="22"></div></td>
                                            <td style="width: 30px;" id="wait-accept-milestone-{{$item->id}}" >  <div  id="{{$item->id}}"><img src="https://cdn3.iconfinder.com/data/icons/computer-system-and-data/512/27-512.png" alt="accept" height="22" width="22"></div></td>
                                        @endif

                                    @else

                                        @if($item->accepted == 1)


                                            <td style="width: 30px;">
                                                <span  id="paid-milestone-{{$item->id}}" style="visibility: hidden;">Πληρωμένο</span>
                                                <span class="after-accept-milestone" id="after-accept-milestone-{{$item->id}}" name="{{$item->id}}" style="" ><img src="https://cdn4.iconfinder.com/data/icons/banking/512/22-512.png" alt="accept" height="22" width="22"></span></td>


                                        @elseif($item->accepted == 3)


                                            <td style="width: 30px;" id="paid-milestone-{{$item->id}}" style="">  <span  >Πληρωμένο</sp></td>
                                        @elseif($item->accepted == 2)


                                                <td  style="width: 30px;" class="reject-milestone" id="reject-milestone-{{$item->id}}" name="{{$item->id}}" >  <div> <img src="https://cdn4.iconfinder.com/data/icons/basic-interface-overcolor/512/cancel-128.png" alt="reject" height="17" width="17"></div></td>
                                        @else



                                                <td >
                                                    <span class="reject-milestone" id="reject-milestone-{{$item->id}}" name="{{$item->id}}"> <img src="https://cdn4.iconfinder.com/data/icons/basic-interface-overcolor/512/cancel-128.png" alt="reject" height="17" width="17"></span>
                                                    <span class="before-accept-milestone text-right" id="before-accept-milestone-{{$item->id}}" name="{{$item->id}}" > <img src="https://cdn3.iconfinder.com/data/icons/ose/Tick.png" alt="accept" height="22" width="22"></span>
                                                        <span class="after-accept-milestone" id="after-accept-milestone-{{$item->id}}" name="{{$item->id}}" style="visibility: hidden;" ><img src="https://cdn4.iconfinder.com/data/icons/banking/512/22-512.png" alt="accept" height="22" width="22"></span>
                                                    <span  id="paid-milestone-{{$item->id}}" style="visibility: hidden;">Πληρωμένο</span>
                                                </td>



                                        @endif


                                    @endif

                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <form id="edit-milestone-post-form" class="form-horizontal" >
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                        <input name="postprojectid" type="hidden" value="{{ $project['id'] }}" />
                        <input name="postuserid" type="hidden" value="{{ Auth::user()->id }}" />

                        <input name="postfreelanceridmilistone" type="hidden" value="{{$freelancer['id']}}" />
                        <input name="postprojectuseridmilistone" type="hidden" value="{{$project['user_id']}}" />


                        @if(Auth::user()->id ==  $freelancer['id'] &&  $project_status[0]->status_sign != "ΚΛειστό")
                            <div class="form-group input-group" style=" padding-top: 5px;padding-left: 20px; text-align:right;">
                                <span  class="input-group-addon">Εργασία: </span>
                                <input  style="width: 100%;" type="text" class="form-control"  name="m-des" value="">
                                {{--<span class="input-group-addon">X</span>--}}


                                <span class="input-group-addon" >   για  </span>
                                <input style="width: 30%;"type="text" class="form-control" id="" name="money" value="">
                                {{--<span  class="input-group-addon" >ευρώ</span>--}}
                            </div>

                            <div class="input-group"  style="text-align: right; padding-top: 10px; padding-bottom: 10px;">
                                <button type="submit" class="btn btn-success" id="milistone-add" data-id="post-review-box-1"> <span id="file-add-icon" class="glyphicon glyphicon-plus"></span>Προσθήκη</button>
                            </div>

                        @else

                            @if($project_status[0]->status_sign != "ΚΛειστό")
                                <div class="input-group"  style="text-align: right; padding-top: 10px; padding-bottom: 10px;">
                                    <button class="btn btn-success" id="endproject"> <span id="file-add-icon" class="glyphicon glyphicon-ok"></span>Ολοκλήρωση Έργου</button>
                                </div>
                            @endif
                        @endif


                        <div class="text-danger" id="fail-end" style="display:none;">
                            Πρέπει να πληρώσετε για όλα τα milestone προτού ολοκληρώσει το έργο.
                            </div>


                    <div class="rating-freelancer" style="display:none;">
                    <h4 class="text-success">Το έργο ολοκληρώθηκε επιτυχώς!</h4>
                    <div class="well well-sm rating-freelancer" style="display:none;">

                    <h4>Βαθμολογίστε τον freelancer</h4>

                        <div class="row" id="post-review-box">
                            <div class="col-md-12">

                                    <input id="ratings-hidden" name="rating" type="hidden">

                                    <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="" rows="5"></textarea>

                                    <div class="text-right">
                                        <div  class="stars starrr" data-rating="0"></div>
                                        {{--<a id="ignore-rating">Παράληψη</a>--}}
                                        <button id="rate-freelancer" class="btn btn-success btn-lg" type="submit">Ολοκλήρωση</button>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>

                    </form>
                </div>

            </div>

            <div class="tab-pane fade" id="tab3default">

                <p class="text-left"><h4>Λίστα αρχείων έργου</h4></p>


                <div class="panel panel-default">
                    <table class="table table-hover">
                        <tbody id="file-list">
                        @foreach( $files as $item)
                        <tr onclick="window.location = '{{$item->file_path}}'; return false;" >
                            <td>
                                <div class="media-body">

                                     <h4  class="media-heading"  >{{$item->file_name}}</h4>
                                        <span id="des" class="text-justify"></span>



                                </div>

                            </td>
                            <td class="text-right text-nowrap">
                                {{--<div class="loading" style="text-align: center; display:none;"><img src="http://www.nse.com.ng/_catalogs/masterpage/website/images/circular.gif" alt="Smiley face" height="30" width="30"></div>--}}
                                {{--<button class="btn btn-xs btn-success"> <span class="glyphicon glyphicon-download"></span></button>--}}
                                {{--<button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>--}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <form id="edit-post-form" class="form-horizontal" >
                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                    <input name="postprojectid" type="hidden" value="{{ $project['id'] }}" />
                    <input name="postuserid" type="hidden" value="{{ Auth::user()->id }}" />

                    <div class="form-group" id="textarea-file"  style="display: none;">
                        <div style="position:relative;">
                            <p>Περιγραφή αρχείου</p>
                            <div class="input-group"  style="text-align: right; padding-top: 10px">

                                <textarea class="form-control animated new-review" cols="100" id="new-review" name="file-description" placeholder="" rows="4"></textarea>
                            </div>
                            <div class="input-group"  style="text-align: right; padding-top: 10px">
                                {{--<a  style="margin-right: 5px;" id="file-save-cancel" href="" data-id="post-review-box-1">Παράληψη</a>--}}
                                <button type="submit" class="btn btn-success" id="file-save" data-id="post-review-box-1"> <span id="file-save-go" class="glyphicon"></span>Αποθήκευση</button>
                            </div>
                        </div>
                    </div>
                </form>

                <form data-toggle="validator" role="form" name="file_form">
                    <input name="file-project-id" type="hidden" value="{{$project['id']}}" />

                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                    {{--<div style="position:relative;">--}}
                    {{--<a class='btn btn-success' href='javascript:;'>--}}
                    {{--<span id="edit-post-go" class="glyphicon"></span> <span class="glyphicon glyphicon-plus"></span> Προσθήκη--}}
                    {{--<input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file" size="40">--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group" id="upload-file">
                        <div class="form-group">
                            <div style="position:relative;">
                                <a class='btn btn-primary' href='javascript:;'>
                                    Επιλογή αρχείου...
                                    <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                </a>
                                {{--&nbsp;--}}
                                {{--<span class='label label-info' id="upload-file-info"></span>--}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
