<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OthersImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function index()
    {
        return view('admin.product.index',[
            'categories'         => Category::all(),
            'sub_categories'     => SubCategory::all(),
            'brands'             => Brand::all(),
            'units'              => Unit::all(),
        ]);
    }
    public function getSubcategoryByCategory()
    {
        return response()->json(SubCategory::where('category_id',$_GET['id'])->get());
    }


    public function manage()
    {
        return view('admin.product.manage',[
            'products'=> Product::all(),
        ]);
    }

    public function create(Request $request)
    {

        try
        {

            $this->product = Product::newProduct($request);
            OthersImage::newOthersImage($request->others_image, $this->product->id);
            return back()->with('message','Product has been Loaded');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }


    }

    public function edit($id)
    {
        return view('admin.product.edit',[
            'product'            => Product::find($id),
            'categories'         => Category::all(),
            'sub_categories'     => SubCategory::all(),
            'brands'             => Brand::all(),
            'units'              => Unit::all(),
        ]);
    }

    public function details($id)
    {
        return view('admin.product.details',['product'=> Product::find($id)]);
    }



    public function update(Request $request, $id)
    {
        try
        {
            $this->product=Product::updateProduct($request,$id);
            if ($request->others_image)
            {
                OthersImage::updateOthersImage($request->others_image, $this->product->id);
            }
            return redirect('product/manage')->with('message','Product has been Updated');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try
        {
            Product::deleteProduct($id);
            OthersImage::deleteOthersImage($id);
            return redirect('product/manage')->with('message','Product has been Delete');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
    }

}
