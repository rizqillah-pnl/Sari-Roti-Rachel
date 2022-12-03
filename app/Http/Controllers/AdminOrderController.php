<?php

namespace App\Http\Controllers;

use App\Models\CustomerOrder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
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
    public function index(Request $request)
    {
        if (isset($request)) {
            $product = Product::where('name', 'LIKE', '%' . $request->search . '%')->paginate(8);
        } else {
            $product = Product::paginate(8);
        }

        return view('admin.products.list', [
            "products" => $product
        ]);
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

        // Order
        if ($request->total_order > $product->stok) {
            FacadesAlert::error('Gagal', 'Jumlah Pesanan melebihi stok produk');
            return redirect()->back();
        }

        $checkOrder = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (empty($checkOrder)) {
            $dataOrder['user_id'] = Auth::user()->id;
            $dataOrder['customer_name'] = "-";
            $dataOrder['order_date'] = now();
            $dataOrder['status'] = 0;
            $dataOrder['total_order_price'] = $product->price * $request->total_order;
            Order::create($dataOrder);
        } else {
            $newPriceOrder = $product->price * $resquest->total_order;
            $newDataOrder['total_order_price'] = $newPriceOrder + $checkOrder->total_order_price;
            Order::where('id', $checkOrder->id)->update($newDataOrder);
        }

        // CutomerOrder
        if (empty($checkOrder)) {
            $dataCustomerOrder['order_id'] = 0;
            $dataCustomerOrder['name'] = "-";
            $dataCustomerOrder['date'] = now();
            $dataCustomerOrder['status'] = 0;
            $dataCustomerOrder['price'] = $product->price * $request->total_order;
            CustomerOrder::create($dataCustomerOrder);
        } else {
            $newPriceCustomerOrder = $product->price * $request->total_order;
            $newDataCustomerOrder['price'] = $newPriceCustomerOrder + $checkOrder->total_order_price;
            CustomerOrder::where('id', $checkOrder->id)->update($newDataCustomerOrder);
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
    public function checkout(Request $request)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $dataOrder['customer_name'] = $request->customer_name;
        $dataOrder['status'] = 1;
        Order::where('id', $order->id)->update($dataOrder);

        $customerOrder = CustomerOrder::where('status', 0)->first();
        $dataCustomerOrder['order_id'] = $order->id;
        $dataCustomerOrder['name'] = $request->customer_name;
        $dataCustomerOrder['status'] = 1;
        CustomerOrder::where('id', $customerOrder->id)->update($dataCustomerOrder);

        $detailOrders = OrderDetail::where('order_id', $order->id)->get();
        foreach ($detailOrders as $detailOrder) {
            $product = Product::where('id', $detailOrder->product_id)->first();
            $dataProduct['stok'] = $product->stok - $detailOrder->order_quantity;
            Product::where('id', $product->id)->update($dataProduct);
        }

        $order_price = CustomerOrder::where('name', $request->customer_name)->where('status', 1)->groupBy('price')->sum('price');
        // dd($order_price);
        // dd($order_price->total_order_price);

        if ($order_price >= 200000) {
            $dataLevelCokelat['member'] = 3;
            User::where('name', $request->customer_name)->update($dataLevelCokelat);
        } elseif ($order_price >= 100000) {
            $dataLevelAnggur['member'] = 2;
            User::where('name', $request->customer_name)->update($dataLevelAnggur);
        } elseif ($order_price < 100000) {
            $dataLevelPandan['member'] = 1;
            User::where('name', $request->customer_name)->update($dataLevelPandan);
        }

        FacadesAlert::success('Berhasil', 'Pesanan Berhasil di Konfirmasi');

        return redirect('/admin/history');
    }


    public function show(Product $product)
    {
        $produk = Product::where('id', $product->id)->first();

        return view('admin.products.show', [
            "product" => $produk
        ]);
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
        return redirect()->route('admin.history');
    }
}
