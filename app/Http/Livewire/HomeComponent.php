<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    public function render()
    {
        $products = Product::paginate(8); 
        return view('livewire.home-component', ['products' => $products]);
    }
}
