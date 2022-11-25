<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCartController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $user = User::get();

        if (!empty($order)) {
            $order_details = OrderDetail::where('id', $order->id)->get();

            return view('admin.carts.index', [
                "order" => $order,
                "order_details" => $order_details,
                "users" => $user
            ]);
        } else {
        }
    }
}
