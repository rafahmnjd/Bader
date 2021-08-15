<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
     protected $guarded = [];

     /**
      * Get the charity that owns the Activity
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function charity()
     {
         return $this->belongsTo('App\Models\Charity', 'charity_id','user_id');
     }
     /**
      * Get all of the images for the Activity
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function images()
     {
         return $this->hasMany('App\Models\Image', 'article_id');
     }
}
