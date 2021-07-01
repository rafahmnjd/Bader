<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    //
     protected $guarded = [];
     /**
      * Get the user that owns the Volunteer
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function user()
     {
         return $this->belongsTo('App\Models\User', 'user_id');
     }
}
