@extends('backend.main')
@section('content')

<div class="text-end mt-4">
    <a class="btn btn-secondary" href="{{ route('invoice.list') }}">Back</a>

</div>

    {{-- @dd($sale->salesEmp->employeeDetail->employeeProfile->contact_no) --}}
<div id="printableArea">

    <div class=" d-flex justify-content-between mb-2 mt-3">
        {{-- <h4 class="text-primary">Date: {{date("Y-M-d",strtotime($sale->created_at))}}</h4> --}}
        <h3 class="invoice">INVOICE #{{$invoice->invoice_no}}</h3>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-left bg-light border p-3">

            <h3 class="border-bottom  title">Customer Info</h3>
            <h5>{{$invoice->customer->f_name}} {{$invoice->customer->l_name}}</h5>
            <p><b>Mobile :</b> +88{{$invoice->customer->phone}}</p>
            <p><b>Email :</b>{{$invoice->customer->email}}</p>
            <p><b>Address :</b> {{$invoice->customer->address}}</p>

    </div>






    @if ($payment)
    <div class=" py-3">
        <table class="table table-bordered mb-2 mt-2 text-center">
            <thead class="text-center table-header">
                <tr>
                    <th>Serial</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Sub Total</th>
                </tr>
            </thead>

            <tbody class="table-light">
                @foreach ($invoiceDetails as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="col-md-3">{{ $item->invoiceItem->name }}</td>
                        <td class="col-md-3"> {{ $item->quantity }}</td>
                        <td class="col-md-3"> {{ $item->price }}</td>
                        <td class="col-md-3"> {{ $item->subtotal }} BDT</td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <strong class="d-flex justify-content-end">Total Amount = </strong>
                    </td>
                    <td>
                        <p>
                            <strong> {{$invoice->total_amount}} BDT</strong>
                        </p>
                    </td>
                </tr>

            </tfoot>
        </table>
    </div>
    @else
        <div class="container form-control p-3">
            <h1 class="text-danger">Not Paid</h1>
            <h3>Total Amount: {{$invoice->total_amount}} BDT</h3>
        </div>
    @endif


    <div class="col-xs-6 col-sm-12 col-md-12 bg-light  border p-3">

        <h3 class="border-bottom  title">Sales By</h3>
        <h5> Admin</h5>
        <p> <strong> Email: </strong>admin@gmail.com</p>

    </div>
</div>
    <div class="mb-5 text-end">
        <div >
            <button class="btn btn-success mt-2 modal-submit fw-bolder " style="width: 120px" onclick="printDiv('printableArea')" >Print</button>
        </div>

    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

    </script>
@endsection

