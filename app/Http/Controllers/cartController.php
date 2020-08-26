<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;



class cartController extends Controller
{
    public function addToCart(Request $request){
       $product = Product::find($request->id);
           Cart::add([
               'id'=> $request->id,
               'name'=> $product->product_name,
               'price' =>$product->product_price,
               'qty' =>$request->qty,
               'options'=>[
                   'image'=>$product->product_image,
                   'size' => $request->size
               ]
               ]);

           return redirect('show-cart');

    }
    public function showToCart(){
        $cartProducts= Cart::content();

        return view('FrontEnd.Cart.showcart',[
            'cartProducts'=>$cartProducts
        ]);
    }
    public function deleteCart($id){
        Cart::remove($id);
        return redirect('show-cart');
    }
    public function updateCart(Request $request){
        $cartProducts = Cart::update($request->rowId,$request->qty,$request->size);
        return redirect('show-cart');

    }
    public function addToCarthome($id ,$qty){
        $product = Product::find($id);
        Cart::add([
            'id'=> $id,
            'name'=> $product->product_name,
            'price' =>$product->product_price,
            'qty' =>$qty,
            'options'=>[
                'image'=>$product->product_image,
            ]
        ]);
        return redirect('show-cart');
    }
}
