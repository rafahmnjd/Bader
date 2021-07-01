<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefactor extends Model
{
    //
     protected $guarded = [];

    /**
      * Get all of the fills for the Shortage
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function fills()
     {
         return $this->hasMany('App\Models\Fill', 'user_id');
     }
}
