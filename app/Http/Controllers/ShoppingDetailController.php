<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Shopping_detail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resource('shopping_details', ShoppingDetailController::class);
Route::resource('shoppings', ShoppingController::class);
Route::resource('payment_details', PaymentDetailController::class);
class ShoppingDetailController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        $shopping_details = Shopping_detail::query($id)->paginate(5);

        return view('shopping_details.index',compact('shopping_details'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $users = User::query()->get();
        return view('shopping_details.create',['users'=>$users]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'borrower' => 'required',
            'price_qty' => 'required',
            'description' => 'required'
        ]);
        $request->merge([
            'user_id' =>  Auth::id()
        ]);

        $id = Auth::user()->id;
        if($request->get('borrower') == $id){
            $request->merge([
                'status' =>  'paid'
            ]);
        }
        Shopping_detail::create($request->all());
        return redirect()->back()
            ->with('success','Detail created successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit(Shopping_detail $shopping_detail)
    {
        $users = User::query()->get();
        return view('shopping_details.edit',compact('shopping_detail'),['users'=>$users]);
    }


    public function update(Request $request, Shopping_detail $shopping_detail)
    {
        $shopping_detail->update($request->all());
        return redirect()->route('shoppings.show',['shopping'=>$shopping_detail->shopping_id])
            ->with('success','Post created successfully.');
    }


    public function destroy(Shopping_detail $shopping_detail)
    {
        $shopping_detail->delete();

        return redirect()->back()
            ->with('success','Post deleted successfully');
    }
}
