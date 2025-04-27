<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasUuids;

    /**
     * Atribut yang tidak dapat diisi
     */
    protected $guarded = [

    ];

    /**
     * Relasi one-to-many dengan tabel 'product_images'
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImages() {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Filter pencarian produk
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        });
    }
}
