@extends('backend.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add User</h1>
</div>
<div class="container p-5">
    <form class="row g-3 d-flex justify-content-center p-5 bg-light shadow border">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">User Name</label>
            <input type="text" class="form-control" name="u_name">
          </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">User Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="c_email" placeholder="Email">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Phone</label>
            <input type="text" class="form-control" id="inputEmail4" name="phone">
          </div>
        <div class="col-6">
          <label for="inputAddress" class="form-label">Address</label>
          <textarea class="form-control" type="text" class="form-control" id="inputAddress" name="address" placeholder="Dhaka,Bangladesh"></textarea>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button  class="btn btn-primary">Cancle</button>
        </div>
      </form>

</div>

@endsection
