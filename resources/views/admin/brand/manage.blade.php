@extends('admin.master')

@section('title')
@endsection

@section('body')
    <div class="row mt-3">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Table</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Brand Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->description}}</td>
                                    <td>
                                        <img src="{{asset($brand->image)}}" alt="" height="80" width="100"/>
                                    </td>
                                    <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}} </td>
                                    <td>
                                        <a href="{{route('edit.brand',['id'=>$brand->id])}}" class="btn btn-success">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('delete.brand',['id'=>$brand->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?');">
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
