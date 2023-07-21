<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }
    public function manage()
    {
        return view('admin.unit.manage',['units'=> Unit::all()]);
    }
    public function create(Request $request)
    {
        try
        {
            Unit::newUnit($request);
            return back()->with('message','unit has been loaded');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }


    }
    public function edit($id)
    {
        return view('admin.unit.edit',['unit'=> Unit::find($id)]);
    }
    public function update(Request $request, $id)
    {
        try
        {
            Unit::updateUnit($request,$id);
            return redirect('unit/manage')->with('message','unit has been Updated');
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
            Unit::deleteUnit($id);
            return redirect('unit/manage')->with('message','unit has been Delete');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
    }
}
