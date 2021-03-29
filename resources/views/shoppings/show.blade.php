@extends('admin/admin')

@section('content')

    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tab-show-list-tab" data-toggle="pill" href="#custom-tab-show-list" role="tab"
                       aria-controls="custom-tab-show-list" aria-selected="true">Show List Shopping</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tab-history-payment-tab" data-toggle="pill" href="#custom-tab-history-payment" role="tab"
                       aria-controls="custom-tab-history-payment" aria-selected="false">History Payment</a>
                </li>
            </ul>
        </div>


    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent" >
            <div class="tab-pane fade active show" id="custom-tab-show-list" role="tabpanel" aria-labelledby="custom-tab-show-list-tab">
                <h2> Show Shopping</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('shoppings.index') }}"> Back</a>
            </div>
            <form>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Creditor Name:</strong>
                        {{ $shopping->nama_kreditor }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date:</strong>
                        {{ $shopping->tanggal }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Store:</strong>
                        {{ $shopping->store }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total Bayar:</strong>
                        {{ $shopping->total_bayar }}
                    </div>
                </div>
            </form>
            <div class ="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>

                        <th width="20px" class="text-center">Borrower</th>
                        <th width="20px" class="text-center">Price</th>
                        <th width="20px" class="text-center">Ppn</th>
                        <th width="20px" class="text-center">Promo Borrower</th>
                        <th width="20px" class="text-center">Delivery Borrower</th>
                        <th width="20px" class="text-center">Total Paid</th>
                        <th width="20px" class="text-center">Deskripsi</th>
                        <th width="20px" class="text-center">Status</th>
                        <th width="280px"class="text-center">Action</th>
                    </tr></thead>
                    <tbody>
                    @foreach($shopping->shopping_details as $shopping_detail)
                        <tr>
                            <td>{{ $shopping_detail->borrower }}</td>
                            <td>{{ $shopping_detail->price_qty }}</td>
                            <td>{{ $shopping_detail->ppn_borrower }}</td>
                            <td>{{ $shopping_detail->promo_borrower }}</td>
                            <td>{{ $shopping_detail->delivery_borrower }}</td>
                            <td>{{ $shopping_detail->total_bayar_borrower }}</td>
                            <td>{{ $shopping_detail->description }}</td>
                            <td>{{ $shopping_detail->status }}</td>
                            <td class="text-center">
                                <form method="POST">

                                    <a class="btn btn-primary btn-sm" href="{{ route('shopping_details.edit',$shopping_detail->id) }}" >Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>@endforeach
                    </tbody>
                </table>
            </div>
            </div>
            <div class="tab-content fade" id="custom-tab-history-payment" role="tabpanel" aria-labelledby="custom-tab-history-payment-tab">
                <h2> History Shopping</h2>
                <table class="table table-bordered">
                    <thead>
                    <tr>

                        <th width="20px" class="text-center">Creditor</th>
                        <th width="20px" class="text-center">Date</th>
                        <th width="20px" class="text-center">Items</th>
                        <th width="20px" class="text-center">Borrower</th>
                        <th width="20px" class="text-center">Total Paid</th>
                        <th width="20px" class="text-center">Attachment</th>
                        <th width="20px" class="text-center">Status</th>
                    </tr></thead>
                </table>
            </div>


        </div>
    </div>

    </div>

@endsection
