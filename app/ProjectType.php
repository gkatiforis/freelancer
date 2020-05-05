<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{

    protected $table = 'project_type';


    public function Project()
    {
        return $this->hasMany('App\Project');
    }


    public function getTypr()
    {
        return $this->type();
    }

    public function getId()
    {
        return $this->id;
    }
}
