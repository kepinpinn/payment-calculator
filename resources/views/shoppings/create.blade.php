@extends('admin/admin')

@section('content')
    <div class="card">
    <div class="card-header">
                <h2> Create Shopping</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('shoppings.index') }}">Back</a>
            </div>

        </div>

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
    <div class="card-body">
    <form id="shop" action="{{route('shoppings.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Creditor:</strong>
                    <select name="user_id" id="user_id">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="tanggal" class="form-control" placeholder="Date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Store:</strong>
                    <input type="text" name="store" class="form-control" placeholder="Store">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="number" name="amount" class="form-control" placeholder="Amount">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>PPn:</strong>
                    <input type="checkbox" name="ppn" class="custom-checkbox" placeholder="PPn">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Delivery:</strong>
                    <input type="number" name="delivery" class="form-control" placeholder="Delivery">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total:</strong>
                    <input type="number" name="total" class="form-control" placeholder="Total">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Promo:</strong>
                    <input type="number" name="promo1" class="form-control" placeholder="Promo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Bayar:</strong>
                    <input type="number" name="total_bayar" class="form-control" placeholder="Total Bayar">
                </div>
            </div>
        </div>
<!--
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Create Detail Shopping</button>
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
                        <form action="{{route('shopping_details.store') }}" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Borrower:</strong>
                                        <input type="text" name="borrower" class="form-control" placeholder="Borrower">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Price:</strong>
                                        <input type="number" name="price" class="form-control" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>PPn:</strong>
                                        <input type="checkbox" name="ppn" class="form-control" placeholder="PPn">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Promo:</strong>
                                        <input type="text" name="promo" class="form-control" placeholder="Promo">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Total Bayar Borrower:</strong>
                                        <input type="text" name="total_bayar_borrower" class="form-control" placeholder="Total Bayar Borrower">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Deskripsi:</strong>
                                        <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Deskripsi"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    <table class="table table-bordered" method="POST">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="20px" class="text-center">Borrower</th>
            <th width="20px" class="text-center">Price</th>
            <th width="20px" class="text-center">Ppn</th>
            <th width="20px" class="text-center">Promo Borrower</th>
            <th width="20px" class="text-center">Total Bayar Borrower</th>
            <th width="20px" class="text-center">Deskripsi</th>
            <th width="20px" class="text-center">Status</th>
            <th width="280px" class="text-center">Action</th>
        </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center">

                        <a class="btn btn-primary btn-sm">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>

                </td>
            </tr>

    </table>
-->
        <button type="reset" form="shop" class="btn btn-danger" >Reset</button>
        <button type="submit" form="shop" class="btn btn-success" >Submit</button>

    </form>
    </div>
    </div>
@endsection
