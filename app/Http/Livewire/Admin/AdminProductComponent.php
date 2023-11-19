<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'DESC')
        ->paginate(5);

        return view('livewire.admin.admin-product-component', ['products' => $products]);
    }
}
