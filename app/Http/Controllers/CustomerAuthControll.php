<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthControll extends Controller
{
    private $customer;

    public function index()
    {
        return view('customer.index');
    }

    public function login(Request $request)
    {
        $this->customer = Customer::where('email' , $request->email)->first();
        if ($this->customer)
        {
            if (password_verify($request->password , $this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
                return redirect('/customer/dashboard');
            }
            else
            {
                return back()->with('message','Invalid Password');
            }
        }
        else
        {
            return back()->with('message','Your Email is invalid');
        }
    }

    public function register(Request $request)
    {
        try
        {
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required|unique:customers,email',
                'mobile'=>'required|unique:customers,mobile',
                'password'=>'required',
            ]);

            $this->customer = Customer::newCustomer($request);

            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);
            return redirect('customer/dashboard')->with('message','Congratulations! you are registered on our system');
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }

    }
    public function dashboard()
    {
        return view('customer.dashboard');
    }

    public function profile()
    {
        return view('customer.profile');
    }
    public function account()
    {
        return view('customer.account');
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }
}
