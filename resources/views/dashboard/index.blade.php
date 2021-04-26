@extends('admin/admin')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>150</h3>
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
                    <h3>150</h3>
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
                    <h3>150</h3>
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
            <h2>HOETANG</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('payment_details.create') }}"> Bayar Hutang</a>
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
                    <th width="20px" class="text-center">Total Bayar</th>
                    <th width="20px"class="text-center">Status</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>

                </tbody>
            </table>

        </div>
        <div>
        </div>
    </div>






@endsection
