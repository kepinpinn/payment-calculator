@extends('admin/admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 >INDEX PAYMENT</h2>
            <div class="float-right">
                <a class="btn btn-secondary"  href="{{ route('shopping_details.create') }}"> Bayar Hutang</a>
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
                  <!--  <th width="20px" class="text-center">Date</th> -->
                    <th width="20px" class="text-center">Store</th>
                    <th width="20px" class="text-center">Amount</th>

                    <th width="20px" class="text-center">Total Bayar</th>
                    <th width="280px"class="text-center">Attachment</th>
                    <th width="280px"class="text-center">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($shopping_details as $shopping_detail)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $shopping_detail->user->name}}</td>
                     <!--   <td>{{ $shopping_detail->tanggal }}</td> -->
                        <td>{{ $shopping_detail->store }}</td>
                        <td>{{ $shopping_detail->price_qty }}</td>
                        <td>{{ $shopping_detail->total_bayar_borrower }}</td>
                        <td>{{ $shopping_detail->attachment }}</td>
                        <td>{{ $shopping_detail->status }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pull-right">
                {{ $shopping_details->links()}}
            </div>

        </div>
        <div>
        </div>
    </div>





@endsection
