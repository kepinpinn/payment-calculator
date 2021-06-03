<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Shopping_detail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Payment_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;
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
        $shopping_details = Shopping_detail::query()->where('shopping_details.id', $request->get('shopping_details_id'))->first();
        $shopping_details -> status='paid';
        $shopping_details ->save();


        $text = Auth::user()->name . " telah membayar hutang " . "$shopping_details->description" . " kepada " . "{$payment_details->payments->user->name} " . "sebesar " . "{$shopping_details->price_qty}.\n";

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001404601061'),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

       /* $attachment = $payments->attachment;
        Telegram::sendPhoto([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001404601061'),
            'attachment' => InputFile::createFromContents(file_get_contents($attachment->getRealPath()), str_random(10) . '.' . $attachment->getClientOriginalExtension())
        ]); */

        return redirect()->back()
            ->with(['shopping_details' => $shopping_details,$payment_details]);
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


    public function destroy(Payment_detail $payment_detail)
    {

        $shopping_details = Shopping_detail::query()->where('shopping_details.id', $payment_detail->shopping_details_id)->first();

          $shopping_details->fill([
                'status' =>  'unpaid'
            ]);
        $shopping_details->save();

        $text = "Hutang ". "$shopping_details->description "  .Auth::user()->name . " telah dibatalkan " . " kepada " . "{$payment_detail->payments->user->name} " . "sebesar " . "{$shopping_details->price_qty}.\n"
            . "<b>Harap ulangi pembayaran anda!</b>\n";

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001404601061'),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        $payment_detail->delete();
        return redirect()->back()
            ->with('success','Post deleted successfully');
    }
}
