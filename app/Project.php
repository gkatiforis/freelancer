<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';


    public function bid()
    {
        return $this->hasMany('App\Bid');
    }

    public function skill()
{
    return $this->belongsToMany('App\Skill');
}
    public function projectStatus()
    {
        return $this->belongsTo('App\ProjectStatus');
    }



    public function getTitle()
    {
        return $this->title();
    }

    public function getDescription()
    {
        return $this->description();
    }
    public function getCategory_id()
    {
        return $this->category_id();
    }
    public function getUser_id()
    {
        return $this->user_id();
    }

    public function getPrice_per_hour()
    {
        return $this->price_per_hour();
    }

    public function getProject_duration()
    {
        return $this->project_duration();
    }
    public function getProject_budget()
    {
        return $this->project_budget();
    }
    public function getProject_type()
    {
        return $this->project_type();
    }

    public function getFilePath()
    {
        return $this->filepath();
    }
    public function getStatus_id()
    {
        return $this->status_id();
    }

    public function getId()
    {
        return $this->id;
    }


}
