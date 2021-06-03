@extends('admin/admin')

@section('content')
    <div class="card">
        <div class="card-header">
                <h2 >INDEX SHOPPING</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('shoppings.create') }}"> Create Shopping</a>
            </div>
        </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="card-body">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="20px" class="text-center">Creditor</th>
            <th width="20px" class="text-center">Date</th>
            <th width="20px" class="text-center">Store</th>
            <th width="20px" class="text-center">Amount</th>
            <th width="20px" class="text-center">PPn</th>
            <th width="20px" class="text-center">Delivery</th>
            <th width="20px" class="text-center">Total</th>
            <th width="20px" class="text-center">Promo</th>
            <th width="20px" class="text-center">Total Bayar</th>
            <th width="20px" class="text-center">Status</th>
            <th width="20px" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($shoppings as $shopping)
            @if($shopping->user_id == Auth::user()->id)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $shopping->user->name }}</td>
                <td>{{ $shopping->tanggal }}</td>
                <td>{{ $shopping->store }}</td>
                <td>{{ $shopping->amount }}</td>
                <td>{{ $shopping->ppn == "1" ? "Yes" : "No" }}</td>
                <td>{{ $shopping->delivery }}</td>
                <td>{{ $shopping->total }}</td>
                <td>{{ $shopping->promo1 }}</td>
                <td>{{ $shopping->total_bayar }}</td>
                @foreach($shopping->shopping_details as $shopping_detail)
                    @if($shopping_detail->status == 'paid')
                <td>
                    Complete
                </td>
                    @endif
                        @if($shopping_detail->status == 'unpaid')
                            <td>Uncomplete</td>
                        @endif
                @endforeach

                <td class="text-center">
                    <form action="{{ route('shoppings.destroy',$shopping->id) }}" method="POST">

                        <a class="btn btn-info btn-sm" href="{{ route('shoppings.show',$shopping->id) }}">Show</a>

                        <a class="btn btn-primary btn-sm" href="{{ route('shoppings.edit',$shopping->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        {{ $shoppings->links()}}
    </div>

</div>
        <div>
        </div>
    </div>





@endsection
