@extends('admin.master')

@section('title')
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product Form</h4>
                    <hr/>
                    <form class="form-horizontal p-t-20" action="{{route('update.product',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Category Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="categoryId">
                                    <option value="" disabled selected> -- Selected --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected': ''}}> {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Sub Category Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sub_category_id" id="subCategoryId">
                                    <option value="" disabled selected> -- Selected --</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}" {{$sub_category->id == $product->sub_category_id ? 'selected': ''}}> {{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Brand Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="brand_id" name="brandId">
                                    <option value="" disabled selected> -- Selected --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected': ''}}> {{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Unit <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit_id">
                                    <option value="" disabled selected> -- Selected --</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" {{$unit->id == $product->unit_id ? 'selected': ''}}> {{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Name<span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Code <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="code" value="{{$product->code}}"class="form-control" id="" placeholder="Product Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Model </label>
                            <div class="col-sm-9">
                                <input type="text" name="model" value="{{$product->model}}" class="form-control" id="" placeholder="Product Model">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Stock Amount<span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" name="stock_amount" value="{{$product->stock_amount}}" class="form-control" id="" placeholder="Stock Amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Short Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="short_description" id=""  placeholder="Short Description">{{$product->short_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Long Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control summernote" name="long_description" id="" placeholder="Long Description">{{$product->long_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Price<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="reguler_price" value="{{$product->reguler_price}}" id="" placeholder="Reguler Price">
                                    <input type="number" class="form-control" name="Selling_price" value="{{$product->Selling_price}}" id="" placeholder="Selling price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="feature_image" id="input-file-now" class="dropify" accept="image/*"/>
                                <img src="{{asset($product->feature_image)}}" alt="" width="100" height="103"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Others Image <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="others_image[]" multiple id="input-file-now" class="dropify" accept="image/*"/>
                                @foreach($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->feature_image)}}" height="100" width="80" alt=""/>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Published Status*</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1" {{$product->status == 1 ? 'checked' : ''}} >Published</label>
                                <label><input type="radio" name="status" value="2" {{$product->status == 2 ? 'checked' : ''}} >Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update New Product Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
