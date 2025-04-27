<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

/**
 *  Class ArticleCategoryController

 *  Controller untuk menangani semua operasi terkait dengan kategori artikel
 */
class ArticleCategoryController extends Controller
{
    /**
     * Menyimpan kategori artikel baru ke database
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        // Validasi input kategori artikel
        $data = $request->validate([
            'name' => 'required|string|max:25',
        ]);

        // Simpan kategori artikel baru ke database
        $articleCategory = ArticleCategory::create($data);

        // Return sebuah json response
        return response()->json([
            'message' => 'Article category created',
            'data' => $articleCategory,
        ], 201);
    }
}
