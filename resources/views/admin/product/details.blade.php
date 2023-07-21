@extends('admin.master')

@section('title')
@endsection

@section('body')
    <div class="row mt-3">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Product Manage</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <tr>
                                <th>Product #ID</th>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Code</th>
                                <td>{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Brand</th>
                                <td>{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Unity</th>
                                <td>{{$product->unit->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Stock</th>
                                <td>{{$product->stock_amount}}</td>
                            </tr>
                            <tr>
                                <th>Product Regular Price</th>
                                <td>{{$product->reguler_price}}</td>
                            </tr>
                            <tr>
                                <th>Product selling Price</th>
                                <td>{{$product->Selling_price}}</td>
                            </tr>
                            <tr>
                                <th>Product Image</th>
                                <td>
                                    <img src="{{asset($product->feature_image)}}" height="100" width="80" alt=""/>
                                </td>
                            </tr>
                            <tr>
                                <th>Product Others Image</th>
                                <td>
                                    @foreach($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->feature_image)}}" height="100" width="80" alt=""/>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Product Discount</th>
                                <td>{{$product->discount}}</td>
                            </tr>
                            <tr>
                                <th>Product Hit Count</th>
                                <td>{{$product->discount}}</td>
                            </tr>
                            <tr>
                                <th>Product Sales Count</th>
                                <td>{{$product->discount}}</td>
                            </tr>
                            <tr>
                                <th>Product Featured Status</th>
                                <td>{{$product->feature_status == 1 ? 'Featured' : 'Not Featured' }}</td>
                            </tr>
                            <tr>
                                <th>Publication Status</th>
                                <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

