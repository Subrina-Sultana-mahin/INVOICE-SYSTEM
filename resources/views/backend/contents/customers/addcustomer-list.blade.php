@extends('backend.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Customer</h1>
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
<div class="container p-5">
    <form class="row g-3 d-flex justify-content-center p-5 bg-light shadow border" action="{{route('addCustomer.create')}}" method="post">
      @csrf
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">First Name</label>
            <input type="text" class="form-control" name="f_name" placeholder="First Name">
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="l_name" placeholder="last Name">
          </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" id="inputEmail4">
          </div>
        <div class="col-6">
          <label for="inputAddress" class="form-label">Address</label>
          <textarea class="form-control" type="text" class="form-control" id="inputAddress" name="address" placeholder="Dhaka,Bangladesh"></textarea>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button  class="btn btn-primary">Cancel</button>
        </div>
      </form>

</div>

@endsection
