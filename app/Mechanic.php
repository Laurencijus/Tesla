<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    //mechaniku sarasas i selecta
    public static function allMechanics()
    {
        return self::orderBy('surname')->orderBy('name')->get(); //arba tiesiog Mechanic::all
    }
    public function ShowTrucks()
    {
        return $this->hasMany('App\Truck', 'mechanic_id', 'id');

    }
}
