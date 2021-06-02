@extends('backend.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        {{-- <a href="{{route('addUser.list')}}" type="button" class="btn btn-success">
            Add User
        </a> --}}
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
                <th scope="col">User Name</th>
                <th scope="col">User Email</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        @foreach ($users as $key => $data)
            <tbody>
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->role }}</td>

                </tr>
            </tbody>
        @endforeach
    </table>

    {{-- modal --}}
    {{-- <div>
        <form>
            @csrf
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Product Name">
                            </div>

                            <div class="mb-3">
                                <label for="">Upload Image</label>
                                <input name="product_image" type="file" class="form-control">
                            </div>


                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="exampleFormControlInput1"
                                    placeholder="500">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Unit Price</label>
                                <input type="double" name="unit_price" class="form-control" id="exampleFormControlInput1"
                                placeholder="1000BDT">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ok</button>
                        </div>
        </form>
    </div>
    </div>
    </div> --}}

@endsection
