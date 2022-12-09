<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SeoForm extends Component
{

    public $model;
    public $isedit;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model = "", $isedit = "")
    {
        $this->model = $model;
        $this->isedit = $isedit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.seo-form');
    }
}
