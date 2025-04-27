<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleCategory
 * 
 * Model untuk tabel 'article_categories'
 */
class ArticleCategory extends Model
{
    use HasFactory, HasUuids;

    /**
     * Atribut yang tidak dapat diisi
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * Relasi one-to-many dengan tabel 'articles'
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
