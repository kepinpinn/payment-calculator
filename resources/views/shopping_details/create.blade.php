@extends('admin/admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 >Bayar Hutang</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('shopping_details.index') }}">Back</a>
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
    <form action="" method="POST">
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
                    <input type="checkbox" name="ppn" class="custom-checkbox" placeholder="PPn">
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
                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </form>
        </div>
    </div>
@endsection
