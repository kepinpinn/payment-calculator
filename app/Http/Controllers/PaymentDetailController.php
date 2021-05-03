<?php

namespace App\Http\Controllers;

use App\Models\Shopping_detail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Payment_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

Route::resource('payment_details',Payment_detail::class);
Route::resource('shopping_details', ShoppingDetailController::class);

class PaymentDetailController extends Controller
{

    public function index()
    {
       return view('dashboard.index');

    }


    public function create()
    {
        $users = User::query()->get();
        return view('payment_details.create',['users'=>$users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'shopping_details_id' => 'required',
        ]);
        $request->merge([
            'user_id' =>  Auth::id()
        ]);

        $payment_details = Payment_detail::create($request->all());
        $shopping_details = Shopping_detail::query()->where('shopping_details.id', $payment_details->creditor_payment_id)->get();

        return redirect()->back()
            ->with(['shopping_details' => $shopping_details]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
