@extends('admin.master')

@section('title')
@endsection

@section('body')
    <div class="row mt-3">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Information</h4>
                    <div class="table-responsive m-t-40">
                        <table id="" class="table table-striped border">
                            <tr>
                                <th>#Order ID</th>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{$order->order_date}}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{$order->order_total}}</td>
                            </tr>
                            <tr>
                                <th>Tax Total</th>
                                <td>{{$order->tax_total}}</td>
                            </tr>
                            <tr>
                                <th>Shipping Total</th>
                                <td>{{$order->shipping_total}}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>{{$order->shipping_status}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <td>{{$order->delivery_address}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Status</th>
                                <td>{{$order->delivery_address}}</td>
                            </tr>
                            <tr>
                                <th>Payment  Type</th>
                                <td>{{$order->payment_type == 1 ? 'Cash' : 'Online'}}</td>
                            </tr>
                            <tr>
                                <th>Payment  Status</th>
                                <td>{{$order->payment_status}}</td>
                            </tr>
                            <tr>
                                <th>Currency</th>
                                <td>{{$order->currency}}</td>
                            </tr>
                            <tr>
                                <th>Tranjection ID</th>
                                <td>{{$order->transaction_id}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Information</h4>
                    <div class="table-responsive m-t-40">
                        <table id="" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Order Amount</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderDetails as $orderDetail)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <th>{{$orderDetail->product_name}}</th>
                                <th>{{$orderDetail->product_price}}</th>
                                <th>{{$orderDetail->product_product_qty}}</th>
                                <th>{{$orderDetail->product_product_qty * $orderDetail->product_price}}</th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customer Information</h4>
                    <div class="table-responsive m-t-40">
                        <table id="" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Mobile</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$order->customer->name}}</td>
                                <td>{{$order->customer->email}}</td>
                                <td>{{$order->customer->mobile}}</td>
                                <td>{{$order->customer->address}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
