<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use ShoppingCart;

class CheckoutController extends Controller
{
    private $customer,$order,$orderDetail;
    public function index()
    {
        if (Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = '';
        }
        return View('website.checkout.index',['customer' => $this->customer]);
    }

    public function OrderCustomerValidate($request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:customers,email',
            'mobile'=>'required|unique:customers,mobile',
            'address'=>'required',
        ]);
    }

    public function newCashOrder(Request $request)
    {
        if (Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->OrderCustomerValidate($request);
            $this->customer=Customer::newCustomer($request);
            Session::put('customer_id',$this->customer->id);
            Session::put('customer_name',$this->customer->name);
        }
        $this->order = Order::newOrder($request,$this->customer->id);
        OrderDetail::newOrderDetails($this->order->id);
        return redirect('/completed-order')->with('message','Congratulation.....You order on our System!');
    }
    public function completedOrder()
    {
        return view('website.checkout.completed-order');
    }
}
