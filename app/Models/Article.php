<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
     protected $guarded = [];

     /**
      * Get the charity that owns the Article
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function charity()
     {
         return $this->belongsTo('App\Models\Charity', 'charity_id');
     }
     /**
      * Get all of the images for the Article
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function images()
     {
         return $this->hasMany('App\Models\Image', 'article_id');
     }
}
