<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\SkillCategories;

use App\Skill;
use Auth;
use Input;
use App\ChatMessages;
use App\Conversation;

use App\ProjectFiles;
use App\ProjectMilestones;


use View;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $user_id)
    {

    }

    /**./,
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public  function getProfileByUserID($userid)
    {

        $user_id = $userid;

        $userSkills =  User::find($user_id)->skill;

        $user =  User::find($user_id);

        $ratings=   \App\Rating::where('freelancer_id',  '=', $user_id)->get();

        $rating_value=   \App\Rating::where('freelancer_id',  '=', $user_id)->avg('rating');



        // skills
        $skill_categories = \App\SkillCategories::all();

        $user_id =  \Auth::user()->id;


        $skillsByCategory = array();




        $i = 0;
        foreach ($skill_categories as $category)
        {
            $skillsByCategory[$i++] = Skill::where('skill_category_id',  '=', $category->id)->get();
        }



        //-------------

        return View::make('profile')
            ->with('userSkills', $userSkills)
            ->with('user', $user)
            ->with('ratings', $ratings)
            ->with('skill_categories', $skill_categories)
            ->with('userSkills', $userSkills)
            ->with('skillsByCategory', $skillsByCategory)
            ->with('rating_value', $rating_value);

    }


    public function showUserEditSkillsForm()
    {
        $skill_categories = SkillCategories::all();

        $user_id =  Auth::user()->id;


        $skillsByCategory = array();


        $userSkills =  User::find($user_id)->skill;



        $i = 0;
        foreach ($skill_categories as $category)
        {
            $skillsByCategory[$i++] = Skill::where('skill_category_id',  '=', $category->id)->get();
        }

        return view('addskills')
            ->with('skill_categories', $skill_categories)
            ->with('userSkills', $userSkills)
            ->with('skillsByCategory', $skillsByCategory);
    }



    public function updateUserSkills(Request $request, $user_id)
    {

        $user = User::find($user_id);

        // διαγραφή όλων των skills του user
        $user->skill()->detach();

        $selectedList = $request->get('selectedItems');

        foreach($selectedList as $selected){
            $user-> skill()->attach(array($selected));
        }


        return redirect('/profile/'.$user_id);
    }






    public  function saveProfile()
    {
        if(\Request::ajax()) {

            $user_id = \Auth::user()->id;

            $name = Input::get('name');
            $skill_title = Input::get('skill_title');
            $user_desc = Input::get('user_desc');

            $user = User::where('id', '=', $user_id);

            $new_user_data = array("name" => $name,
                "job_title" => $skill_title,
                "user_description" => $user_desc);

            $user->update($new_user_data);

            echo json_encode(array('user'=>$user));

        }

    }

}
