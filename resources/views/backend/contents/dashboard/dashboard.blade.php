@extends('backend.main')
@section('content')

{{-- 1st row --}}
<div class="row m-3">
    <div class="col-md-4 ">
        <div class="card  text-white shadow" style="background-color:rgb(104, 222, 226); width: 20rm; height:10rem;">
            <div class="card-body">
                <h5><span data-feather="alert-octagon"></span>
                    <small>Total Number Items</small></h5>
                <h1>{{ $itemCount }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card text-white shadow" style="background-color:rgb(226, 183, 104); width: 20rm; height:10rem">
            <div class="card-body">
                <h5><span data-feather="package"></span>
                    <small>Total Number of Customers</small> </h5>
                <h1> {{ $customerCount }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card text-white shadow" style="background-color:rgb(207, 223, 136);width: 20rm;height:10rem;">
            <div class="card-body">
                <h5><span data-feather="settings"></span>
                    <small>Total Sale</small> </h5>
                <h1>BDT {{ $totalSale }}</h1>
            </div>
        </div>
    </div>
</div>
{{-- 2nd row --}}
<div class="row m-3">
    <div class="col-md-4 ">
        <div class="card text-white shadow" style="background-color:rgb(147, 114, 156);width: 20rm;height:10rem;">
            <div class="card-body">
                <h5><span data-feather="activity"></span>
                    <small>Todays Sale</small></h5>
                <h1> BDT {{ $todaysSale }} </h1>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card bg-success text-white shadow" style="width: 20rm;height:10rem;">
            <div class="card-body">
                <h5><span data-feather="truck"></span>
                    <small>Total Paid Today</small></h5>
                <h1>BDT {{ $todaysPaid }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card text-white shadow" style="background-color:rgb(194, 163, 165); width: 20rm; height:10rem">
            <div class="card-body">
                <h5><span data-feather="users"></span>
                    <small>Due Payment</small> </h5>
                <h1>BDT {{ $todaysDue }}</h1>
            </div>
        </div>
    </div>
</div>
@if(auth()->user()->role == 'superAdmin')
{{-- 3rd row --}}
<div class="row m-3">
    <div class="col-md-4 ">
        <div class="card text-white shadow" style="background-color:rgb(109, 71, 96); width: 20rm;height:10rem;">
            <div class="card-body">
                <h5><span data-feather="alert-triangle"></span>
                    <small>Total User</small> </h5>
                <h1>{{ $users }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card text-white shadow" style="background-color:rgb(221, 245, 116);width: 20rm; height:10rem">
            <div class="card-body">
                <h5><span data-feather="user-x"></span>
                    <small>Total Expenses</small> </h5>
                <h1>BDT {{ $totalExpense }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card text-white shadow" style="background-color:rgb(102, 101, 136); width: 20rm;height:10rem;">
            <div class="card-body">
                <h5><span data-feather="git-merge"></span>
                    <small>Todays Expenses</small> </h5>
                <h1>BDT {{ $totalExpense }}</h1>
            </div>
        </div>
    </div>





</div>

@endif
@endsection
