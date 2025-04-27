<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory, HasUuids;

    /**
     * Relasi many-to-one dengan tabel 'orders'
     */
    public function order() {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi many-to-one dengan tabel 'products'
     */
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
