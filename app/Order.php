<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cameras()
    {
        return $this->belongsToMany('App\Camera')->withPivot('qty');
    }

    public function getTotalQtyAttribute()
    {
        $total_qty = 0;
        foreach ($this->cameras as $camera) {
            $total_qty += $camera->pivot->qty;
        }
        return $total_qty;
    }
}
