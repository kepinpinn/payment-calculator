<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Shopping;
use App\Models\Shopping_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('payments',Payment::class);
class DashboardController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $hutang = Shopping_detail::where('borrower',$id)->where('status','unpaid')->sum('price_qty');
        $total_spend = Shopping_detail::where('borrower',$id)->sum('price_qty');
        $shopping_details = Shopping_detail::query($id)->paginate(5);

        return view('dashboard.index',compact('shopping_details','hutang','total_spend'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
