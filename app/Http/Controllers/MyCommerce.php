<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class MyCommerce extends Controller
{
    public function index()
    {
        return view('website.home.index',
            [
                'products'   =>Product::orderBy('id','desc')->take('8')->get(['id','name','category_id','feature_image','Selling_price']),
                'product'   =>Product::orderBy('id','desc')->take('6')->get(['id','name','category_id','feature_image','Selling_price']),
                'offer'   =>Product::orderBy('id','asc')->take('3')->get(['id','name','category_id','feature_image','Selling_price']),
            ]);
    }

    public function category($id)
    {
        return view('website.category.index',[
            'products' => Product::where('category_id', $id)->orderBy('id','desc')->get(),
        ]);
    }

    public function product()
    {
        return view('website.product.index');
    }

    public function details($id)
    {
        return view('website.details.index',['product' => Product::find($id)]);
    }

    public function cart()
    {
        return view('website.cart.index');
    }
    public function about()
    {
        return view('website.about.index');
    }
    public function contact()
    {
        return view('website.contact.index');
    }
}
