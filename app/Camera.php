<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Camera extends Model
{
    use SoftDeletes;

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function brands()
    {
        return $this->belongsToMany('App\Brand');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    protected $fillable = [
        'name','stock','price','slug','photo','desc','created_by'
    ];

    public function setSlug($value)
    {
        $this->attributes['slug'] = str_slug($value,'-');
    }
}
