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
    // public $keyType = 'string';
    /**
     * Get the user associated with the CharityJob
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id','user_id');
    }
    /**
     * Get all of the articles for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'charity_id','user_id');
    }

    /**
     * Get all of the jobs for the Charity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany('App\Models\CharityJob', 'charity_id','user_id');
    }
}
