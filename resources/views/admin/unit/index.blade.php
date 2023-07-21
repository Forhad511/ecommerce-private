@extends('admin.master')

@section('title')
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Brand Form</h4>
                    <hr/>
                    <form class="form-horizontal p-t-20" action="{{route('create.unit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="exampleInputuname3" placeholder="Unit Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Code <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="code" class="form-control" id="exampleInputuname3" placeholder="Unit Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Unit Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="description" id="exampleInputEmail3" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Published Status<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1" checked>Published</label>
                                <label><input type="radio" name="status" value="2" >Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create new Unit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
