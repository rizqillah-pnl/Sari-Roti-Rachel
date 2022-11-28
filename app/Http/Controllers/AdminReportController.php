<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index() {
        return view('admin.reports.index');
    }
}
