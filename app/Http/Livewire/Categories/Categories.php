<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;

use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public $category_id;
    public $name;
    public $description;

    public $showModal = false;
    public $showModalDelete = false;

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
        $this->category_id = '';
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
        $this->category_id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description']; 
    }

    public function delete()
    {
        Category::where('id', $this->category_id)->delete();
        $this->getAll();
        $this->resetAll();
    }

    public function edit()
    {
        Category::where('id', $this->category_id)
            ->update(
                [
                    'name' => $this->name,
                    'description' => $this->description
                ]
            );

        $this->resetAll();
        $this->getAll();
    }

    public function resetAll()
    {
        $this->category_id = '';
        $this->name = '';
        $this->description = '';
        $this->resetErrorBag();
        $this->showModal = false;
        $this->showModalDelete = false;
    }

    public function render()
    {
        return view('livewire.categories.categories')->layout('app');
    }
}
