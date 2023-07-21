@extends('admin.master')

@section('title')
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Sub Category Form</h4>
                    <hr/>
                    <form class="form-horizontal p-t-20" action="{{route('update.sub-category',['id'=>$sub_category->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Category Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value="" disabled selected> -- Selected --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $sub_category->category->id ? 'selected' : '' }}> {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Sub Category Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="" value="{{$sub_category->name}}" placeholder="Sub Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Category Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="" placeholder="Sub CategoryDescription">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Category Image <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify"/>
                                <img src="{{asset($sub_category->image)}}" alt="" width="130" height="100"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Published Status*</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" {{$sub_category->status == 1 ? 'checked' : '' }} value="1" checked>Published</label>
                                <label><input type="radio" name="status" {{$sub_category->status == 2 ? 'checked' : '' }}  value="2" >Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
