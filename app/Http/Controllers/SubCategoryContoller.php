<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryContoller extends Controller
{

    public function index()
    {
        return view('admin.subcategory.index',[
            'categories'=> Category::all(),

        ]);
    }
    public function manage()
    {
        return view('admin.subcategory.manage',[
            'sub_categories'=> SubCategory::all(),
        ]);
    }
    public function create(Request $request)
    {
        try
        {
            SubCategory::newSubCategory($request);
            return back()->with('message','Subcategory has been loaded');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }


    }
    public function edit($id)
    {
        return view('admin.subcategory.edit',[
            'categories'=> Category::all(),
            'sub_category'=> SubCategory::find($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        try
        {
            SubCategory::updateSubCategory($request,$id);
            return redirect('sub-category/manage')->with('message','Sub Category has been Updated');
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
            SubCategory::deleteSubCategory($id);
            return redirect('sub-category/manage')->with('message','Sub Category has been Deleted');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
    }
}
