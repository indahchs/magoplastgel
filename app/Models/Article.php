<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * 
 * Model untuk tabel 'articles'
 */
class Article extends Model
{
    use HasFactory, HasUuids;

    /**
     * Atribut yang tidak dapat diisi
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * Relasi many-to-one dengan tabel 'users'
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi many-to-one dengan tabel 'article_categories'
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articleCategory() {
        return $this->belongsTo(ArticleCategory::class);
    }

    /**
     * Mengambil artikel tanpa konten
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithoutContent($query) {
        return $query->select('id', 'user_id', 'article_category_id', 'slug', 'title', 'thumbnail', 'status', 'tags', 'deleted_at', 'updated_at', 'created_at');
    }

    /**
     * Mengambil artikel yang tidak di dalam trash
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotInTrash($query) {
        return $query->whereNull('deleted_at');
    }

    /**
     * Mengambil artikel dengan status publish dan tidak di dalam trash
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublish($query) {
        return $query->where('status', 'publish')->whereNull('deleted_at');
    }

    /**
     * Mengambil artikel dengan status draft dan tidak di dalam trash 
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDraft($query) {
        return $query->where('status', 'draft')->whereNull('deleted_at');
    }

    /**
     * Mengambil artikel dengan status pending dan tidak di dalam trash
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query) {
        return $query->where('status', 'pending')->whereNull('deleted_at');
    }

    /**
     * Mengambil artikel yang di dalam trash
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTrash($query) {
        return $query->whereNotNull('deleted_at');
    }

    /**
     * Filter pencarian artikel
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            return $query->where('article_category_id', $kategori);
        });

        $query->when($filters['tag'] ?? false, function ($query, $tag) {
            return $query->where('tags', 'LIKE', "%$tag%");
        });
    }
}
