<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHistoryController extends Controller
{
    public function index(){
       $order = Order::where('user_id', Auth::user()->id)->where('status', 1)->get();
        // dd($order);

        if (!empty($order)) {
            return view('admin.histories.index', [
                "orders" => $order,
            ]);
        } else {
        }
    }

    public function show(OrderDetail $orderDetail){
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();

        return view('admin.histories.show', [
            "order_details" => $orderDetails
        ]);
    }
}
