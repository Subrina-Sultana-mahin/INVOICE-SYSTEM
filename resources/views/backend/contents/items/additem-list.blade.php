@extends('backend.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">New Item</h1>
</div>
<div class="container p-5">
    <form class="row g-3 d-flex justify-content-center p-5 bg-light shadow border" action="{{route('addItem.create')}}" method="post">
        @csrf
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Name">
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Price</label>
            <input type="double" class="form-control" id="inputEmail4" name="price">
          </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Unit</label>
          <input type="double" class="form-control" id="inputEmail4" name="unit">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Date</label>
            <input type="date" class="form-control" id="inputEmail4" name="date">
          </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Save Item</button>
          <button  class="btn btn-primary">Cancle</button>
        </div>
      </form>

</div>

@endsection
