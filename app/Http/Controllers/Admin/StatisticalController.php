<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticalController extends Controller
{
    //
    public function index() {
          
        return view('admin.statistical');
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
