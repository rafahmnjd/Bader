<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRequirement extends Model
{
    //
     protected $guarded = [];
     protected $table="shortages";

     /**
      * Get the project that owns the ProjectRequirement
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function project()
     {
         return $this->belongsTo('App\Models\Project', 'project_id');
     }

     /**
      * Get all of the fills for the Shortage
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function fills()
     {
         return $this->hasMany('App\Models\Fill', 'shortage_id')->where('type','projReq');
     }

         public function completedQuantity()
    {
        # code...
        return $this->fills()->where('state', 'completed')->sum('quantity');
    }

    public function rest()
    {
        # code...
        return $this->quantity - $this->completedQuantity();
    }
     public function completePercent()
     { 
         # code...
         
         if($this->state=='closed')
            return 100;
       
        $complete = $this->completedQuantity();
        $all = $this->quantity;
        if($all!=0)
        return $complete*100/$all ;
        else return 0 ;
     }

    public function restPercent()
    {
        # code...
        return 100 - $this->completePercent();
    }
}
