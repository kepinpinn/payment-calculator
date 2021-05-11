<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Shopping;
use App\Models\Shopping_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::resource('shopping_details', Shopping_detail::class);
Route::resource('payments',Payment::class);
Route::resource('shoppings', Shopping::class);
class DashboardController extends Controller
{
    public function index(){

        $id = Auth::user()->id;
        $hutang = Shopping_detail::where('borrower',$id)->where('status','unpaid')->get()->sum('total_bayar_borrower');

        $total_spend = Shopping_detail::where('borrower',$id)->get()->sum('total_bayar_borrower');
        $total_piutang = Shopping_detail::query()->where('shopping_details.status', 'unpaid')
            ->whereHas('shoppings', function ($query) use ($id) {
                $query->where('shoppings.user_id',Auth::id());
            })
            ->sum('price_qty');
        $shopping_details = Shopping_detail::query($id)->paginate(5);

        return view('dashboard.index',compact('shopping_details','hutang','total_spend','total_piutang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
