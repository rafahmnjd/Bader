<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
     protected $guarded = [];

     /**
      * Get the user that owns the Item
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function user()
     {
         return $this->belongsTo('App\Models\User', 'created_by');
     }

     /**
      * Get all of the shortages for the Item
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function shortages()
     {
         return $this->hasMany(Shortage::class, 'item_id')->where('type','min');
     }

        /**
      * Get all of the surplus for the Item
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function surplus()
     {
         return $this->hasMany(Shortage::class, 'item_id')->where('type','plus');
     }

     /**
      * Get all of the surplus for the Item
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function projReq()
     {
         return $this->hasMany(Shortage::class, 'item_id')->where('type','proj');
     }
}

