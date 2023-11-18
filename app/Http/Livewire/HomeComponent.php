<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        $products = Product::paginate(8); 
        return view('livewire.home-component', ['products' => $products, 'categories'=>$categories]);
    }
}
