<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category; // Add this line to import the Category model

class AdminAddCategoryComponent extends Component
{
    // ... rest of your code
    public $name;
    public $slug;
    public function generateSlug()
    {
        $this->slug= Str::slug($this->name);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required'
        ]);
    }    
    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        Category::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        session()->flash('message', 'Category has been created successfully!');
    }

    // ... rest of your code
}
