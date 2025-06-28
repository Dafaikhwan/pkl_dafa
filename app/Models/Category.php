<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['name','slug'];

    // Jika relasi ke model lain, misalnya Produk
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('qty','price');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
