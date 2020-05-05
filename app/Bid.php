<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    public function getProject_id()
    {
        return $this->project_id();
    }

    public function getUser_id()
    {
        return $this->user_id();
    }
    public function getAmount_per_hour()
    {
        return $this->amount_per_hour();
    }
    public function getAmount()
    {
        return $this->amount();
    }

    public function getHours()
    {
        return $this->hours();
    }

    public function getDays()
    {
        return $this->days();
    }
    public function getDescription()
    {
        return $this->description();
    }

}
