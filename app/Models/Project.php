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

    public function completePercent()
    {
        # code...

        if ($this->state == 'closed') {
            return 100;
        }

        if ($this->requirments()->count() != 0) {
            $perc = 0;
            foreach ($this->requirments as $req) {
                if ($req->state == "closed") {
                    $perc += 100;
                } else {
                    $complete = $req->fills()->where('state', 'completed')->sum('quantity');
                    $all = $req->quantity;
                    $perc += ($complete / $all);}
            }
            $perc = $perc / $this->requirments()->count();
            return $perc;
        } else {
            return 0;
        }

    }

    public function restPercent()
    {
        # code...
        return 100 - $this->completePercent();
    }
}
