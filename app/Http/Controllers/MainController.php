<?php
/**
 * Created by PhpStorm.
 * User: George
 * Date: 16/8/2015
 * Time: 3:57 ��
 */

namespace App\Http\Controllers;
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



class MainController extends  Controller
{

    public function getWelcome()
    {

        return View::make('index');
    }

    public function getHome()
    {
        return View::make('home');
    }
















}