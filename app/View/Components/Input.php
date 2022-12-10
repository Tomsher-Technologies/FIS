<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{

    public $type;
    public $name;
    public $text;
    public $model;
    public $required;
    public $editable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'text', $name = "", $text = "", $model = "", $required = true, $editable = false)
    {
        $this->type = $type;
        $this->name = $name;
        $this->text = $text;
        $this->model = $model;
        $this->required = $required;
        $this->editable = $editable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
