<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectBudget extends Model
{
    protected $table = 'project_budget';

    public function getBudget()
    {
        return $this->budget();
    }

    public function getId()
    {
        return $this->id;
    }

    public function project()
    {
        return $this->hasMany('App\Project');
    }

}
