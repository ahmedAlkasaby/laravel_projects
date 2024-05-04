<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;


class SingleProduct extends Component
{
    public $related_products;
    public function render()
    {
        return view('livewire.single-product');
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
