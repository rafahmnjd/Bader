<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shortage extends Model
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
         return $this->hasMany('App\Models\Fill', 'shortage_id');
     }

     /**
      * Get the charity that owns the Shortage
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function charity()
     {
         return $this->belongsTo('App\Models\Charity', 'charity_id','user_id');
     }
}
