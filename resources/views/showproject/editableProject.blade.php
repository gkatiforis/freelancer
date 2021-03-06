<h3>{{ $project['title'] }} </h3>
<br>
<p class="text-right" style="font-size: 18px">

   <span class="projectState">

    @if($project_status[0]->status_sign == "Σε αναμονή")
           <button  class="btn btn-primary btn-xs text-center" style="margin-bottom:4px;  height:38px; width: 90px;"><span>{{$project_status[0]->status_sign}}</span><i class="icon-ok" style=" vertical-align: middle;"></i></button>
       @elseif($project_status[0]->status_sign == "Ανοιχτό")
           <button  class="btn btn-success btn-xs text-center" style="margin-bottom:4px;  height:38px; width: 90px;"><span>{{$project_status[0]->status_sign}}</span><i class="icon-ok" style=" vertical-align: middle;"></i></button>
       @elseif($project_status[0]->status_sign == "Σε εξέλιξη")
           <button  class="btn btn-success btn-xs text-center" style="margin-bottom:4px;  height:38px; width: 90px;"><span>{{$project_status[0]->status_sign}}</span><i class="icon-ok" style=" vertical-align: middle;"></i></button>
       @elseif($project_status[0]->status_sign == "ΚΛειστό")
           <button  class="btn btn-success btn-xs text-center" style="margin-bottom:4px;  height:38px; width: 90px;"><span>{{$project_status[0]->status_sign}}</span><i class="icon-ok" style=" vertical-align: middle;"></i></button>

       @endif
</span>

    @if($project['project_type'] == 2)

        {{--<button  class="btn btn-default btn-xs" style="margin-bottom:4px;white-space:normal; max-width: 100px;">Προιπολογισμός {{$project_status[0]->budget}}</button>--}}
    @else
        <button  class="btn btn-default btn-xs" style="margin-bottom:4px;white-space:normal; max-width: 100px;">Προιπολογισμός {{$project['price_per_hour']}}€ / ώρα</button>
    @endif
    {{--<button  class="btn btn-default btn-xs" style="margin-bottom:4px; max-width: 120px;">Μέση προσφορά 650E</button>--}}
    <button  class="btn btn-default btn-xs" style="margin-bottom:4px; max-width: 80px;">Προσφορές {{count($bids)}}</button>
    {{----}}
    {{----}}
    {{--<span style="margin: 2px; width: 5px;" class="label label-info label-as-badge">Προιπολογισμός 650E</span>--}}
    {{--<span style="margin: 2px" class="label label-info label-as-badge">Μέση προσφορά 650E</span>--}}
    {{--<span style="margin: 2px" class="label label-info label-as-badge">Προσφορές 50</span>--}}

</p>
</br>

    <form id="edit-post-form" class="form-horizontal" >
        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <input name="postprojectid" type="hidden" value="{{ $project['id'] }}" />

        <p class="text-justify" >
        <div id="edit-post-text"> {{ $project['description'] }}</div>

        <textarea style="display: none;" id="edit-post-textarea" class="form-control animated new-review" cols="50" id="new-review" name="postdescription" placeholder="" rows="4"></textarea>

        </p>

        <br>
        <p class="text-left">
        <p class="text-warning">Ειδικότητες</p>
        </p>


        <p class="text-primary">
            @foreach($project->skill as $item)
                <span class="label label-default label-as-badge"> {{$item['sign']}}</span>

            @endforeach
        </p>
        <p class="text-left">
        <p class="text-warning" onclick="window.location = '{{$project->filepath}}'">Επισυναπτόμενο αρχείο</p>

        </p>
                <div class="text-right">
                    <a id="edit-post-link" href="#" data-id="post-review-box-1">Επεξεργασία ανάρτησης</a>
                    <a  style="display: none;" id="edit-post-save-cancel" href="#" data-id="post-review-box-1">Άκυρο</a>
                    <button type="submit" style="display: none;" class="btn btn-success" id="edit-post-save" data-id="post-review-box-1"> <span id="edit-post-go" class="glyphicon"></span>Αποθήκευση</button>
                </div>
    </form>