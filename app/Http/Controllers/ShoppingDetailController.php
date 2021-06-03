<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Shopping_detail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

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

        $shopping_detail = Shopping_detail::create($request->all());

            $text = "{$shopping_detail->user->name}" . " telah berhutang " . "$shopping_detail->description" . " kepada " . "{$shopping_detail->shoppings->user->name} " . "sebesar " . "$shopping_detail->price_qty" . ".\n"
                . "<b>Silahkan segera lunasi hutang anda!</b>\n";

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001404601061'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);

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

            $text = "Hutang " . "{$shopping_detail->description} " . "{$shopping_detail->user->name} " . "sebesar " . "$shopping_detail->price_qty " . "telah dibatalkan oleh " . "{$shopping_detail->shoppings->user->name}.\n "
                . $shopping_detail->message;

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001404601061'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);

        $shopping_detail->delete();

        return redirect()->back()
            ->with('success','Data deleted successfully');
    }

}
