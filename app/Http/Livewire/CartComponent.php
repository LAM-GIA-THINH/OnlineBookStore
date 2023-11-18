<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increateQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        // $this->emitTo('refreshComponent','cart-icon-component' );
    }
    public function decreateQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
       
    }

    public function destroy($id){
        Cart::remove($id);
        
        session()->flash('success_message','Item has been remove');
        
    }

    public function clearAll(){
        Cart::destroy();
       
    }
    public function render()
    {
        return view('livewire.cart-component');
    }
}
