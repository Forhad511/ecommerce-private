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
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Category</th>
                                <th>Stock Amount</th>
                                <th>Model</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->stock_amount}}</td>
                                    <td>{{$product->model}}</td>
                                    <td>
                                        <img src="{{asset($product->feature_image)}}" alt="" height="80" width="100"/>
                                    </td>
                                    <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}} </td>
                                    <td>
                                        <a href="{{route('details.product',['id'=>$product->id])}}" class="btn btn-info">
                                            <i class="ti-eye"></i>
                                        </a>
                                        <a href="{{route('edit.product',['id'=>$product->id])}}" class="btn btn-success">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('delete.product',['id'=>$product->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?');">
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

