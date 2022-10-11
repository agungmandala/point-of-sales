<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class Delete extends Component
{
    public $title;
    public $onDelete;
    public $close;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $onDelete, $close)
    {
        $this->title = $title;
        $this->onDelete = $onDelete;
        $this->close = $close;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.delete');
    }
}
