@extends('backend.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Invoices</h1>
        @if (auth()->user()->role == 'admin')
        <a type="button" class="btn btn-success" href="{{route('invoice.create')}}" >
            New Invoice
        </a>
        @endif

    </div>
    @if (session()->has('error-message'))
    <div class="alert alert-danger">
        {{ session()->get('error-message') }}
    </div>
    @endif
    @if (session()->has('success-message'))
        <div class="alert alert-success">
            {{ session()->get('success-message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif




    <table class="table table-success table-striped">
        <thead>
            <tr>

                <th scope="col">serial</th>
                <th scope="col">Invoice No</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        {{-- @dd($list); --}}
        @foreach ($list as $key => $data)
            <tbody>
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{ $data->invoice_no }}</td>
                    <td>{{ $data->customer->f_name}} {{ $data->customer->l_name }} </td>
                    <td>{{ $data->total_amount }}</td>
                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('invoice.view' ,$data['id'])}}"> View</a>
                        <a class="btn btn-danger" href="{{route('invoice.delete' ,$data['id'])}}"> Delete</a>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>



@endsection
