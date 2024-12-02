<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticalController extends Controller
{
    //
    public function index()
    {
        // Đếm số lượng sản phẩm
        $countProducts = Product::count();

        // Số lượng sản phẩm hết hàng 
        $outOfstock = Product::select('name')->where('quantity', 0)->get();
        // return $outOfstock;

        $bestSeller = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.name', 'order_items.product_id', DB::raw('COUNT(*) as frequency'))
            ->groupBy('order_items.product_id', 'products.name')
            ->orderByDesc('frequency')
            ->take(5)->get();

        // return $bestSeller;


        return view('admin.statistical', [
            'countProducts' => $countProducts,
            'outOfstock' => $outOfstock,
            'bestSeller' => $bestSeller,
        ]);
    }
    public function getProfit()
    {
        $results = DB::table('book.order_items as o')
            ->join('book.products as p', 'o.product_id', '=', 'p.id')
            ->select(
                DB::raw('DATE(o.created_at) as day'),
                DB::raw('SUM(o.quantity * p.ori_price) as totalBuy'),
                DB::raw('SUM(o.quantity * p.price) as totalSell')
            )
            ->groupBy(DB::raw('DATE(o.created_at)'))
            ->get();
        $jsonArray = [];

        foreach ($results as $result) {
            $totalSell = $result->totalSell;
            $totalBuy = $result->totalBuy;
            $date = $result->day;
            $revenue = $totalSell;
            $profit = $totalSell - $totalBuy;

            $jsonArray[] = [
                'day' => $date,
                'revenue' => $revenue,
                'profit' => $profit,
            ];
        }
        // dd($jsonArray);
        return response()->json($jsonArray);
    }
}