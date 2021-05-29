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
                <th scope="col">Invoice No</th>
                <th scope="col">Customer Id</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        {{-- @foreach ($products as $key => $data) --}}
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a class="text-primary mx-2" href="#"><i class="far fa-eye"></i></a>
                        <a class="text-danger mx-2" href=""><i
                                class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            </tbody>
        {{-- @endforeach --}}
    </table>



@endsection
