@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tutorial CRUD Laravel 8 untuk Pemula - Ilmucoding.com</h2>
            </div>

            <div class="float-right">
                <a class="btn btn-success" href="{{ route('shoppings.create') }}"> Create Shopping</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="20px" class="text-center">Creditor</th>
            <th width="20px" class="text-center">Date</th>
            <th width="20px" class="text-center">Items</th>
            <th width="20px" class="text-center">Amount</th>
            <th width="20px" class="text-center">PPn</th>
            <th width="20px" class="text-center">Delivery</th>
            <th width="20px" class="text-center">Total</th>
            <th width="20px" class="text-center">Promo</th>
            <th width="20px" class="text-center">Total Bayar</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($shoppings as $shopping)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $shopping->nama_kreditor }}</td>
                <td>{{ $shopping->tanggal }}</td>
                <td>{{ $shopping->items }}</td>
                <td>{{ $shopping->Amount }}</td>
                <td>{{ $shopping->ppn }}</td>
                <td>{{ $shopping->delivery }}</td>
                <td>{{ $shopping->total }}</td>
                <td>{{ $shopping->promo }}</td>
                <td>{{ $shopping->total_bayar }}</td>
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
        @endforeach
    </table>

    {!! $shoppings->links() !!}

@endsection
