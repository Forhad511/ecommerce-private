<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index()
   {
       return view('admin.category.index');
   }
   public function manage()
   {
       return view('admin.category.manage',[
           'categories'=> Category::all(),
       ]);
   }
   public function create(Request $request)
   {
       try
       {
           Category::newCategory($request);
           return back()->with('message','Category has been loaded');
       }
       catch (\Exception $exception)
       {
           return back()->with('error', $exception->getMessage());
       }


   }
    public function edit($id)
    {
        return view('admin.category.edit',['category'=> Category::find($id)]);
    }
    public function update(Request $request, $id)
    {
        try
        {
            Category::updateCategory($request,$id);
            return redirect('category/manage')->with('message','Category has been Updated');
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
            Category::deleteCategory($id);
            return redirect('category/manage')->with('message','Category has been Delete');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
    }


}
