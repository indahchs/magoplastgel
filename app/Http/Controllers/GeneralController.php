<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
    public function home() {

        // Mendapatkan artikel
        $articles = Article::with('articleCategory')->where('status','=','publish')->get();

        // return response()->json($articles);

        // Mengembalikan view dengan artikel perkategori
        return view('pages.user.home', [
            'articles' => $articles,
        ]);

        // return view('pages.user.home');
    }

    public function aboutUs() {
        return view('pages.user.about-us');
    }

    public function team() {
        return view('pages.user.team');
    }

    public function faq() {
        return view('pages.user.faq');
    }

    public function contactUs() {
        return view('pages.user.contact-us');
    }

    public function blog() {
        return view('pages.user.blog.index');
    }

    public function blogDetail() {
        return view('pages.user.blog.detail');
    }

    public function product() {
        return view('pages.user.product');
    }

    public function checkoutPage() {
        return view('pages.user.checkout');
    }
}
