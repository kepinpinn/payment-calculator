<?php

namespace App\Http\Controllers;

use App\Models\Shopping_detail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Payment_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
            'shopping_details' => 'required',
        ]);
        $request->merge([
            'user_id' =>  Auth::id()
        ]);
        $shopping = DB::table('shoppings');
        Payment_detail::create($request->all());
        return redirect()->back()
            ->with('success','Detail created successfully.');
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
