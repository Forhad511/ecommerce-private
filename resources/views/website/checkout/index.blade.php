@extends('website.master')

@section('title')

@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul class="nav nav-pills">
                            <li><a class="nav-link" href="" data-bs-target="#cash" data-bs-toggle="pill" >Cash On Delivery</a></li>
                            <li><a class="nav-link" href="" data-bs-target="#online" data-bs-toggle="pill">Online Payments</a></li>
                        </ul>
                        <div class="tab-content">
                                <div class="tab-pane fade show active" id="cash">
                                    <form method="POST" action="{{route('new-cash-order')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name</label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            @if(isset($customer->id))
                                                            <input type="text" name="name" value="{{$customer->name}}" readonly placeholder="Full Name" required/>
                                                            @else
                                                            <input type="text" name="name"  placeholder="Full Name" required/>
                                                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email </label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->id))
                                                        <input type="email" name="email" value="{{$customer->email}}" readonly placeholder="Email Address" required/>
                                                        @else
                                                        <input type="email" name="email" placeholder="Email Address" required/>
                                                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Mobile Number</label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->id))
                                                        <input type="number" name="mobile" value="{{$customer->mobile}}" readonly placeholder="Mobile Number" required/>
                                                        @else
                                                        <input type="number" name="mobile" placeholder="Mobile Number" required/>
                                                            <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address</label>
                                                    <div class="form-input form">
                                                        <textarea type="text" name="address" style="padding-top: 10px;height: 100px;" placeholder="Delivery Address" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Payment type</label>
                                                    <div class="">
                                                        <label>
                                                            <input checked name="payment_type" type="radio" value="1"/>Cash On Delivery
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="checkbox" id="checkbox-3" checked/>
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>I accept your trams and condition</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <form action="" method="" enctype="">
                                                        @csrf
                                                        <button type="submit" class="btn" >Confirmed</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <div class="tab-pane fade show" id="online">
                                <div class="col-md-12 order-md-1 px-3">
                                    <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="firstName">Full name</label>
                                                @if(isset($customer->id))
                                                    <input type="text" name="name" value="{{$customer->name}}" class="form-control" id="customer_name" placeholder="" required>
                                                @else
                                                    <input type="text" name="name" class="form-control" id="customer_name" placeholder="" required>
                                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                @endif
                                                <div class="invalid-feedback">
                                                    Valid customer name is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile">Mobile</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">+88</span>
                                                </div>
                                                <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Mobile"/>
                                                <div class="invalid-feedback" style="width: 100%;">
                                                    Your Mobile number is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                   placeholder="you@example.com"  required>
                                            <div class="invalid-feedback">
                                                Please enter a valid email address for shipping updates.
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address">Address</label>
                                            <textarea type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter your shipping address.
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label for="country">Country</label>
                                                <select class="custom-select d-block w-100 form-control" id="country" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid country.
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="state">State</label>
                                                <select class="custom-select d-block w-100 form-control" id="state" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Dhaka">Dhaka</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Zip</label>
                                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Zip code required.
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <label>Payment type</label>
                                            <div class="">
                                                <label>
                                                    <input checked name="payment_type" type="radio" value="2"/>Online
                                                </label>
                                            </div>
                                        </div>
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-33" checked/>
                                            <label for="checkbox-3"><span></span></label>
                                            <p>I accept your trams and condition</p>
                                        </div>
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Shipping Card Summary</h5>
                            <div class="sub-total-price">
                                @php($sum =0)
                                @foreach(ShoppingCart::all() as $item)
                                <div class="total-price">
                                    <p class="value">
                                        {{$item->name}}:
                                        ({{$item->price}}*{{$item->qty}})
                                    </p>
                                    <p class="price">{{$item->price * $item->qty}} BDT</p>
                                    <hr/>
                                </div>
                                    @php($sum= $sum + ($item->price * $item->qty))
                                @endforeach
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subtolal Price:</p>
                                    <p class="price">{{$sum}} BDT</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax Amount(15%):</p>
                                    <p class="price">{{$tax=($sum*15/100)}} BDT</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping:</p>
                                    <p class="price">{{$shipping=100}} BDT</p>
                                </div>

                                <div class="payable-price">
                                    <h6 class="value">Ground Amount:</h6>
                                    <h6 class="price">{{$OrderTotal=$sum+$tax+$shipping}} BDT</h6>
                                </div>
                                <?php
                                    Session::put('order_total', $OrderTotal);
                                    Session::put('tax_total', $tax);
                                    Session::put('shipping_total', $shipping);
                                ?>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
