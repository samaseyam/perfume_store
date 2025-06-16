<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // علاقة عنصر الطلب مع الطلب (Order)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // علاقة عنصر الطلب مع العطر (Perfume)
    public function perfume()
    {
        return $this->belongsTo(Perfume::class);
    }
}
