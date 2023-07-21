@extends('admin.master')

@section('title')
@endsection

@section('body')
    <div class="row mt-3">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Order Information</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Customer Info</th>
                                <th>Total Order</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->customer->name. '(' .$order->customer->mobile. ')'}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{$order->shipping_status}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>
                                        <a href="{{route('admin.edit.order',['id'=>$order->id])}}" class="btn btn-success">
                                            <i class="ti-pencil-alt" title="Edit Order"></i>
                                        </a>
                                        <a href="{{route('admin.details.order',['id'=>$order->id])}}" class="btn btn-danger" title="View Order Details">
                                            <i class="ti-eye"></i>
                                        </a>
                                        <a href="" class="btn btn-dark" title="View Order Invoice">
                                            <i class="ti-infinite"></i>
                                        </a>
                                        <a href="" class="btn btn-cyan" title="Print Invoice">
                                            <i class="ti-printer"></i>
                                        </a>
                                        <a href="" class="btn btn-primary" title="Order Delete" onclick="return confirm('Are you sure?');">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
