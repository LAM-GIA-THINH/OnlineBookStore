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



class AdminProductAddComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $description;
    public $regular_price;
    public $sale_price;
    public $ISBN;
    public $cover_type="Bìa mềm";
    public $size;
    public $release_date;
    public $weight;
    public $language="Tiếng Việt";
    public $demographic="3+";
    public $stock_status = "instock";
    public $featured = false;
    public $quantity = 10;
    public $image;
    public $images; // Assuming this is for additional images
    public $category_id;
    public $author_id;
    public $publisher_id;

    public function generateSlug()
    {
        $this->slug= Str::slug($this->name);
    }
    public function addProduct()
    {
        $this->validate([
            'name' => 'required|unique:products',
            'slug' => 'required|unique:products',
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            ]);
            $product = new Product();
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
    
            // Upload and store the main product image
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('products', $imageName);
            $product->image = $imageName;
    
            // Additional logic for handling multiple images if needed
    
            $product->category_id = $this->category_id;
            $product->author_id = $this->author_id;
            $product->publisher_id = $this->publisher_id; // Corrected typo in the field name
            $product->save();
    
            session()->flash('message', 'Product has been added!');
    }
    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $authors = Author::orderBy('name', 'ASC')->get();
        $publishers = Publisher::orderBy('name', 'ASC')->get();

        return view('livewire.admin.admin-product-add-component', [
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers,
        ]);
    }


}
