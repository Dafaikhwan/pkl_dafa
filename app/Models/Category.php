<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['name','slug'];

    // Jika relasi ke model lain, misalnya Produk
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
