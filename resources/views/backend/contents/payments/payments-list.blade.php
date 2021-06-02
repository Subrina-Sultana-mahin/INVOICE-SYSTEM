@extends('backend.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Payments</h1>
        @if (auth()->user()->role == 'admin')
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Payment
        </button>
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
    @if (session()->has('error-message'))
        <div class="alert alert-danger">
            {{ session()->get('error-message') }}
        </div>
    @endif


    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">serial</th>
                <th scope="col">Invoice No</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Paid Amount</th>
                <th scope="col">Due Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach ($payment as $key => $data)
            <tbody>
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>Invoice#{{ $data->paymentInvoice->invoice_no }}</td>
                    <td>{{ $data->paymentInvoice->total_amount }} BDT</td>
                    <td>{{ $data->paidAmount }} BDT</td>
                    <td>{{ $data->dueAmount }} BDT</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('payment.delete' ,$data['id'])}}"> Delete</a>
                    </td>

                </tr>
            </tbody>
        @endforeach
    </table>
    {{-- @dd($invoice); --}}

    {{-- modal --}}
    <div>
        <form method="post" action="{{ route('payment.create') }}">
            @csrf
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Payment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Invoice No</label>
                                <select class="form-select" name="invoice_id">
                                    <option selected>Select Invoice</option>
                                    @foreach ($invoice as $data)
                                        <option value="{{$data->id}}" >Invoice#{{ $data->invoice_no }} -
                                            @if ($data->invoicePayment)
                                                {{ $data->invoicePayment->dueAmount }} BDT
                                                @else
                                                {{$data->total_amount}}BDT
                                            @endif</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Enter Amount</label>
                                <input name="paidAmount" type="number" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ok</button>
                        </div>
        </form>
    </div>
    </div>
    </div>

@endsection
