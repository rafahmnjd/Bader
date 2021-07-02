<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
     protected $guarded = [];
    /**
     * Get the charity that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function charity()
    {
        return $this->belongsTo('App\Models\Charity', 'charity_id', 'user_id');
    }

    /**
     * Get all of the requirments for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirments()
    {
        return $this->hasMany('App\Models\ProjectRequirement', 'project_id');
    }
}

