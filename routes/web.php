<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\ChatBotController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\MailController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;


// User Only
Route::domain(env('APP_DOMAIN', "maggoplastgel.test"))->group(function () {
    Route::controller(GeneralController::class)->group(function() {
        Route::get('/', 'home')->name('user.home');
        Route::get('/about-us', 'aboutUs')->name('user.about-us');
        Route::get('/team', 'team')->name('user.team');
        Route::get('/faq', 'faq')->name('user.faq');
        Route::get('/contact-us', 'contactUs')->name('user.contact-us');
        Route::get('/blog', 'blog')->name('user.blog');
        Route::get('/blog/detail', 'blogDetail')->name('user.blog.detail');
    });

    Route::controller(ArticleController::class)->group(function(){
        Route::get('/artikel', 'index')->name('user.article');
        Route::get('/artikel/{article:slug}', 'detail')->name('user.article.detail');
    });

    Route::controller(CheckoutController::class)->group(function() {
        Route::get('/product', 'productPage')->name('user.product');
        Route::post('/product/checkout/{product}', 'saveOrder')->name('user.checkout')->middleware('isUserLogin');
        Route::get('/product/checkout', 'checkoutPage')->name('user.checkout.get')->middleware('isUserLogin');
        Route::post('/product/checkout/payment/{orderId}', 'payment')->name('user.checkout.store')->middleware('isUserLogin');
        Route::get('/product/checkout/payment/{orderId}', 'paymentPage')->name('user.checkout.payment')->middleware('isUserLogin');
        Route::get('/payment/status/{statusParameter}', 'notification')->middleware('isUserLogin');

    });

    Route::controller(UserAuthController::class)->group(function() {
        Route::get('/login', 'loginPage')->name('user.login.index');
        Route::post('/login', 'login')->name('user.login.post');
        Route::post('/logout', 'logout')->name('user.logout');
        Route::get('/register', 'registerIndex')->name('user.register');
        Route::post('/register', 'registerStore')->name('user.register.store');
    });

    Route::controller(ChatBotController::class)->group(function() {callback:
        Route::post('/chatbot/ai', 'sendMessage')->name('chatbot.send');
    });

    Route::middleware(['middleware' => 'isUserLogin'])->group(function () {

        Route::controller(ProfileController::class)->group(function() {callback:
            Route::get('/user/profile', 'index')->name('user.profile')->middleware('isUserLogin');
            Route::put('/user/profile/update', 'updateUser')->name('user.profile.update')->middleware('isUserLogin');
            Route::get('/user/profile/order', 'orderIndex')->name('user.profile.order')->middleware('isUserLogin');

        });
        Route::controller(OrderController::class)->group(function() {
           Route::put('/pesanan/selesai/{order}', 'finish');
           Route::get('/pesanan/lacak/{order}', 'track');
        });
    });

    Route::controller(LaravoltController::class)->group(function() {
        Route::get('/provinces', 'provinces')->name('provinces');
        Route::get('/cities', 'cities')->name('cities');
        Route::get('/districts', 'districts')->name('districts');
        Route::get('/villages', 'villages')->name('villages');
    });

    Route::controller(MailController::class)->group(function() {
        Route::post('/contact-us/send', 'mailContact')->name('contact.mail');
    });



});

// Admin Only
Route::domain('admin.' . env('APP_DOMAIN', "maggoplastgel.test"))->group(function () {

    Route::get('/login', function(){
        return view('pages.admin.auth.auth-login', ['type_menu' => 'login']);
    })->name('login')->middleware('guest');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::group(['middleware' => 'auth'], function () {
        // Artikel
        Route::controller(ArticleController::class)->group(function() {
            Route::get('/artikel/tambah-artikel', 'createIndex');
            Route::get('/artikel/daftar-artikel', 'list');
            Route::get('/artikel/edit-artikel/{article}', 'updateIndex');
            Route::post('/artikel', 'create');
            Route::post('/artikel/tambah-draft', 'draft');
            Route::put('/artikel/edit/{article}', 'update');
            Route::put('/artikel/hapus-artikel/{article}', 'delete');
            Route::put('/artikel/hapus-permanen-artikel/{article}', 'destroy');
            Route::put('/artikel/restore-artikel/{article}', 'restore');
        });

        // Kategori Artikel
        Route::controller(ArticleCategoryController::class)->group(function(){
            Route::post('/kategori-artikel', 'store');
        });

        // Produk
        Route::controller(ProductController::class)->group(function(){
            Route::get('/produk/tambah-produk', 'createIndex');
            Route::get('/produk/daftar-produk', 'list');
            Route::get('/produk/edit-produk/{product}', 'updateIndex');
            Route::post('/produk', 'store');
            Route::put('/produk/nonaktif-produk/{product}', 'deactivate');
            Route::put('/produk/aktif-produk/{product}', 'activate');
            Route::put('/produk/edit/{product}', 'update');
            Route::delete('/produk/hapus-produk/{product}', 'delete');
        });

        // Order
        Route::controller(OrderController::class)->group(function() {
           Route::get('/pesanan', 'index');
           Route::put('/pesanan/kirim/{order}', 'sent');
           Route::put('/pesanan/selesai/{order}', 'finish');
           Route::get('/pesanan/lacak/{order}', 'track');
        });

        // Dashboard
        Route::controller(DashboardController::class)->group(function(){
            Route::get('/', 'index');
            Route::get('/dashboard/chart/{periode}', 'chart');
        });
    });


    // // Dashboard
    // Route::get('/dashboard-general-dashboard', function () {
    //     return view('pages.admin.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
    // });
    // Route::get('/dashboard-ecommerce-dashboard', function () {
    //     return view('pages.admin.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
    // });


    // // Layout
    // Route::get('/layout-default-layout', function () {
    //     return view('pages.admin.layout-default-layout', ['type_menu' => 'layout']);
    // });

    // // Blank Page
    // Route::get('/blank-page', function () {
    //     return view('pages.admin.blank-page', ['type_menu' => '']);
    // });

    // // Bootstrap
    // Route::get('/bootstrap-alert', function () {
    //     return view('pages.admin.bootstrap-alert', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-badge', function () {
    //     return view('pages.admin.bootstrap-badge', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-breadcrumb', function () {
    //     return view('pages.admin.bootstrap-breadcrumb', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-buttons', function () {
    //     return view('pages.admin.bootstrap-buttons', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-card', function () {
    //     return view('pages.admin.bootstrap-card', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-carousel', function () {
    //     return view('pages.admin.bootstrap-carousel', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-collapse', function () {
    //     return view('pages.admin.bootstrap-collapse', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-dropdown', function () {
    //     return view('pages.admin.bootstrap-dropdown', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-form', function () {
    //     return view('pages.admin.bootstrap-form', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-list-group', function () {
    //     return view('pages.admin.bootstrap-list-group', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-media-object', function () {
    //     return view('pages.admin.bootstrap-media-object', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-modal', function () {
    //     return view('pages.admin.bootstrap-modal', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-nav', function () {
    //     return view('pages.admin.bootstrap-nav', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-navbar', function () {
    //     return view('pages.admin.bootstrap-navbar', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-pagination', function () {
    //     return view('pages.admin.bootstrap-pagination', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-popover', function () {
    //     return view('pages.admin.bootstrap-popover', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-progress', function () {
    //     return view('pages.admin.bootstrap-progress', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-table', function () {
    //     return view('pages.admin.bootstrap-table', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-tooltip', function () {
    //     return view('pages.admin.bootstrap-tooltip', ['type_menu' => 'bootstrap']);
    // });
    // Route::get('/bootstrap-typography', function () {
    //     return view('pages.admin.bootstrap-typography', ['type_menu' => 'bootstrap']);
    // });


    // // components
    // Route::get('/components-article', function () {
    //     return view('pages.admin.components-article', ['type_menu' => 'components']);
    // });
    // Route::get('/components-avatar', function () {
    //     return view('pages.admin.components-avatar', ['type_menu' => 'components']);
    // });
    // Route::get('/components-chat-box', function () {
    //     return view('pages.admin.components-chat-box', ['type_menu' => 'components']);
    // });
    // Route::get('/components-empty-state', function () {
    //     return view('pages.admin.components-empty-state', ['type_menu' => 'components']);
    // });
    // Route::get('/components-gallery', function () {
    //     return view('pages.admin.components-gallery', ['type_menu' => 'components']);
    // });
    // Route::get('/components-hero', function () {
    //     return view('pages.admin.components-hero', ['type_menu' => 'components']);
    // });
    // Route::get('/components-multiple-upload', function () {
    //     return view('pages.admin.components-multiple-upload', ['type_menu' => 'components']);
    // });
    // Route::get('/components-pricing', function () {
    //     return view('pages.admin.components-pricing', ['type_menu' => 'components']);
    // });
    // Route::get('/components-statistic', function () {
    //     return view('pages.admin.components-statistic', ['type_menu' => 'components']);
    // });
    // Route::get('/components-tab', function () {
    //     return view('pages.admin.components-tab', ['type_menu' => 'components']);
    // });
    // Route::get('/components-table', function () {
    //     return view('pages.admin.components-table', ['type_menu' => 'components']);
    // });
    // Route::get('/components-user', function () {
    //     return view('pages.admin.components-user', ['type_menu' => 'components']);
    // });
    // Route::get('/components-wizard', function () {
    //     return view('pages.admin.components-wizard', ['type_menu' => 'components']);
    // });

    // // forms
    // Route::get('/forms-advanced-form', function () {
    //     return view('pages.admin.forms-advanced-form', ['type_menu' => 'forms']);
    // });
    // Route::get('/forms-editor', function () {
    //     return view('pages.admin.forms-editor', ['type_menu' => 'forms']);
    // });
    // Route::get('/forms-validation', function () {
    //     return view('pages.admin.forms-validation', ['type_menu' => 'forms']);
    // });

    // // google maps
    // // belum tersedia

    // // modules
    // Route::get('/modules-calendar', function () {
    //     return view('pages.admin.modules-calendar', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-chartjs', function () {
    //     return view('pages.admin.modules-chartjs', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-datatables', function () {
    //     return view('pages.admin.modules-datatables', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-flag', function () {
    //     return view('pages.admin.modules-flag', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-font-awesome', function () {
    //     return view('pages.admin.modules-font-awesome', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-ion-icons', function () {
    //     return view('pages.admin.modules-ion-icons', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-owl-carousel', function () {
    //     return view('pages.admin.modules-owl-carousel', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-sparkline', function () {
    //     return view('pages.admin.modules-sparkline', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-sweet-alert', function () {
    //     return view('pages.admin.modules-sweet-alert', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-toastr', function () {
    //     return view('pages.admin.modules-toastr', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-vector-map', function () {
    //     return view('pages.admin.modules-vector-map', ['type_menu' => 'modules']);
    // });
    // Route::get('/modules-weather-icon', function () {
    //     return view('pages.admin.modules-weather-icon', ['type_menu' => 'modules']);
    // });

    // // auth
    // Route::get('/auth-forgot-password', function () {
    //     return view('pages.admin.auth-forgot-password', ['type_menu' => 'auth']);
    // });
    // Route::get('/auth-login', function () {
    //     return view('pages.admin.auth-login', ['type_menu' => 'auth']);
    // });
    // Route::get('/auth-login2', function () {
    //     return view('pages.admin.auth-login2', ['type_menu' => 'auth']);
    // });
    // Route::get('/auth-register', function () {
    //     return view('pages.admin.auth-register', ['type_menu' => 'auth']);
    // });
    // Route::get('/auth-reset-password', function () {
    //     return view('pages.admin.auth-reset-password', ['type_menu' => 'auth']);
    // });

    // // error
    // Route::get('/error-403', function () {
    //     return view('pages.admin.error-403', ['type_menu' => 'error']);
    // });
    // Route::get('/error-404', function () {
    //     return view('pages.admin.error-404', ['type_menu' => 'error']);
    // });
    // Route::get('/error-500', function () {
    //     return view('pages.admin.error-500', ['type_menu' => 'error']);
    // });
    // Route::get('/error-503', function () {
    //     return view('pages.admin.error-503', ['type_menu' => 'error']);
    // });

    // // features
    // Route::get('/features-activities', function () {
    //     return view('pages.admin.features-activities', ['type_menu' => 'features']);
    // });
    // Route::get('/features-post-create', function () {
    //     return view('pages.admin.features-post-create', ['type_menu' => 'features']);
    // });
    // Route::get('/features-post', function () {
    //     return view('pages.admin.features-post', ['type_menu' => 'features']);
    // });
    // Route::get('/features-profile', function () {
    //     return view('pages.admin.features-profile', ['type_menu' => 'features']);
    // });
    // Route::get('/features-settings', function () {
    //     return view('pages.admin.features-settings', ['type_menu' => 'features']);
    // });
    // Route::get('/features-setting-detail', function () {
    //     return view('pages.admin.features-setting-detail', ['type_menu' => 'features']);
    // });
    // Route::get('/features-tickets', function () {
    //     return view('pages.admin.features-tickets', ['type_menu' => 'features']);
    // });

    // // utilities
    // Route::get('/utilities-contact', function () {
    //     return view('pages.admin.utilities-contact', ['type_menu' => 'utilities']);
    // });
    // Route::get('/utilities-invoice', function () {
    //     return view('pages.admin.utilities-invoice', ['type_menu' => 'utilities']);
    // });
    // Route::get('/utilities-subscribe', function () {
    //     return view('pages.admin.utilities-subscribe', ['type_menu' => 'utilities']);
    // });

    // // credits
    // Route::get('/credits', function () {
    //     return view('pages.admin.credits', ['type_menu' => '']);
    // });
});
