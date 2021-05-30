@extends('backend.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customers</h1>
        @if (auth()->user()->role == 'admin')
            <a href="{{ route('addCustomer.list') }}" type="button" class="btn btn-success">
                Add Customer
            </a>
        @endif

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success-message'))
        <div class="alert alert-success">
            {{ session()->get('success-message') }}
        </div>
    @endif


    <table class="table table-success table-striped">
        <thead>
            <tr>

                <th scope="col">serial</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Customer Email</th>
                <th scope="col"> Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach ($customer as $key => $data)
            <tbody>
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $data->f_name }} {{ $data->l_name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('customer.delete',$data['id'])}}"> Delete</a>
                        {{-- <a class="btn btn-danger" href="{{route('customer.edit')}}"> Edit </a> --}}
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>



@endsection
