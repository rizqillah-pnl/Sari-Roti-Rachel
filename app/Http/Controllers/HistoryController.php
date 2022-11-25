<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 1)->get();
        // dd($order);

        foreach ($order as $ord) {
            $user = Order::where('customer_name', $ord->customer_name)->first();
        }

        if (!empty($order)) {
            return view('histories.index', [
                "orders" => $order,
                "users" => $user
            ]);
        } else {
        }
    }
}
