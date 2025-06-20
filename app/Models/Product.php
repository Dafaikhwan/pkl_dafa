<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['category_id', 'name', 'slug', 'description',
    'image','price','stock'];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->belongsToMany(order::class)->withPivot('qty','price')
        ->withTimestamps();
    }

}
