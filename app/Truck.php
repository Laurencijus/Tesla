<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    public function showMechanic()
    {
        return $this->belongsTo('App\Mechanic', 'mechanic_id', 'id');
    }
}
