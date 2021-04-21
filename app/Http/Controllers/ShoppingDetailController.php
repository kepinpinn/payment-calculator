<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Shopping_detail;
use App\Models\Shopping;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resource('shopping_details', ShoppingDetailController::class);
Route::resource('shoppings', ShoppingController::class);

class ShoppingDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
      @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $shopping_details = Shopping_detail::query($id)->paginate(5);

        return view('shopping_details.index',compact('shopping_details'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
      @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::query()->get();
        return view('shopping_details.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
      @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'borrower' => 'required',
            'price_qty' => 'required',
            'delivery_borrower' => 'required',
            'total_bayar_borrower' => 'required',
        ]);
        Shopping_detail::create($request->all());
        return redirect()->back()
            ->with('success','Detail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
      @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return redirect()->back()
           ->with('success','Detail created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Shopping_detail $shopping_detail)
    {
        $request->validate([
            'borrower' => 'required',
            'price_qty' => 'required',
            'delivery_borrower' => 'required',
            'total_bayar_borrower' => 'required',
        ]);

        $shopping_detail->update($request->all());
        /* dd($request); */
       return redirect()->back()
            ->with('success','Details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
      @return \Illuminate\Http\Response
     */
    public function destroy(Shopping_detail $shopping_detail)
    {
        $shopping_detail->delete();

        return redirect()->back()
            ->with('success','Post deleted successfully');
    }
}
