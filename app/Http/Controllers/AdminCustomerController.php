<?php

namespace App\Http\Controllers;

use App\Models\CustomerOrder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request)) {
            $user = User::where('name', 'LIKE', '%' . $request->search . '%')->where('level', 2)->paginate(8);
        }else{
            $user = User::where('level', 2)->paginate(8);
        }

        return view('admin.customers.index', [
            "users" => $user,
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $order = Order::where('customer_name', $user->name)->where('status', 1)->get();

        return view('admin.customers.show', [
            "profile" => $user,
            "orders" => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $validateData['price'] = 0;
        CustomerOrder::where('name', $user->name)->update($validateData);

        $customerOrder = CustomerOrder::where('name', $user->name)->where('status', 1)->sum('price');
        if($customerOrder === 0) {
            $validateDataUser['member'] = 1;
            User::where('name', $user->name)->update($validateDataUser);
        }

        FacadesAlert::success('Berhasil', 'Tingkatan Pelanggan Menjadi Pandan');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
