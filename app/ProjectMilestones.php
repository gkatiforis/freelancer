<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMilestones extends Model
{
    protected $table = 'project_milestones';


    public function getAmount()
    {
        return $this->amount();
    }

    public function getDescription()
    {
        return $this->description();
    }


    public function getAccepted()
    {
        return $this->accepted();
    }



    public function getUser_id()
    {
        return $this->user_id();
    }

}



