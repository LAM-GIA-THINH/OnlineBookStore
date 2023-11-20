<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Author;
use App\Models\Publisher;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class AdminProductEditComponent extends Component
{
    use WithFileUploads;
    public $product_id;
    public $name;
    public $slug;
    public $description;
    public $regular_price;
    public $sale_price;
    public $ISBN;
    public $cover_type;
    public $size;
    public $release_date;
    public $weight;
    public $language;
    public $demographic;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;

    public $category_id;
    public $author_id;
    public $publisher_id;
    public $newimage;

    public function mount($product_id){
        $product = Product::find($product_id);
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->ISBN = $product->ISBN;
        $this->cover_type = $product->cover_type;
        $this->size = $product->size;
        $this->release_date = $product->release_date;
        $this->weight = $product->weight;
        $this->image = $product->image;
        $this->language = $product->language;
        $this->demographic = $product->demographic;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->category_id = $product->category_id;
        $this->author_id = $product->author_id;
        $this->publisher_id = $product->publisher_id;
    }

    public function generateSlug()
    {
        $this->slug= Str::slug($this->name);
    }
    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'ISBN' => 'required',
            'cover_type' => 'required',
            'size' => 'required',
            'release_date' => 'required|date',
            'weight' => 'required',
            'language' => 'required',
            'demographic' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required'
            ]);
            $product = Product::find($this->product_id);
            $product->name = $this->name;
            $product->slug = $this->slug;
            $product->description = $this->description;
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price;
            $product->ISBN = $this->ISBN;
            $product->cover_type = $this->cover_type;
            $product->size = $this->size;
            $product->release_date = $this->release_date;
            $product->weight = $this->weight;
            $product->language = $this->language;
            $product->demographic = $this->demographic;
            $product->stock_status = $this->stock_status;
            $product->featured = $this->featured;
            $product->quantity = $this->quantity;
            if($this->newimage){
                unlink('assets/imgs/products/products/'.$product->image);
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('products', $imageName);
                $product->image = $imageName;
            }
            // Upload and store the main product image
            
    
            // Additional logic for handling multiple images if needed
    
            $product->category_id = $this->category_id;
            $product->author_id = $this->author_id;
            $product->publisher_id = $this->publisher_id; // Corrected typo in the field name
            $product->save();
    
            session()->flash('message', 'Product has been updated!');
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $authors = Author::orderBy('name', 'ASC')->get();
        $publishers = Publisher::orderBy('name', 'ASC')->get();
        return view('livewire.admin.admin-product-edit-component', [
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers,
        ]);
    }
}
