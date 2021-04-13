<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Shopping_detail;
use App\Models\Shopping;
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
        if($request->has('ppn')){
        //if checked
        }else{
            //not checked
        }
        $request->validate([
            'user_id' => 'required',
            'tanggal' => 'required',
            'store' => 'required',
            'amount' => 'required',
            'delivery' => 'required',
            'total' => 'required',
            'total_bayar' => 'required',
        ]);
        $shopping = Shopping::create($request->all());

        return redirect()->route('shoppings.show',['shopping'=>$shopping->id])
            ->with('success','Post created successfully.');
    }

    public function show($shopping)
    {
        $shopping = Shopping::with('shopping_details','user')->where('id','=',$shopping)->firstOrFail();
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
