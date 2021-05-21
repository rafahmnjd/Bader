<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharityJob extends Model
{
    //
     protected $guarded = [];
     /**
      * Get the user associated with the CharityJob
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasOne
      */
     public function user()
     {
         return $this->hasOne('App\Models\User', 'foreign_key', 'local_key');
     }
}
