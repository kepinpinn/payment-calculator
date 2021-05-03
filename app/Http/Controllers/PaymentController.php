<?php

namespace App\Http\Controllers;
use App\Models\Shopping_detail;
use App\Models\User;
use App\Models\Payment_detail;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::resource('payment_details',Payment_detail::class);
Route::resource('payments',Payment::class);

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::query()->paginate(5);
        return view('payments.index',compact('payments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $users = User::query()->get();
        return view('payments.create',['users'=>$users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'creditor_payment_id' => 'required',
            'tanggal_payment' => 'required',
            'attachment' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $request->merge([
            'borrower_payment_id' =>  Auth::id()
        ]);

        $input = $request->all();
        $file = $request->file('attachment');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'bukti_bayar';
        $file->move($tujuan_upload,$nama_file);
        $input['attachment'] = $nama_file;




        $payment = Payment::create($input);
        return redirect()->route('payments.show',['payment'=>$payment->id])
            ->with('success','Post created successfully.');
    }

    public function show($payment)
    {

        $users = User::query()->get();
        $payment = Payment::with('payment_details','user')->where('id','=',$payment)->firstOrFail();

        $shopping_details = Shopping_detail::query()
            ->whereHas('shoppings', function ($query) use ($payment) {
                $query->where('shoppings.user_id', $payment->creditor_payment_id);
            })
            ->get();

        return view('payments.show',['payment'=>$payment],['users'=>$users, 'shopping_details' => $shopping_details]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->back()
            ->with('success','Payments deleted successfully');
    }
}
