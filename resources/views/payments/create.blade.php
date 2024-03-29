@extends('admin/admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2> Create Payments</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('payments.index') }}">Back</a>
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
            <form id="shop"  action="{{route('payments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Creditor:</strong>
                            <select name="creditor_payment_id" id="creditor_payment_id">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <div class="form-group">
                            <strong>Date:</strong>
                            <input type="date" name="tanggal_payment" class="form-control" placeholder="Date">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <div class="form-group">
                            <strong>Bukti Bayar:</strong>
                            <input type="file" name="attachment" class="form-control">
                        </div>
                    </div>

                </div>
                <button type="reset" form="shop" class="btn btn-danger" >Reset</button>
                <button type="submit" form="shop" class="btn btn-success" >Submit</button>

            </form>
        </div></div>
@endsection
