@extends('admin/admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 >EDIT SHOPPING</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('shoppings.index') }}"> Back</a>
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
<form  action="{{ route('shoppings.update',$shopping->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="date" value="{{$shopping->tanggal}}" class="form-control" placeholder="Date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Store:</strong>
                <input type="text" name="store" value="{{$shopping->store}}" class="form-control" placeholder="Store">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                <input type="number" name="amount"value="{{$shopping->amount}}" class="form-control prc" placeholder="Amount">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PPn:</strong>
                <input type="checkbox" name="ppn" value="{{$shopping->ppn}}" class="custom-checkbox" placeholder="PPn">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Delivery:</strong>
                <input type="number" name="delivery" value="{{$shopping->delivery}}" class="form-control prc" placeholder="Delivery">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Promo:</strong>
                <input type="number" name="promo1" value="{{$shopping->promo1}}"class="form-control" placeholder="Promo">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" >Save</button>
</form>
            <!--
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $('.form-group').on('input','.prc','.pr',function (){
                    var totalSum = 0;
                    $('.form-group .prc').each(function (){
                        var inputVal = $(this).val();
                        if($.isNumeric(inputVal)){
                            totalSum += parseFloat(inputVal);
                        }
                    });
                    $('#total',).val(totalSum);
                    $('#total_bayar').val(totalSum);
                })
            </script> -->
        </div>
    </div>

@endsection
