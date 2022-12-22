<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class TinyMce extends Component
{

    public $node;
    public $dataObj;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($node, $dataObj)
    {
        $this->node = $node;
        $this->dataObj = $dataObj;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.tiny-mce');
    }
}
