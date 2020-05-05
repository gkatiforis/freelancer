<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';


    public function project()
    {
        return $this->belongsToMany('App\Project');
    }

    public function skillCategory()
    {
        return $this->belongsTo('App\SkillCategory');
    }


    public function getSign()
    {
        return $this->sign;
    }

    public function getSkill_category_id()
    {
        return $this->skill_category_id();
    }

    public function getId()
    {
        return $this->id;
    }
}
