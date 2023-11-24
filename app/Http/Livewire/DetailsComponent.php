<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use App\Models\Publisher;
use App\Models\Category;

class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug){
        $this->slug = $slug;
    } 
    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('shop.cart');
    }
     public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        $this->emitTo('livewire.wishlist-icon-component','refreshComponent' );
    }

    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('livewire.wishlist-icon-component','refreshComponent' );
                return;
            }
        }
    }
    public function render(){
        $product = Product::where('slug', $this->slug)->first();
        $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts = Product::latest()->take(4)->get();
        $categories = Category::orderBy('name','ASC')->get();
        $publisher = Publisher::where('id', $product->publisher_id)->first();

        return view('livewire.details-component', [
            'product' => $product,
            'rproducts' => $rproducts,
            'nproducts' => $nproducts,
            'categories'=>$categories ,
            'publisher' => $publisher
        ]);
    }
}
