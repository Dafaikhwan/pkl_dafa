<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','total_price', 'order_code', 'status'
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke detail pesanan (jika ada)
    public function products()
    {
        return $this->belongsToMany(product::class)->withPivot('qty','price')
        ->withTimestamps();
    }
}
