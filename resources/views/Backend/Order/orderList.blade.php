@extends('layouts.backend_layouts')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Order List</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Profile</th>
                <th>Order Status</th>
                <th>Payment Status</th>
                <th>Shiping Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orderLists as $key=>$orderList)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>  {{$orderList->user->name}}</td>
                        <td>{{$orderList->updated_at->format('M d, Y')}}</td>
                        <td><label class="badge badge-success">{{$orderList->payment_status}}</label></td>
                        <td> 
                          <form action="{{route('order.status.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$orderList->id}}">
                            <select id="dropdown" name="data" class="badge badge-success" onchange="this.form.submit()">
                                <option value="Pending"
                                 @php
                                    if($orderList->shiping_status == "Pending"){
                                      echo "selected";
                                    }
                                @endphp >Pending</option>
                                <option value="Shiped"  @php  if($orderList->shiping_status == "Shiped"){
                                  echo "selected";
                                }
                                @endphp>Shiped</option>
                                <option value="Done"  @php  if($orderList->shiping_status == "Done"){
                                  echo "selected";
                                }
                                @endphp>Done</option>
                            </select>
                          </form>
                      </td>
                    </tr>
                 @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
@endsection
