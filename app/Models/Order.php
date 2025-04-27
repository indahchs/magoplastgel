<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUuids;

    /**
     * Relasi many-to-one dengan tabel 'users'
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi one-to-many dengan tabel 'order_items'
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Relasi one-to-one dengan tabel 'transactions'
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transaction() {
        return $this->hasOne(Transaction::class);
    }
}
