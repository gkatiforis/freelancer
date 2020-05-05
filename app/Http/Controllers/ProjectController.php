<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ChatMessages;
use App\Conversation;
use App\Project;
use App\ProjectFiles;
use App\ProjectMilestones;
use App\Rating;
use App\Skill;
use App\User;
use App\Bid;
use View;
use Input;


use App\SkillCategories;
use App\ProjectDuration;
use App\ProjectType;
use App\ProjectBudget;

use Auth;

class ProjectController extends Controller
{


    public  function ratingFreelancer (){

        if (\Request::ajax()) {

            $freelancer_id = Input::get('freelancer_id');
            $comment = Input::get('comment');
            $rating_num= Input::get('rating');

            $rating_temp= new \App\Rating();
            $rating_temp->freelancer_id = $freelancer_id;
            $rating_temp->comment =  $comment;
            $rating_temp->rating =$rating_num;
            $rating_temp->save();

            echo json_encode(array('succ'=>1));

        }
        //View::make('index');
    }

    public  function milistoneAdd ()
    {
        if (\Request::ajax()) {

            $projectid = Input::get('project_id');
            $user_id = Input::get('user_id');
            $des= Input::get('des');
            $money = Input::get('money');


            $milesstone= new ProjectMilestones();
            $milesstone->project_id = $projectid;
            $milesstone->user_id =  $user_id;
            $milesstone->amount =$money;
            $milesstone->description = $des;
            $milesstone->accepted= 0;
            $milesstone->save();

            echo json_encode(array('milesstone'=>$milesstone));
        }

    }


    public  function milistoneReject()
    {
        if (\Request::ajax()) {

            $militoneID = Input::get('milestone_id');

            $militone = ProjectMilestones::where('id', '=', $militoneID);


            $new_militone_data = array("accepted" => 2); // accepted militone

            $militone->update($new_militone_data);

            echo json_encode(array('militone' => $militone));


        }

    }


    public  function milistonePay()
    {
        if (\Request::ajax()) {

            $militoneID = Input::get('milestone_id');

            $militone = ProjectMilestones::where('id', '=', $militoneID);


            $new_militone_data = array("accepted" => 3); // pay militone

            $militone->update($new_militone_data);


            $freelancer_id = Input::get('freelancer_id');

            $freelancer_temp  = \DB::table('users')
                ->where('id','=',$freelancer_id )

                ->first();

            $milesstone_temp  = \DB::table('project_milestones')
                ->where('id','=',$militoneID )

                ->first();


            $freelancer = User::where('id','=',$freelancer_id) ;


            $new_balance_freelancer = array("balance" => $freelancer_temp->balance+$milesstone_temp->amount ); // project  ανοιχτο


            $freelancer->update($new_balance_freelancer);

            $militone->update($new_militone_data);

            echo json_encode(array('militone' => $militone));


        }

    }


    public  function milistoneAccept()
    {
        if (\Request::ajax()) {

            $militoneID = Input::get('milestone_id');

            $militone = ProjectMilestones::where('id', '=', $militoneID);


            $new_militone_data = array("accepted" => 1); // accepted militone





            $project_user_id = Input::get('project_user_id');



            $milesstone_temp  = \DB::table('project_milestones')
                ->where('id','=',$militoneID )

                ->first();








            $user_temp  = \DB::table('users')
                ->where('id','=',$project_user_id )

                ->first();


            $user = User::where('id','=',$project_user_id) ;



            $new_balance_user = array("balance" => $user_temp->balance-$milesstone_temp->amount ); // project  ανοιχτο


            if(($user_temp->balance-$milesstone_temp->amount) >=0) {



                $user->update($new_balance_user);
                $militone->update($new_militone_data);
                echo json_encode(array('militone' => $militone, 'success' => 1));
            }else
                echo json_encode(array('militone'=>$militone, 'success' => 0));
        }

    }



    public  function acceptHire()
    {
        if (\Request::ajax()) {

            $projectid = Input::get('project_id');

            $project = Project::where('id','=',$projectid) ;


            $new_project_data = array("status_id" =>3 ); // project σε εξέλιξη

            $project->update($new_project_data);



            $project_status = \DB::table('project')
                ->where('project.id','=',$projectid )
                ->leftJoin('project_status', 'status_id', '=', 'project_status.id')

                ->get( array(
                    'status_sign',


                ));

            // $bid = Bid::where('project_id','=',$projectid)->where('user_id','=',$project->freelancer_id)  ->get() ;
            echo json_encode(array('project_status'=>$project_status));
        }

    }





    public  function endProject()
    {
        if (\Request::ajax()) {

            $projectid = Input::get('project_id');

            $project = Project::where('id','=',$projectid) ;


            $count = ProjectMilestones::where('accepted', '=', 0)->orWhere('accepted', '=', 1)->where('project_id', '=', $projectid)->count();

            $project_status = \DB::table('project')
                ->where('project.id','=',$projectid )
                ->leftJoin('project_status', 'status_id', '=', 'project_status.id')

                ->get( array(
                    'status_sign',


                ));

            if ($count ==0)
            {
                $new_project_data = array("status_id" =>4 ); // project κλειστό
                $project->update($new_project_data);
                echo json_encode(array('project_status' => $project_status, 'success' => 1));
               //
            }else {

                // $bid = Bid::where('project_id','=',$projectid)->where('user_id','=',$project->freelancer_id)  ->get() ;
                echo json_encode(array('project_status' => $project_status, 'success' => 0));
            }
        }

    }


    public  function refuseHire()
    {
        if (\Request::ajax()) {

            $projectid = Input::get('project_id');

            $project = Project::where('id','=',$projectid) ;


            $new_project_data = array("freelancer_id" => null,"status_id" =>1 ); // project  ανοιχτο

            $project->update($new_project_data);



            $project_status = \DB::table('project')
                ->where('project.id','=',$projectid )
                ->leftJoin('project_status', 'status_id', '=', 'project_status.id')

                ->get( array(
                    'status_sign',

                ));


            echo json_encode(array('project_status'=>$project_status));
        }

    }


    public  function cancelHire()
    {
        if (\Request::ajax()) {

            $projectid = Input::get('project_id');

            $userid = Input::get('user_id');

            $project = Project::where('id','=',$projectid) ;


            $new_project_data = array("freelancer_id" => null ,"status_id" =>1 ); // project  ανοιχτο

            $project->update($new_project_data);



            $project_status = \DB::table('project')
                ->where('project.id','=',$projectid )
                ->leftJoin('project_status', 'status_id', '=', 'project_status.id')

                ->get( array(
                    'status_sign',


                ));


            echo json_encode(array('project_status'=>$project_status, 'user_id'=>$userid));
        }

    }

    public  function hireFreelancer()
    {
        if (\Request::ajax()) {

            $project = Project::where('id','=',Input::get('project_id')) ;


            $new_project_data = array("freelancer_id" => Input::get('user_id'),"status_id" =>2 ); // project σε αναμονή

            $project->update($new_project_data);

            $bid = Bid::where('project_id','=',Input::get('project_id'))->where('user_id','=',Input::get('user_id'))  ->get() ;

            $user = User::find(Input::get('user_id'));


            $project_temp  = \DB::table('project')
                ->where('id','=',Input::get('project_id') )

                ->first();

            $convCount =  Conversation::where('user_one','=',Input::get('user_id'))->where('user_two','=',$project_temp->user_id)->count() ;



            $conv = new Conversation();

            $conv->user_one = Input::get('user_id');
            $conv->user_two = $project_temp->user_id;

            if ($convCount == 0) {

                $conv->save();
            }

//            $msg = new ChatMessages();
//
//            $msg->conversation_id = $conv->id;
//            $msg->sender_id = $conv->user_one;
//            $msg->message = Input::get('message');
//            $msg->read = false;
//            $msg->save();


            echo json_encode(array('user'=>$user, 'bid'=>$bid, 'conversation'=> $conv));
        }

    }


    public  function postProjectFile()
    {
        if(\Request::ajax()) {

            //  if (Input::hasFile('file')) {
            $file = Input::file('file_source');
            $project_id = Input::input('file-project-id');
            $name = $file->getClientOriginalName();
            $file->move(
                base_path() . '/public/projectfiles/', $project_id.'_'.$name
            );

            $project_files= new ProjectFiles();
            $project_files->file_name = $name;
            $project_files->file_path = '/projectfiles/'. $project_id.'_'.$name;
            $project_files->project_id = $project_id;
            $project_files->user_id = \Auth::user()->id;
            $project_files->save();

            echo json_encode(array('success'=> 1,'file_name'=> $name,'file_path'=>$project_files->file_path, 'id'=>$project_files->id ) );
            //  $project->filepath = base_path() . '/public/projectfiles/' . $fileName;
            // $project->save();
            //    }
        }
    }


    public  function fileSave()
    {
        if(\Request::ajax()) {

            //  if (Input::hasFile('file')) {

            $project_id = Input::input('postprojectid');
            $file_description = Input::input('file_description');
            $file_id = Input::input('file_id');


            $pro_file = ProjectFiles::where('id','=',$file_id);

            $new_project_file = array("file_des" => $file_description); // project  ανοιχτο

            $pro_file->update($new_project_file);

//            $file = Input::file('file');
//            $project_id = Input::input('file-project-id');
//            $name = $file->getClientOriginalName();
//            $file->move(
//                base_path() . '/public/projectfiles/', $project_id.'_'.$name
//            );
//
//            $project_files= new ProjectFiles();
//            $project_files->file_name = $name;
//            $project_files->file_path = base_path() . '/public/projectfiles/'. $project_id.'_'.$name;
//            $project_files->project_id = $project_id;
//
//            $project_files->save();

            //  $project->filepath = base_path() . '/public/projectfiles/' . $fileName;
            // $project->save();
            //    };
            echo json_encode(array('pro_file'=> $pro_file));
        }
    }






    public  function getShowProject($projectid,$userid)
    {
        $project = Project::find($projectid);


        $project_status = \DB::table('project')
            ->where('project.id','=',$projectid )
            ->leftJoin('project_status', 'status_id', '=', 'project_status.id')
            ->leftJoin('project_budget', 'project_budget.id', '=', 'project.project_budget')
            ->get( array(
                'status_sign',
                'budget',

            ));

        $user = User::find($project->freelancer_id);

        $exists = \DB::table('bids')
            ->where("project_id", "=",$projectid)
            ->where("user_id", "=",$userid)
            ->count();

        $bids = \DB::table('bids')

            ->leftJoin('users', 'users.id', '=', 'bids.user_id')

            ->where("project_id", "=",$projectid)
            ->get();

        $conversationsExists = array();

        foreach($bids as $bid)
        {


            $results= Conversation::where(function ($query) use ($bid){
                $query->where('user_one', '=', $bid->user_id)
                    ->orWhere('user_two', '=', $bid->user_id);
            })->where(function ($query)  use ($project){
                $query->where('user_one', '=', $project->user_id)
                    ->orWhere('user_two', '=', $project->user_id);
            })->count();

            array_push( $conversationsExists,$results);

        }

        $bid = Bid::where('project_id','=',$projectid)->where('user_id','=',$project->freelancer_id) ->get();
        $milesstone = ProjectMilestones::where('project_id','=',$projectid) ->get();





        $files  = \DB::table('project_files')
            ->where('project_id','=',$projectid )

            ->get( );

        return view('showproject')
            ->with('project', $project)
            ->with('exists', $exists)
            ->with('bids', $bids)
            ->with('project_status',$project_status)
            ->with('freelancer',$user)
            ->with('bid',$bid)
            ->with('milesstone',$milesstone)
            ->with('files',$files)

            ->with('conversationsExists',$conversationsExists);

    }

    public function getSearchProject()
    {

        //$projects =  Project::orderBy('created_at', 'desc')->skip(5)->paginate(10);
        $skills = Skill::all();
        // $projects = \DB::table('project')->orderBy('created_at', 'desc')->skip(5)->take(10)->get();
//        $projects = \DB::table('project')
//            ->where('status', '=', 1)
//
//            ->leftJoin('project_budget', 'project.project_budget', '=', 'project_budget.id')
//            ->leftJoin('project_duration', 'project.project_duration', '=', 'project_duration.id')
//            ->leftJoin('project_type', 'project.project_type', '=', 'project_type.id')
//            ->leftJoin('project_skill', 'project.id', '=', 'project_skill.project_id')
//            ->orderBy('project.created_at', 'desc')
//            ->take(10)
//            ->get(array(
//                'project.id',
//                'title',
//                'description',
//                'category_id',
//                'user_id',
//                'price_per_hour',
//                'type',
//                'duration',
//                'budget',
//                'project.created_at'
//
//            ));
//
//        $skillsOfProjects =  array();
//
//        foreach($projects as $item){
//            $project = Project::find($item->id);
//
//            array_push( $skillsOfProjects,$project->skill);
//        }



//        for($i=0; $i<count($skillsOfProjects);$i++)
//        {
//            $arr = $skillsOfProjects[$i];
//
//            for($j=0; $j<count($arr);$j++)
//            {
//                $arr[$j]['sign'];
//            }
//        }

        return view('searchproject')
            //->with('projects', $projects)
            ->with('skills', $skills);
        // ->with('skillsOfProjects', $skillsOfProjects);
    }


    public function postSearchProject()
    {
        if(\Request::ajax()) {
            $orderby = Input::get('orderbyList');
            $skills = Input::get('searchSkillsList');
            $page = intval( Input::get('page')) -1 ;

            if( !empty( $skills ) )
            {
                $projects = \DB::table('project')
                    ->whereIn('status_id', [1, 2,3])// ανοιχτά και σε αναμονή projects
                    ->leftJoin('project_budget', 'project.project_budget', '=', 'project_budget.id')
                    ->leftJoin('project_duration', 'project.project_duration', '=', 'project_duration.id')
                    ->leftJoin('project_type', 'project.project_type', '=', 'project_type.id')
                    ->leftJoin('project_skill', 'project.id', '=', 'project_skill.project_id')
                    ->whereIn('project_skill.skill_id', $skills)
                    ->distinct()
                    ->orderBy('project.created_at', 'desc')
                    ->skip($page* 10)
                    ->take(10)
                    ->get(array(
                        'project.id',
                        'title',
                        'description',
                        'category_id',
                        'user_id',
                        'price_per_hour',
                        'type',
                        'duration',
                        'budget',
                        'project.created_at'

                    ));

                $numberofProjects = \DB::table('project')
                    ->whereIn('status_id',  [1, 2, 3])// ανοιχτά και σε αναμονή projects
                    ->leftJoin('project_skill', 'project.id', '=', 'project_skill.project_id')
                    ->whereIn('project_skill.skill_id', $skills)
                    ->distinct()
                    ->count('id');
            }
            else {
                $projects = \DB::table('project')
                    ->whereIn('status_id', [1, 2,3])// ανοιχτά και σε αναμονή projects
                    ->leftJoin('project_budget', 'project.project_budget', '=', 'project_budget.id')
                    ->leftJoin('project_duration', 'project.project_duration', '=', 'project_duration.id')
                    ->leftJoin('project_type', 'project.project_type', '=', 'project_type.id')
                    ->leftJoin('project_skill', 'project.id', '=', 'project_skill.project_id')
                    ->distinct()
                    ->skip($page* 10)
                    ->orderBy('project.created_at', 'desc')
                    //   ->skip(6)
                    ->take(10)
                    ->get(array(
                        'project.id',
                        'title',
                        'description',
                        'category_id',
                        'user_id',
                        'price_per_hour',
                        'type',
                        'duration',
                        'budget',
                        'project.created_at'

                    ));

                $numberofProjects = \DB::table('project')
                    ->whereIn('status_id',  [1, 2,3])// ανοιχτά και σε αναμονή projects

                    ->distinct()
                    ->count('id');
            }


            $skillsOfProjects = array();

            foreach ($projects as $item) {
                $project = Project::find($item->id);

                array_push($skillsOfProjects, $project->skill);
            }



//
//            $projects = Project:: orWhereHas ('skill', function($q){
//                $q->where('id', '=',  2);
//
//            })->orWhereHas ('skill', function($q){
//                $q->where('id', '=', 21);
//
//            }) ->get();
            echo json_encode(array('projects'=>$projects,'projectsskills'=>$skillsOfProjects, 'numberofProjects'=>$numberofProjects));
        }

    }

    public function showUserAddProjectForm()
    {
        $skill_categories = SkillCategories::all();
        $project_type = ProjectType::all();
        $project_duration = ProjectDuration::all();
        $project_budget = ProjectBudget::all();
        $skills = Skill::all();


        return view('addproject')
            ->with('skill_categories', $skill_categories)
            ->with('project_type', $project_type)
            ->with('project_budget', $project_budget)
            ->with('project_duration', $project_duration)
            ->with('skills', $skills);
    }


    public function addProject(Request $request, $user_id)
    {
        $project = new Project();

        $project->title = $request->get('projecttitle');
        $project->description = $request->get('projectdes');
        $project->category_id = $request->get('categoryList');
        $skillsList = $request->get('skillsList');

        $project->user_id = $user_id;

        $project->project_type =$request->get('project_type_id');

        if($project->project_type == 1){
            $project->price_per_hour =$request->get('euro');
            $project->project_duration = $request->get('durationList');
        }
        else{
            $project->project_budget = $request->get('budgetList');

        }
        $project->status_id = 1;


        $project->save();

        $project->skill()->attach($skillsList);
        $project->save();

        if (Input::hasFile('file_source')) {
            $file = Input::file('file_source');

            $fileName = $project->id . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                base_path() . '/public/projectfiles/', $fileName
            );

            $project->filepath ='/projectfiles/' . $fileName;
            $project->save();
        }
        return redirect('/showproject/'.$project->id.'/'.$user_id);
    }


    public function addBid()
    {


        if(\Request::ajax()) {
            $bid = new Bid();
            $bid->project_id = Input::get('project_id');
            $bid->user_id =  Input::get('user_id');
            $bid->amount = Input::get('offer');
            $bid->days = Input::get('days');
            $bid->description = Input::get('description');
            $bid->hours = Input::get('hours');
            $bid->amount_per_hour = Input::get('hoursmoney');
            $bid->description = Input::get('description');
            $bid->save();


            $user = User::find( $bid->user_id);

            echo json_encode(array('bid'=>$bid,'user'=>$user));
        }

    }

    public function editBid()
    {


        if(\Request::ajax()) {

            $bid = Bid::where('project_id','=',Input::get('project_id'))
                ->where('user_id','=',Input::get('user_id'));



            $new_bid_data = array("amount" => Input::get('offer'),
                "days" => Input::get('days'),
                "description" => Input::get('description'),
                "hours" => Input::get('hours'),
                "amount_per_hour" => Input::get('hoursmoney'));

            $bid->update($new_bid_data);


            echo json_encode(array("amount" => Input::get('offer'),
                "days" => Input::get('days'),
                "description" => Input::get('description'),
                "hours" => Input::get('hours'),
                "amount_per_hour" => Input::get('hoursmoney')));
        }

    }



    public function editProject()
    {

        if(\Request::ajax()) {

            $project = Project::where('id','=',Input::get('project_id')) ;


            $new_project_data = array("description" => Input::get('description') );

            $project->update($new_project_data);

            echo json_encode(array('description'=>Input::get('description')));
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
