@extends('layouts.backend_layouts')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic Table</h4>
        <p class="card-description"> Add class <code>.table</code>
        </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Profile</th>
                <th>Created Order</th>
                <th>Payment Status</th>
                <th>Shiping Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orderLists as $key=>$orderList)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>  {{$orderList->user->name}}</td>
                        <td>53275531</td>
                        <td>{{$orderList->updated_at->format('M d, Y')}}</td>
                        <td><label class="badge badge-success">{{$orderList->payment_status}}</label></td>
                        <td><label class="badge badge-danger">Pending</label></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
