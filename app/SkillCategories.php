<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillCategories extends Model
{

    protected $table = 'skill_categories';

    public function getSign()
    {
        return $this->sign;
    }

    public function getId()
    {
        return $this->id;
    }

    public function Project()
    {
        return $this->hasMany('App\Project');
    }

}
