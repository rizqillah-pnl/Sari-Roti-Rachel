<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index(Request $request) {
        if ($request) {
            if ($request->year) {
                $order = Order::whereYear('order_date', date('m'))->get();
            }elseif ($request->month) {
                $order = Order::whereMonth('order_date', date('Y'))->get();
            }elseif ($request->week) {
                $order = Order::whereBetween('order_date', [now(), now() + 7 ])->get();
            }elseif ($request->day) {
                $order = Order::whereDay('order_date', today())->get();
            }else {
                $order = "";
            }
        }
        return view('admin.reports.index', [
            "orders" => $order
        ]);
    }
}
