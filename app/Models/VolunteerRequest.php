<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerRequest extends Model
{
    //
     protected $guarded = [];

     /**
      * Get the volunteer that owns the VolunteerRequest
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function volunteer()
     {
         return $this->belongsTo('App\Models\Volunteer', 'volunteer_id');
     }

     /**
      * Get the Job that owns the VolunteerRequest
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function job()
     {
         return $this->belongsTo('App\Models\CharityJob', 'charity_job_id');
     }
}
