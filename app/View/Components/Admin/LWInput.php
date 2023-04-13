<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class LWInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $model;
    public $type;
    public $text;

    public function __construct($model, $type = 'text', $text)
    {
        $this->model = $model;
        $this->type = $type;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.l-w-input');
    }
}
