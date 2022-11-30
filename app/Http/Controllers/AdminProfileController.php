<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function show() {
        $profile = User::where('id', Auth::user()->id)->first();
        return view('admin.profiles.show', [
            "profile" => $profile,
        ]);
    }
}
