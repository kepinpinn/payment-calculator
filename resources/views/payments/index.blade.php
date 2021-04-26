@extends('admin/admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 >HISTORY PAYMENT</h2>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('payments.create') }}"> Bayar Hutang</a>
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
                    <th width="20px" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td class="text-center">{{ ++$i }}</td>
                    <td>{{$payment->user->name}}</td>
                    <td>{{$payment->tanggal_payment }}</td>
                    <td class="text-center">
                        <form action="{{ route('payments.destroy',$payment->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('payments.show',$payment->id) }}">Show</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('payments.edit',$payment->id) }}">Edit</a>

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
        {{ $payments->links()}}
        <div>
        </div>
    </div>

@endsection
