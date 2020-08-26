<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mail;
use App\shipping;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('FrontEnd.Checkout.checkout');

    }
    public function CustomerSignUp(Request $request){

        $customerregister = new CustomerRegister();
        $customerregister->name  = $request->name;
        $customerregister->phone_number  = $request->phone_number;
        $customerregister->email  = $request->email;
        $customerregister->password  = Hash::make($request->password);
        $customerregister->address  = $request->address;
        $customerregister->save();
       $customerID = $customerregister->id;

       Session::put('customerID',$customerID);
        Session::put('customermail',$customerregister->gmail);
        Session::put('customername',$customerregister->name);

               $data = $customerregister->toArray();
        Mail::send('frontEnd.Mail.confirmation-mail',$data, function ($message)use($data){

            $message->to($data['email']);
            $message->subject('confirmation-mail');

        });

       return redirect('customer-shipping');

    }
    public function customershipping(){
             $shipping = CustomerRegister::find(Session::get('customerID'));
        return view('FrontEnd.Shipping.shipping',[
            'shipping'=>$shipping
        ]);
    }
    public function saveshipping(Request $request){
        $customershipping= new shipping();
        $customershipping->name  = $request->name;
        $customershipping->phone_number  = $request->phone_number;
        $customershipping->email  = $request->email;

        $customershipping->address  = $request->address;
        $customershipping->save();
        $shippingId= $customershipping->id;
        Session::put('shippingId',$shippingId);
        return redirect('payment');
    }
    public function payment(){
        return view('FrontEnd.Shipping.payment');
    }
}
