<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {

        // dd($request);
        $validateData = $request->validate([
            "total_order" => "required|numeric"
        ]);

        if ($request->total_order > $product->stok) {
            FacadesAlert::error('Gagal', 'Jumlah Pesanan melebihi stok produk');
            return redirect()->back();
        }

        $checkOrder = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (empty($checkOrder)) {
            $dataOrder['user_id'] = Auth::user()->id;
            $dataOrder['order_date'] = now();
            $dataOrder['status'] = 0;
            $dataOrder['total_order_price'] = $product->price * $request->total_order;
            Order::create($dataOrder);
        } else {
            $newPriceOrder = $product->price * $request->total_order;
            $newDataOrder['total_order_price'] = $newPriceOrder + $checkOrder->total_order_price;
            Order::where('id', $checkOrder->id)->update($newDataOrder);
        }

        // Order Details
        $idOrder = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // dd($idOrder);

        $checkOrderDetails = OrderDetail::where('product_id', $product->id)->where('order_id', $idOrder->id)->first();

        if (empty($checkOrderDetails)) {
            $dataOrderDetails['product_id'] = $product->id;
            $dataOrderDetails['order_id'] = $idOrder->id;
            $dataOrderDetails['order_quantity'] = $request->total_order;
            $dataOrderDetails['total_price'] = $request->total_order * $product->price;
            OrderDetail::create($dataOrderDetails);
        } else {
            $newDataOrderDetails['order_quantity'] = $checkOrderDetails->order_quantity + $request->total_order;
            $newDataOrderDetails['total_price'] = $checkOrderDetails->total_price + ($request->total_order * $product->price);
            OrderDetail::where('id', $checkOrderDetails->id)->update($newDataOrderDetails);
        }

        FacadesAlert::success('Berhasil', 'Pesanan Berhasil Ditambahkan ke Keranjang!');

        return redirect()->route('admin.cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy('id', $order->id);

        FacadesAlert::success('Berhasil', "Pesanan Berhasil Dihapus");
        return redirect()->route('admin.produk');
    }

}
