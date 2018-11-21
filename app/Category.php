<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function cameras()
    {
        return $this->belongsToMany('App\Camera');
    }

    protected $fillable = [
        'name', 'created_by'
    ];
}
