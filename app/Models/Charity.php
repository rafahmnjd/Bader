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
     * Get all of the articles for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'charity_id', 'user_id');
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
     * Get all of the articles for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /**
     * Get all of the fills for the Shortage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fills()
    {
        return $this->hasMany('App\Models\Fill', 'shortage_id', 'user_id');
    }

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
}
