<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index() {

        Carbon::setLocale('id');
        $num_products = Product::all()->count();
        $num_articles = Article::where('status', 'publish')->count();
        $num_orders = Order::whereNot('status', 'pending')->count();
        $num_users = User::where('role', 'user')->count();

        $recent_orders = Order::with(['user', 'orderItems.product'])->latest()->get()->take(4);
        $recent_articles = Article::with('user')->notInTrash()->publish()->latest()->get()->take(6);

        $type_menu = 'dashboard';

        return view('pages.admin.dashboard.dashboard', compact(
            'num_products', 'num_articles', 'num_orders', 'num_users', 'recent_orders', 'recent_articles', 'type_menu'
        ));
    }

    public function chart($periode, Request $request) {
        $one_month_ago = Carbon::now()->subMonth();
        $one_week_ago = Carbon::now()->subWeek();
        $now = Carbon::now();

        $orders_month = Order::where('created_at', '>=', $one_month_ago)
                ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get();

        $orders_week = Order::where('created_at', '>=', $one_week_ago)
        ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();

        $chart_orders_month = [];
        $chart_orders_week = [];

        for ($date = $one_month_ago; $date->lte($now); $date->addDay()) {
            $formattedDate = $date->format('Y-m-d');

            $chart_orders_month['labels'][] = $formattedDate;
            $chart_orders_month['data'][] = $orders_month->firstWhere('date', $formattedDate)->total ?? 0;
        }

        for ($date = $one_week_ago; $date->lte($now); $date->addDay()) {
            $formattedDate = $date->format('Y-m-d');
                
            $chart_orders_week['labels'][] = $formattedDate;
            $chart_orders_week['data'][] = $orders_week->firstWhere('date', $formattedDate)->total ?? 0;
        }

        return response()->json([
            'success' => true, 
            'message' => 'Data chart berhasil diambil',
            'data' => $periode == 'week' ? $chart_orders_week : $chart_orders_month
        ], 201);
    }
}
