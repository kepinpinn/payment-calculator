@extends('admin/admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 >EDIT DETAIL SHOPPING</h2>
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
            <form  action="{{ route('shopping_details.update',$shopping_detail->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group-2">
                            <strong>Borrower:</strong>
                            <select name="borrower" id="borrower">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" {{ $user->id == $shopping_detail->borrower ? "selected" : '' }}>{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Price Qty:</strong>
                            <input type="number" name="price_qty" value="{{$shopping_detail->price_qty}}" class="form-control" placeholder="Store">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" style="height:150px" name="description">{{ $shopping_detail->description }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success" >Save</button>
            </form>
        </div>
    </div>

@endsection
