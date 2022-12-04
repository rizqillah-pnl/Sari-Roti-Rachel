<?php

namespace App\Http\Controllers;

use App\Models\CustomerOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $order = CustomerOrder::where('name', Auth::user()->name)->where('status', 1)->get();
        // dd($order);

        if (!empty($order)) {
            return view('histories.index', [
                "orders" => $order,
            ]);
        } else {
        }
    }
}
