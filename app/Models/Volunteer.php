<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    //
     protected $guarded = [];
        public $incrementing = false;
        protected $primaryKey = 'user_id';
     /**
      * Get the user that owns the Volunteer
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function user()
     {
         return $this->belongsTo('App\Models\User', 'user_id');
     }

     /**
      * Get all of the jobRequests for the Volunteer
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function jobRequests()
     {
         return $this->hasMany('App\Models\VolunteerRequest', 'volunteer_id','user_id');
     }
}


