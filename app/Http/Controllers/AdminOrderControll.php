<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderControll extends Controller
{
    public function index()
    {
        return view('admin.order.index',[
            'orders'=>Order::orderBy('id','desc')->get()
        ]);
    }
    public function edit($id)
    {
        return view('admin.order.edit',[
            'order'=>Order::find($id)
        ]);
    }
    public function details($id)
    {
        return view('admin.order.details',[
            'order'=>Order::find($id),
            'details'=>Order::all(),
        ]);
    }
    public function invoiceView($id)
    {
        return view('admin.order.invoiceView',['order'=>Order::find($id)]);
    }
    public function invoicePrint($id)
    {
        return view('admin.order.invoicePrint',['order'=>Order::find($id)]);
    }

}
