<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the charity associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function charity()
    {
        return $this->hasOne('App\Models\Charity', 'user_id', 'id');
    }

    /**
     * Get the Volunteer associated with the Volunteer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Volunteer()
    {
        return $this->hasOne('App\Models\Volunteer', 'user_id', 'id');
    }

    # code...
    /**
     * Get all of the fills for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fills()
    {
        return $this->hasMany(Fill::class, 'user_id');
    }
    /**
     * Get all of the sentMsgs for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentMsgs()
    {
        return $this->hasMany('App\Models\Message', 'user_id');
    }

    public function imagepath()
    {
        if($this->role == 'charity' && $this->charity!=null){
            return config('path.ch_logo') .$this->charity->logo;
        }
        elseif($this->role == 'volunteer' && $this->volunteer!=null){
            return config('path.profile') .$this->volunteer->profile;
        }
        else
            return config('path.default');
        # code...
    }
    // /**
    //  * Get all of the receved Messages for the User
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
    //  */
    // public function recevedMsgs()
    // {

    // }

}
