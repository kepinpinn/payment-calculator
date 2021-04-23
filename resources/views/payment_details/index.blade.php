@extends('admin/admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 >INDEX PAYMENT</h2>
            <div class="float-right">
                <a class="btn btn-secondary" > Bayar Hutang</a>
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
                    <th width="280px"class="text-center">Status</th>
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
