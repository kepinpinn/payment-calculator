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
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade active show" id="custom-tab-show-list" role="tabpanel" aria-labelledby="custom-tab-show-list-tab">
                <h2> Show Shopping</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('shoppings.index') }}"> Back</a>
            </div>
            <form>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Creditor Name:</strong>
                        {{ $shopping->user->name }}
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
                        <strong>Amount:</strong>
                        {{ $shopping->amount }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>PPn:</strong>
                        {{ $shopping->ppn == "1" ? "Yes" : "No" }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Delivery:</strong>
                        {{ $shopping->delivery }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Promo:</strong>
                        {{ $shopping->promo1 }}
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Create Detail Shopping</button>
                {{-- Start Make Modal --}}
                <div class ="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create Detail Shopping</h4>
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
                                <form id="detail" action="{{route('shopping_details.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Creditor Name:</strong>
                                                <label>
                                                    <input type="text" class="form-control" placeholder="{{$shopping->user->name}}" disabled>
                                                </label>
                                                <input type="hidden" name="shopping_id" value="{{$shopping->id}}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Borrower:</strong>
                                                <select name="borrower" id="borrower">
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Price:</strong>
                                                <input type="number" name="price_qty" class="form-control" placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Deskripsi:</strong>
                                                <textarea class="form-control" style="height:150px" name="description" placeholder="Deskripsi"></textarea>
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
                {{-- Start Edit Modal --}}
                {{--
                <div class ="modal fade" id="modal_edit" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Detail Shopping</h4>
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
                                <form id="detail_edit" action="{{ route('shopping_details.update','') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-2">
                                                <strong>Creditor Name:</strong>
                                                <input type="text" class="form-control" placeholder="{{$shopping->user->name}}" disabled>
                                                <input type="hidden" name="shopping_id" value="{{$shopping->id}}">
                                            </div>
                                        </div>

                                        @foreach($shopping->shopping_details as $shopping_detail)
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-2">
                                                <strong>Borrower:</strong>
                                                <select name="borrower" id="borrower">
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-2">
                                                <strong>Price:</strong>
                                                <input type="number" value="{{$shopping_detail->price_qty}}" name="price_qty" class="form-control" placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-2">
                                                <strong>PPn:</strong>
                                                <input type="checkbox" value="{{$shopping_detail->ppn_borrower}}" name="ppn_borrower" class="form-control" placeholder="PPn">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-2">
                                                <strong>Promo:</strong>
                                                <input type="number" value="{{$shopping_detail->promo_borrower}}" name="promo_borrower" class="form-control" placeholder="Promo">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-2">
                                                <strong>Delivery:</strong>
                                                <input type="number" value="{{$shopping_detail->delivery_borrower}}" name="delivery_borrower" class="form-control" placeholder="Delivery Borrower">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-2">
                                                <strong>Total Bayar Borrower:</strong>
                                                <input id="total_bayar_borrower" value="{{$shopping_detail->total_bayar_borrower}}" name="total_bayar_borrower" class="form-control" readonly placeholder="Total Bayar Borrower">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-2">
                                                <strong>Deskripsi:</strong>
                                                <textarea class="form-control" value="{{$shopping_detail->description}}" style="height:150px" name="description" placeholder="Deskripsi"></textarea>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" form="detail_edit" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" form="detail_edit">Save Changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div> --}}
                <table class="table table-bordered">
                    <thead>
                    <tr>

                        <th width="20px" class="text-center">Borrower</th>
                        <th width="20px" class="text-center">Price</th>
                        <th width="20px" class="text-center">Promo Borrower</th>
                        <th width="20px" class="text-center">Total Bayar Borrower</th>
                        <th width="20px" class="text-center">Deskripsi</th>
                        <th width="20px" class="text-center">Status</th>
                        <th width="280px"class="text-center">Action</th>
                    </tr></thead>
                    <tbody>
                    @foreach($shopping->shopping_details as $shopping_detail)
                        @if($shopping_detail->status == 'unpaid')
                        <tr>
                            <td>{{ $shopping_detail->user->name }}</td>
                            <td>{{ $shopping_detail->price_qty }}</td>
                            <td>{{ $shopping_detail->promo_borrower }}</td>
                            <td>{{ $shopping_detail->total_bayar_borrower }}</td>
                            <td>{{ $shopping_detail->description }}</td>
                            <td>{{ $shopping_detail->status }}</td>
                            <td class="text-center">
                                <form action="{{ route('shopping_details.destroy',$shopping_detail->id) }}" method="POST">

                                    <a class="btn btn-primary btn-sm" href="{{ route('shopping_details.edit',$shopping_detail->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>

                            </td>
                        </tr>@endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>

            <div class="tab-content fade" id="custom-tab-history-payment" role="tabpanel" aria-labelledby="custom-tab-history-payment-tab">
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
                    @foreach($shopping->shopping_details as $shopping_detail)
                        @if($shopping_detail->status == 'paid')
                        <tr>
                            <td>{{ $shopping_detail->user->name }}</td>
                            <td>{{ $shopping_detail->price_qty }}</td>
                            <td>{{ $shopping_detail->ppn_borrower }}</td>
                            <td>{{ $shopping_detail->promo_borrower }}</td>
                            <td>{{ $shopping_detail->delivery_borrower }}</td>
                            <td>{{ $shopping_detail->total_bayar_borrower }}</td>
                            <td>{{ $shopping_detail->description }}</td>
                            <td>{{ $shopping_detail->attachment }}</td>
                            <td>{{ $shopping_detail->status }}</td>
                        </tr>@endif
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        </div>
    </div>
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">


        $('.dialog-edit').on('click', function () {
            var modalDom = $('#modal_edit');
            var dataId = $(this).data('id')

            modalDom.modal('show');

            var actionValue = modalDom.find('form').attr('action')
            modalDom.find('form').attr('action', actionValue +'/'   + dataId)
        });

        $('.form-group').on('input','.prc','.pr',function (){
            var totalSum = 0;
            $('.form-group .prc').each(function (){
                var inputVal = $(this).val();
                if($.isNumeric(inputVal)){
                    totalSum += parseFloat(inputVal);
                }
            });
            $('#total_bayar_borrower').val(totalSum);
        })
        $('.form-group-2').on('input','.prc','.pr',function (){
            var totalSum = 0;
            $('.form-group .prc').each(function (){
                var inputVal = $(this).val();
                if($.isNumeric(inputVal)){
                    totalSum += parseFloat(inputVal);
                }
            });
            $('#total_bayar_borrower').val(totalSum);
        })

    </script>
-->
@endsection
