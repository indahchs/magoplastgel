<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 *  Class ArticleController

 *  Controller untuk menangani semua operasi terkait dengan artikel
 */
class ArticleController extends Controller
{
    /**
     * Menyimpan artikel baru pada database
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        // Validasi input artikel
        $data = $request->validate([
            'title' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'body' => 'required|string',
            'status' => 'required|in:publish,draft,pending',
            'tags' => 'required|string',
            'article_category_id' => 'required|exists:article_categories,id',
        ]);

        // Menyimpan file thumbnail artikel
        if($request->file('thumbnail')){
            $data['thumbnail'] = $request->file('thumbnail')->store('content', 'public');
        }

        // Menyimpan id user yang login untuk foreign key 'user_id'
        $data['user_id'] = auth()->user()->id;

        // Membuat slug dari judul artikel
        $slug = Str::slug($data['title']);

        // Validasi jika slug sudah digunakan atau tidak
        if(Article::where('slug', $slug)->count()) {
            // Jika slug sudah terdaftar tambahkan "-2" untuk menghindari duplikasi
            $slug .= "-2";
        }

        // Simpan slug
        $data['slug'] = $slug;

        // Menyimpan artikel baru ke database
        $article = Article::create($data);

        // Flash tost
        $request->session()->flash('success', 'Berhasil menambahkan artikel!');

        // Redirect ke halaman daftar artikel
        return redirect('/artikel/daftar-artikel');

    }

    /**
     * Menampilkan halaman form untuk membuat artikel baru
     *
     * @return \Illuminate\View\View
     */
    public function createIndex() {
        // Mengembalikan view dengan data kategori artikel
        return view('pages.admin.article.article-create-update', [
            'type_menu' => 'article',
            'categories' => ArticleCategory::all()
        ]);
    }

    /**
     * Menampilkan daftar artikel
     *
     * @return \Illuminate\View\View
     */
    public function list() {
        // Mentur jumlah data per halaman
        $num_data = 8;

        // Mendapatkan nilai parameter search
        $search = request('search');

        // Mengembalikan view dengan artikel perkategori
        return view('pages.admin.article.article-list', [
            'type_menu' => 'article',
            'articles' => Article::filter(request(['search']))->latest()->withoutContent()->notInTrash()->paginate($num_data)->appends(['search' => $search]),
            'pending' => Article::filter(request(['search']))->latest()->withoutContent()->pending()->paginate($num_data)->appends(['search' => $search]),
            'draft' => Article::filter(request(['search']))->latest()->withoutContent()->draft()->paginate($num_data)->appends(['search' => $search]),
            'trash' => Article::filter(request(['search']))->latest()->withoutContent()->trash()->paginate($num_data)->appends(['search' => $search])
        ]);
    }

    /**
     * Menampilkan halaman form untuk mengupdate artikel
     * 
     * @param \App\Models\Article $article
     * @return \Illuminate\View\View
     */
    public function updateIndex(Article $article) {
        // Mengembalikan view dengan data artikel yang akan diupdate dan kategori artikel
        return view('pages.admin.article.article-create-update', [
            'type_menu' => 'article',
            'article' => $article,
            'categories' => ArticleCategory::all()
        ]);
    }

    /**
     * Mengupdate artikel pada database
     *
     * @param \App\Models\Article $article
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function update(Article $article, Request $request) {
        // Validasi input update artikel
        $data = $request->validate([
            'title' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'body' => 'required|string',
            'status' => 'required|in:publish,draft,pending',
            'tags' => 'required|string',
            'article_category_id' => 'required|exists:article_categories,id',
        ]);

        // Validasi Jika Thumbnail dirubah atau tidak
        if($request->file('thumbnail')){
            // Hapus thumbnail lama
            if (Storage::disk('public')->exists($article->thumbnail)) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            // Simpan thumbnail baru
            $data['thumbnail'] = $request->file('thumbnail')->store('content', 'public');
        }

        // Membuat slug dari judul artikel baru
        $slug = Str::slug($data['title']);

        // Validasi jika slug sudah digunakan atau tidak
        if ($slug !== $article->slug) {
            // Jika slug baru sudah terdaftar tambahkan "-2" untuk menghindari duplikasi
            if(Article::where('slug', $slug)->count()) {
                $slug .= "-2";
            }
        }
        // Simpan slug baru
        $data['slug'] = $slug;

        // Update artikel
        $article->update($data);

        // Flash tost
        $request->session()->flash('success', 'Berhasil merubah data artikel!');

        // Redirect ke halaman daftar artikel
        return redirect('/artikel/daftar-artikel');
    }

    /**
     * Soft delete artikel (Trash)
     * 
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function delete(Article $article, Request $request) {
        // Update kolom 'deleted_at' dengan waktu sekarang
        $article->update([
            'deleted_at' => now()
        ]);

        // Flash tost
        $request->session()->flash('success', 'Berhasil menghapus artikel!');

        // Redirect ke halaman daftar artikel
        return back();
    }

    /**
     * Restore artikel dari trash
     * 
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function restore(Article $article, Request $request) {
        // Update kolom 'deleted_at' menjadi null
        $article->update([
            'deleted_at' => null
        ]);

        // Flash tost
        $request->session()->flash('success', 'Berhasil merubah status artikel!');

        // Redirect ke halaman daftar artikel
        return redirect('/artikel/daftar-artikel');
    }

    /**
     * Hapus permanen artikel
     * 
     * @param \App\Models\Article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Request $request) {
        // Hapus file thumbnail
        if (Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        // Hapus artikel pada database
        $article->delete();

        // Flash tost
        $request->session()->flash('success', 'Berhasil menghapus artikel!');

        // Redirect ke halaman daftar artikel
        return back();
    }

    /**
     * Menampilkan detail artikel
     * 
     * @param \App\Models\Article $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article) {
        // Mengembalikan view dengan data artikel
        return view('pages.admin.article.article-view', [
            'type_menu' => 'article',
            'article' => $article
        ]);
    }

    /**
     * Menampilkan halaman daftar artikel untuk user
     * 
     * @return \Illuminate\View\View
     */
    public function index() {
        // Mentur jumlah data per halaman
        $num_data = 8;

        // Mendapatkan nilai parameter search
        $search = request('search');

        // Mendapatkan artikel
        $articles = Article::with('articleCategory')->filter(request(['search', 'kategori', 'tag']))->latest()->publish()->notInTrash()->paginate($num_data)->appends(['search' => $search]);

        // Mendapatkan kategro artikel
        $category_name = "";
        if (request('kategori')) {
            $category_name = ArticleCategory::where('id', request('kategori'))->first()->name ?? "Tidak ditemukan";
        }

        // Mendapatkan artikel terbaru
        $newest_article = Article::latest()->publish()->notInTrash()->withoutContent()->limit(3)->get();

        // Mengembalikan view dengan artikel perkategori
        return view('pages.user.article.index', [
            'articles' => $articles,
            'newest_articles' => $newest_article,
            'category_name' => $category_name,
            'categories' => ArticleCategory::all()
        ]);
    }

    public function detail(Article $article){

        // Mengembalikan view dengan data artikel
        return view('pages.user.article.detail', [
            'article' => $article,
            'newest_articles' => Article::latest()->publish()->notInTrash()->withoutContent()->limit(3)->get(),
            'categories' => ArticleCategory::all()
        ]);
    }

    public function draft(Request $request) {
        $data = $request->validate([
            'title' => 'required|string',
            'body' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $data['user_id'] = auth()->id();
            $data['article_category_id'] = '';
            $data['slug'] = Str::slug($data['title']);
            $data['status'] = 'draft';
            $data['thumbnail'] = '';
            $data['tags'] = 'draft';
    
            $article = Article::create($data);
           
            DB::commit();

            // Flash tost
            $request->session()->flash('success', 'Berhasil menambahkan draft artikel!');

            return back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th);
        }

    }
}
