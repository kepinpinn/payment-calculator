<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
        $users = User::query()->get();
        return view('shoppings.create',['users'=>$users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'store' => 'required',
            'delivery' => 'required'
        ]);

        $request->merge([
            'user_id' =>  Auth::id()
        ]);

        $shopping = Shopping::create($request->all());
        return redirect()->route('shoppings.show',['shopping'=>$shopping->id])
            ->with('success','Post created successfully.');
    }

    public function show($shopping)
    {

        $users = User::query()->get();
        $shopping = Shopping::with('shopping_details','user')->where('id','=',$shopping)->firstOrFail();
        return view('shoppings.show',['shopping'=>$shopping],['users'=>$users]);
    }

    public function edit(Shopping $shopping)
    {
        $users = User::query()->get();
        return view('shoppings.edit',compact('shopping'),['users'=>$users]);
    }

    public function update(Request $request, Shopping $shopping)
    {
        $shopping->update([
            'tanggal' => $request->date,
            'store' => $request->store,
            'ppn' => $request->has('ppn'),
            'delivery' => $request->delivery,
            'promo1' => $request->promo1
        ]);
        return redirect()->route('shoppings.index')
            ->with('success','Shopping updated successfully');
    }

    public function destroy(Shopping $shopping)
    {
        $shopping->delete();

        return redirect()->back()
            ->with('success','Shopping deleted successfully');
    }
}
