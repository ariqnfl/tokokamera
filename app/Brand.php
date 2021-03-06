<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    public function cameras()
    {
        return $this->hasOne('App\Camera','brand_id','id');
    }

    protected $fillable = [
        'name', 'photo', 'created_by'
    ];
}
