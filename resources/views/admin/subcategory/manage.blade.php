@extends('admin.master')

@section('title')
@endsection

@section('body')
    <div class="row mt-3">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Table</h4>
                    <h6 class="card-subtitle">Data table example</h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $sub_category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$sub_category->category->name}}</td>
                                <td>{{$sub_category->name}}</td>
                                <td>{{$sub_category->description}}</td>
                                <td>
                                    <img src="{{asset($sub_category->image)}}" alt="" height="80" width="100"/>
                                </td>
                                <td>{{$sub_category->status == 1 ? 'Published' : 'Unpublished'}} </td>
                                <td>
                                    <a href="{{route('edit.sub-category',['id'=>$sub_category->id])}}" class="btn btn-success">
                                        <i class="ti-pencil-alt"></i>
                                    </a>
                                    <a href="{{route('delete.sub-category',['id'=>$sub_category->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?');">
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
