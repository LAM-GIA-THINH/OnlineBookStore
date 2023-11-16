<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminDeleteCategoryComponent extends Component
{
    public $category_id;

    public function render()
    {
        return view('livewire.admin.admin-delete-category-component');
    }

    public function mount($category_id)
    {
        $category = Category::find($category_id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug= $category->slug;
    }

    public function cancelDelete()
    {
        return redirect('/admin/categories');

    }

    public function deleteCategory()
    {
        // Implement your category deletion logic here
        // You can use $this->categoryId to get the category ID
        // For example: Category::find($this->categoryId)->delete();

        // Close the modal after deletion
        $category = Category::find($this->category_id);
        $category->delete();
        session()->flash ('message', 'Category has been deleted successfully!');
    }
}
