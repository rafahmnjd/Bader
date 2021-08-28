<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    //
    protected $guarded = [];

    protected $table = 'charities';

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    /**
     * Get the user associated with the CharityJob
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
    /**
     * Get all of the activities for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany('App\Models\Activity', 'charity_id', 'user_id');
    }

    /**
     * Get all of the jobs for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany('App\Models\CharityJob', 'charity_id', 'user_id');
    }

    /**
     * Get all of the projects for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'charity_id', 'user_id');
    }

    /**
     * Get all of the projReq for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function projReq()
    {
        return $this->hasManyThrough(Shortage::class, Project::class,'charity_id','project_id');
    }
    /**
     * Get all of the activities for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /**
     * Get all of the fills for the Shortage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    /**
     * Get all of the shortages for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shortages()
    {
        return $this->hasMany('App\Models\Shortage', 'charity_id', 'user_id')->where('type', 'min');
    }
    /**
     * Get all of the surpluses for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surpluses()
    {
        return $this->hasMany('App\Models\Shortage', 'charity_id', 'user_id')->where('type', 'plus');
    }
    /**
     * Get the city that owns the CharityJob
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function fills()
    {
        $fill1= $this->hasManyThrough(Shortage::class,Fill::class,'shortage_id','charity_id')->get();
        // dd($this->projReq()->pluck('shortages.id')->toArray());
        $fill2=Fill::whereIn('fills.shortage_id',$this->projReq()->pluck('shortages.id')->toArray())->get();
        // dd($fill1->all(),$fill2->all());
        return array_merge( $fill1->all(),$fill2->all());
        # code...
    }
}
