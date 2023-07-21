<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerOrderControll extends Controller
{
    private $order;

    public function allOrder()
    {
        $this->order = Order::where('customer_id',Session::get('customer_id'))->get();
        return view('customer.order',['orders'=>$this->order]);
    }
}
