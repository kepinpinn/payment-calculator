@extends('admin/admin')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>INDEX PAYMENT</h2>
            </div>

            <div class="float-right">
                <a class="btn btn-success" href="{{ route('payments.create') }}"> Create Payment</a>
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
            <th width="20px" class="text-center">Borrower</th>
            <th width="20px" class="text-center">Price Qty</th>
            <th width="20px" class="text-center">Ppn Borrower</th>
            <th width="20px" class="text-center">Presentase</th>
            <th width="20px" class="text-center">Promo Borrower</th>
            <th width="20px" class="text-center">Total Paid Borrower</th>
            <th width="20px" class="text-center">Description</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
    </table>

    {!! $payments->links() !!}

@endsection
