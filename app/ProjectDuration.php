<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDuration extends Model
{
    protected $table = 'project_duration';


    public function Project()
    {
        return $this->hasMany('App\Project');
    }


    public function getDuration()
    {
        return $this->duration();
    }

    public function getId()
    {
        return $this->id;
    }
}
