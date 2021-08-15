<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    //
     protected $guarded = [];


     /**
      * Get all of the cities for the Governorate
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function cities()
     {
         return $this->hasMany(City::class, 'governorate_id');
     }
}
