@extends('backend.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Expenses Category</h1>
     <a href="{{route('addExpenses.list')}}" type="button" class="btn btn-success">
        Add Expense
    </a>
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
            <th scope="col">Expense Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    {{-- @foreach ($expensesCategory as $key => $data) --}}
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
                <td>
                    <a class="text-primary mx-2" href="#"><i class="far fa-eye"></i></a>
                    <a class="text-danger mx-2" href=""><i
                            class="far fa-trash-alt"></i></a>
                    <a class="text-success mx-2" href=""><i
                            class="far fa-edit"></i></a>
                </td>
            </tr>
        </tbody>
        {{-- @endforeach --}}
</table>

@endsection
