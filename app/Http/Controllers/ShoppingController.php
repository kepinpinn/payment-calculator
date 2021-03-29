<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;
use App\Models\Shopping_detail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\ShoppingDetailController;

Route::resource('shoppings', ShoppingController::class);
Route::resource('shopping_details', ShoppingDetailController::class);

class ShoppingController extends Controller
{
    public function index()
    {
        $shoppings = Shopping::query()->paginate(5);

        return view('shoppings.index',compact('shoppings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {

        return view('shoppings.create');
    }

    public function store(Request $request)
    {
        $shopping_details = Shopping_detail::query()->get();

        return view('shoppings.index',['shopping_details'=>$shopping_details,'shopping'=>$shoppings]);
    }

    public function show($shopping)
    {
        $shopping = Shopping::with('shopping_details')->where('id','=',$shopping)->firstOrFail();
        return view('shoppings.show',['shopping'=>$shopping]);
    }

    public function edit(Shopping $shopping)
    {
        return view('shoppings.edit',compact('shopping'));
    }

    public function update(Request $request, Shopping $shopping)
    {


        $shopping->update($request->all());

        return redirect()->route('shoppings.index')
            ->with('success','Shopping updated successfully');
    }

    public function destroy(Shopping $shopping)
    {
        $shopping->delete();

        return redirect()->route('shoppings.index')
            ->with('success','Shopping deleted successfully');
    }
}
