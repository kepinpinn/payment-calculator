@extends('admin/admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2> Create Payments</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('dashboard.index') }}">Back</a>
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
            <form id="shop" action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Creditor:</strong>
                            <select name="borrower" id="borrower">
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
                            <input type="number" name="amount" class="form-control prc" placeholder="Amount">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>PPn:</strong>
                            <input type="checkbox" name="ppn" class="custom-checkbox"value="1" {{ old('1') ? 'checked="checked"' : '' }}/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Delivery:</strong>
                            <input type="number" name="delivery" class="form-control prc" placeholder="Delivery">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Promo:</strong>
                            <input type="number" name="promo1" class="form-control pr" placeholder="Promo">
                        </div>
                    </div>
                </div>
                <button type="reset" form="shop" class="btn btn-danger" >Reset</button>
                <button type="submit" form="shop" class="btn btn-success" >Submit</button>

            </form>
        </div></div>
@endsection
