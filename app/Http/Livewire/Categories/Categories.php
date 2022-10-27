<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;

use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

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
        $this->category_id = '';
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
        $this->resetPage();
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
        $this->resetPage();
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
        $this->resetPage();
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
        return view('livewire.categories.categories', [
            'categories' => Category::paginate(10),
        ])->layout('app');
    }
}
