<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;

use Livewire\Component;

class Categories extends Component
{
    public $categories;

    // public Category $category;
    public $name;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:20',
        'description' => 'string|max:200',
    ];

    protected $messages = [
        'name.required' => 'Name field is required',
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->description = '';
    }

    public function save()
    {
        $this->validate();

        $category = new Category;
        $category->name = $this->name;
        $category->description = $this->description;
        $category->save();

        $this->resetAll();

        $this->categories = Category::all();
    }

    public function resetAll()
    {
        $this->name = '';
        $this->description = '';
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.categories.categories')->layout('app');
    }
}
