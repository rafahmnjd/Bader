<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
     protected $guarded = [];
     /**
      * Get the gov that owns the City
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function gov()
     {
         return $this->belongsTo(Governorate::class, 'governorate_id');
     }
}
