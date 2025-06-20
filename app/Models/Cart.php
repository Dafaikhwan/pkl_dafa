<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $fillable = ['user_id', 'product_id', 'qty'];


    // Relasi ke product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
