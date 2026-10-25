<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $totalStock = Item::sum('stock');
        $totalValue = Item::selectRaw('COALESCE(SUM(price * stock), 0) as total')
            ->value('total');

        $latestItems = Item::with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'categoryCount',
            'itemCount',
            'totalStock',
            'totalValue',
            'latestItems'
        ));
    }
}