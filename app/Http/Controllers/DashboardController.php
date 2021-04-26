<?php

namespace App\Http\Controllers;

use App\Models\Payment_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('payment_details',Payment_detail::class);
class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }
}
