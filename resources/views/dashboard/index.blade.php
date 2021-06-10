@extends('admin/admin')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$hutang}}</h3>
                <p>Total Hutang</p>
            </div>
            <div class="icon">
               <i class="ion ion-bag"></i>
            </div>

        </div>

    </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$total_piutang}}</h3>
                    <p>Total Piutang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bar"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$total_spend}}</h3>
                    <p>Total Spend</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>UTANG</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('payments.create') }}"> Bayar Utang</a>
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
                    <th width="20px" class="text-center">Borrower</th>
                    <th width="20px" class="text-center">Total Bayar</th>
                    <th width="20px" class="text-center">Description</th>
                    <th width="20px"class="text-center">Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($shopping_details as $shopping_detail)
                    @if($shopping_detail->status == 'unpaid' and $shopping_detail->borrower == Auth::user()->id)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $shopping_detail->shoppings->user->name }}</td>
                        <td>{{ $shopping_detail->user->name }}</td>
                        <td>{{ $shopping_detail->total_bayar_borrower }}</td>
                        <td>{{ $shopping_detail->description }}</td>
                        <td>{{ $shopping_detail->status }}</td>

                    </tr>
                    @endif
                @endforeach

                </tbody>
            </table>

        </div>
        <div>
        </div>
    </div>






@endsection
