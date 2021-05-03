@extends('admin/admin')

@section('content')

    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tab-show-list-tab" data-toggle="pill" href="#custom-tab-show-list" role="tab"
                       aria-controls="custom-tab-show-list" aria-selected="true">Show List Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tab-history-shopping-tab" data-toggle="pill" href="#custom-tab-history-shopping" role="tab"
                       aria-controls="custom-tab-history-shopping" aria-selected="false">History Payments</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade active show" id="custom-tab-show-list" role="tabpanel" aria-labelledby="custom-tab-show-list-tab">
                    <h2> Show Payments</h2>
                    <div class="float-right">
                        <a class="btn btn-secondary" href="{{ route('payments.index') }}"> Back</a>
                    </div>
                    <form>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Creditor Name:</strong>
                                {{ $payment->user->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Date:</strong>
                                {{ $payment->tanggal_payment }}
                            </div>
                        </div>
                    </form>

                    <div class ="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Create Payments</button>
                        {{-- Start Make Modal --}}
                        <div class ="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create Payments</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form id="detail" action="{{route('payment_details.store')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Creditor Name:</strong>
                                                        <label>
                                                            <input type="text" class="form-control" placeholder="{{$payment->user->name}}" disabled>
                                                        </label>
                                                        <input type="hidden" name="payment_id" value="{{$payment->id}}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Jajanan:</strong>
                                                        <select name="shopping_details_id" id="shopping_details_id">
                                                            @foreach($shopping_details as $shopping_detail)
                                                                <option value="{{$shopping_detail->id}}">{{$shopping_detail->description}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" form="detail" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" form="detail">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th width="20px" class="text-center">Creditor</th>
                                <th width="20px" class="text-center">Store</th>
                                <th width="20px" class="text-center">Price</th>
                                <th width="20px" class="text-center">Promo Payment</th>
                                <th width="20px" class="text-center">Total Payment</th>
                                <th width="20px" class="text-center">Deskripsi</th>
                                <th width="20px"class="text-center">Action</th>
                            </tr></thead>
                            <tbody>
                            @foreach($payment->payment_details as $payment_detail)
                                    <tr>
                                        <td>{{$payment->user->name}}</td>
                                        <td>{{$payment_detail->shopping_details->shoppings->store}}</td>
                                        <td>{{$payment_detail->shopping_details->price_qty}}</td>
                                        <td>{{$payment_detail->shopping_details->promo_borrower}}</td>
                                        <td>{{$payment_detail->total_bayar_payment_borrower}}</td>
                                        <td>{{$payment_detail->shopping_details->description}}</td>
                                        <td class="text-center">
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-content fade" id="custom-tab-history-shopping" role="tabpanel" aria-labelledby="custom-tab-history-shopping-tab">
                    <h2> History Shopping</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="20px" class="text-center">Borrower</th>
                            <th width="20px" class="text-center">Price</th>
                            <th width="20px" class="text-center">Ppn</th>
                            <th width="20px" class="text-center">Promo Borrower</th>
                            <th width="20px" class="text-center">Delivery Borrower</th>
                            <th width="20px" class="text-center">Total Bayar Borrower</th>
                            <th width="20px" class="text-center">Deskripsi</th>
                            <th width="20px" class="text-center">Attachment</th>
                            <th width="20px" class="text-center">Status</th>
                        </tr></thead><tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
            </div>
        </div>
    </div>
@endsection
