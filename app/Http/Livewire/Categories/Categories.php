<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;

use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public $name;
    public $description;

    public $selectedCategory;

    protected $rules = [
        'name' => 'required|string|max:20',
        'description' => 'string|max:200',
    ];

    protected $messages = [
        'name.required' => 'Name field is required',
    ];

    public function mount()
    {
        $this->getAll();
        $this->description = '';
    }

    public function getAll()
    {
        $this->categories = Category::all();   
    }

    public function save()
    {
        $this->validate();

        $category = new Category;
        $category->name = $this->name;
        $category->description = $this->description;
        $category->save();

        $this->resetAll();

        $this->getAll();
    }

    public function select($data)
    {
        $this->selectedCategory = $data;
    }

    public function test()
    {
        Category::where('id', $this->selectedCategory['id'])->delete();
        $this->getAll();
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
