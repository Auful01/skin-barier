<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalComponent extends Component
{

    public $id;
    public $title;
    public $size;
    public $footer;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $title = 'Modal Title', $size = '', $footer = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->size = $size;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-component');
    }
}
