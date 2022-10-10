<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;

use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.categories.categories')->layout('app');
    }
}
