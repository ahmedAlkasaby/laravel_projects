<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
class AddOneProductToCart extends Component
{


    public function render()
    {
        $products=Product::where('trend',1)->get();
        foreach($products as $p){
            if($p->qty<=1){
                Product::where('id',$p->id)->delete();
            }
        }
        return view('livewire.add-one-product-to-cart',compact('products'));
    }

    public function addToCart($product_id){
        if(auth()->user()){
            $cart=Cart::create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$product_id,
                'qty'=>1
            ]);
            Product::where('id',$cart->product_id)->update([
                'statue'=>'is added to cart'
            ]);
        }else{
            return redirect()->route('login');
        }

    }
}
