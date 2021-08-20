<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharityJob extends Model
{
    //
    protected $guarded = [];
    /**
     * Get the charity that owns the CharityJob
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function charity()
    {
        return $this->belongsTo('App\Models\Charity', 'charity_id','user_id');
    }

         /**
      * Get all of the jobRequests for the CharityJob
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function jobRequests()
     {
         return $this->hasMany('App\Models\VolunteerRequest', 'charity_job_id');
     }

     

}
