<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class AdminProductController extends Controller
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

        return view('admin.products.index', [
            "products" => $product
        ]);
    }

    public function list()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required",
            "image" => "file|image|required",
            "price" => "required|numeric",
            "stok" => "required|numeric",
            "description" => "required|min:5"
        ]);

        if ($request->file('image')) {
            $image = date('dmy') . $request->file('image')->getClientOriginalName();
            $validateData['image'] = $request->file('image')->storeAs('products', $image);
        }


        Product::create($validateData);

        FacadesAlert::success('Berhasil', "Produk berhasil ditambahkan!");
        return redirect()->route('admin.products');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            "product" => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            "name" => "required",
            "image" => "file|image|required",
            "price" => "required|numeric",
            "stok" => "required|numeric",
            "description" => "required|min:5"
        ]);

        $oldImage = Product::where('id', $product->id);

        if ($request->file('image')) {
            if ($oldImage->file) {
                Storage::delete($oldImage->file);
            }
            $image = date('dmy') . $request->file('image')->getClientOriginalName();
            $validateData['image'] = $request->file('image')->storeAs('products', $image);
        }


        Product::create($validateData);

        FacadesAlert::success('Berhasil', "Produk berhasil ditambahkan!");
        return redirect()->route('admin.products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy('id', $product->id);

        FacadesAlert::success('Berhasil', "Produk Berhasil Dihapus");
        return redirect()->route('admin.product');
    }
}
