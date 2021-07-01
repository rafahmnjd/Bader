<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fill extends Model
{
    //
     protected $guarded = [];
     /**
      * Get the user that owns the Fill
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function user()
     {
         return $this->belongsTo('App\Models\User', 'user_id');
     }

     /**
      * Get the shortage that owns the Fill
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function shortage()
     {
         return $this->belongsTo('App\Models\Shortage', 'shortage_id');
     }
}
