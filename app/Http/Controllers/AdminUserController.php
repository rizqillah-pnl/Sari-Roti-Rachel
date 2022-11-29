<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request)) {
            $user = User::where('name', 'LIKE', '%' . $request->search . '%')->paginate(8);
        } else {
            $user = User::paginate(8)->get();
        }

        return view('admin.users.index', [
            "users" => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            "email" => "required|email|unique:users",
            "address" => "required|min:5",
            "phone" => "required|numeric",
        ]);

        $validateData['level'] = 1;
        $validateData['password'] = Hash::make('sariroti');

        if ($request->file('image')) {
            $image = date('dmy') . $request->file('image')->getClientOriginalName();
            $validateData['image'] = $request->file('image')->storeAs('users', $image);
        }


        User::create($validateData);

        FacadesAlert::success('Berhasil', "User berhasil ditambahkan!");
        return redirect()->route('admin.user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
