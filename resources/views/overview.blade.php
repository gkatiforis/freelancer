



<!-- Page Header -->
<div class="row">

    <h3 class="page-header">Προσωπικά Στοιχεία

        @if( Auth::user()->id == $user['id'])

         <div  style="background:cornflowerblue;" id="edit-personal"  class="badge "> <div class="glyphicon glyphicon-edit" > </div></div>

        @endif
    </h3>
    <form id="edit-profile-form" class="form-horizontal" >
        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <input name="postuserid" type="hidden" value="{{ Auth::user()->id }}" />
    <div id="show-personal-panel">
        {{--<h4><b>Κατηφόρης Γιωργος, Java developer</b></h4>--}}
        <p class="text-justify" >
        <div id="user-dis"> {{$user['user_description']}}</div>
        </p>
    </div>

    <div id="edit-personal-panel" style="display:none;">
        <div class="form-group">
            <div class="col-lg-4">
                <input type="text" name="user-name" class="form-control" id="inputName" placeholder="Ονοματεπώνυμο" required>
            </div>
            <div class="col-lg-7">
                <input type="text" name="skill-title" class="form-control" id="inputskill" placeholder="Ειδικότητα" required>

            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-11">
                <textarea name="user-desc" class="form-control" rows="5" id="comment" placeholder="Λίγα λόγια για εσένα"></textarea>
            </div>

            <div class="input-group"  style="text-align: right; padding-top: 10px; padding-bottom: 10px;">
                <button  type="submit" class="btn btn-success" id="save-personal">Αποθήκευση</button>
            </div>

        </div>
    </div>
</form>
</div>




<div class="row">

    <h3 class="page-header">Οι Δεξιότητες μου
        @if( Auth::user()->id == $user['id'])
        <div  style="background:cornflowerblue;" id="editSkills"  class="badge"> <div class="glyphicon glyphicon-edit" > </div></div>
            @endif
    </h3>
    <p class="text-justify" >
        @foreach( $userSkills as $item)
        <span class="label label-as-badge as" style="background:cornflowerblue;"> {{$item->sign}}</span>
        @endforeach
    </p>
</div>

<div class="row">

    <h3 class="page-header">Πρόσφατες Αξιολογήσεις</h3>
<?php $i  = 0;?>
    @foreach( $ratings as $item)
        <?php $i++;?>

        <div class="col-lg-8">


            <div>  <div  class="stars starrr" data-rating="{{$item->rating}}"></div> </div>


            <p class="text-justify" >
            <div id="edit-post-text">  {{$item->comment}}</div>
            </p>

            <br>



        </div>
    @endforeach

</div>
{{--@include('editSkillsModal')--}}
{{--@include('editSkillsModal')--}}