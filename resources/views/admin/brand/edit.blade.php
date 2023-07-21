@extends('admin.master')

@section('title')
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Brand Form</h4>
                    <hr/>
                    <form class="form-horizontal p-t-20" action="{{route('update.brand',['id'=>$brand->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{$brand->name}}" class="form-control" id="exampleInputuname3" placeholder="Brand Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Brand Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="description" value="{{$brand->description}}" id="exampleInputEmail3" placeholder="Description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Category Image <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify"/>
                                <img src="{{asset($brand->image)}}" alt="" height="100" width="100"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Published Status*</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" {{$brand->status == 1 ? 'checked' : ''}} value="1" checked>Published</label>
                                <label><input type="radio" name="status" {{$brand->status == 2 ? 'checked' : ''}} value="2" >Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
