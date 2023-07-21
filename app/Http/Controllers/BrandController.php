<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }
    public function manage()
    {
        return view('admin.brand.manage',['brands'=> Brand::all()]);
    }
    public function create(Request $request)
    {
        try
        {
            Brand::newBrand($request);
            return back()->with('message','brand has been loaded');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }


    }
    public function edit($id)
    {
        return view('admin.brand.edit',['brand'=> Brand::find($id)]);
    }
    public function update(Request $request, $id)
    {
        try
        {
            Brand::updateBrand($request,$id);
            return redirect('brand/manage')->with('message','brand has been Updated');
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
            Brand::deleteBrand($id);
            return redirect('brand/manage')->with('message','brand has been Delete');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
    }
}
