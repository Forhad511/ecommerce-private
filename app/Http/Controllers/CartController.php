<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;

class CartController extends Controller
{
    private $product ;
    public function index(Request $request,$id)
    {
        $this->product =Product::find($id);
        ShoppingCart::add($this->product->id, $this->product->name, $request->qty, $this->product->Selling_price,['feature_image' => $this->product->feature_image, 'category' => $this->product->category,'brand' => $this->product->brand]);
        return redirect('/product/cart');
    }
    public function show()
    {
        return view('website.cart.index',[
            'cart_products' => ShoppingCart::all(),
        ]);
    }
    public function remove($id)
    {
        ShoppingCart::remove($id);
        return redirect('/product/cart')->with('message','Cart Items has been Deleted');
    }
    public function update(Request $request,$id)
    {
        ShoppingCart::update($id,$request->qty);
        return redirect('/product/cart')->with('message','Cart Items has been Updated');
    }
}
