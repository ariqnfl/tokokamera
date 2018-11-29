<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Camera extends Model
{
    use SoftDeletes;

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function brands()
    {
        return $this->belongsTo('App\Brand', 'brand_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    protected $fillable = [
        'name', 'stock', 'price', 'slug', 'photo', 'desc', 'created_by', 'brand_id'
    ];

    public function setSlug($value)
    {
        $this->attributes['slug'] = str_slug($value, '-');
    }
}
