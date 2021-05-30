@extends('backend.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Items</h1>
        @if (auth()->user()->role == 'superAdmin')
        <a href="{{route('addItem.list')}}" type="button" class="btn btn-success">
            Add Item
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
                <th scope="col">Name</th>
                <th scope="col">Unit</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        {{-- @dd($item) --}}
        @foreach ($item as $key => $data)
            <tbody>
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->unit}}</td>
                    <td>{{$data->price}}BDT</td>
                    <td>{{$data->date}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('item.delete' ,$data['id'])}}"> Delete</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
    </table>

    {{-- modal --}}



@endsection
