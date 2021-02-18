<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;

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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Shopping::create($request->all());

        return redirect()->route('shoppings.index')
            ->with('success','Post created successfully.');
    }

    public function show(Shopping $shopping)
    {
        return view('shoppings.show',compact('shopping'));
    }

    public function edit(Shopping $shopping)
    {
        return view('shoppings.edit',compact('shopping'));
    }

    public function update(Request $request, Shopping $shopping)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $shopping->update($request->all());

        return redirect()->route('shoppings.index')
            ->with('success','Shopping updated successfully');
    }

    public function destroy(Shopping $shopping)
    {
        $shopping->delete();

        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }
}
