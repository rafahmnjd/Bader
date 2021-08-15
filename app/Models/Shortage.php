<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shortage extends Model
{
    //
    protected $guarded = [];

    /**
     * Get all of the fills for the Shortage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fills()
    {
        return $this->hasMany('App\Models\Fill', 'shortage_id')->where('type', 'shotage');
    }

    /**
     * Get the charity that owns the Shortage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function charity()
    {
        return $this->belongsTo('App\Models\Charity', 'charity_id', 'user_id');
    }

    /**
     * Get the item that owns the Shortage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }
    public function completedQuantity()
    {
        # code...
        return $this->fills()->where('state', 'completed')->sum('quantity');
    }

    public function rest()
    {
        # code...
        return $this->quantity -$this->completedQuantity();
    }
    public function completePercent()
    {
        # code...
        if ($this->state == 'closed') {
            return 100;
        }

        $complete = $this->completedQuantity();
        $all = $this->quantity;
        if ($all != 0) {
            return $complete * 100 / $all;
        }
        return 0;
    }

    public function restPercent()
    {
        # code...
        return 100 - $this->completePercent();
    }


}
