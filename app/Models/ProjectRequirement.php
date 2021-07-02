<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRequirement extends Model
{
    //
     protected $guarded = [];

     /**
      * Get the project that owns the ProjectRequirement
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function project()
     {
         return $this->belongsTo('App\Models\Project', 'project_id');
     }
}
