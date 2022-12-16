<?php

namespace App\Http\Livewire\Admin\Seo;

use Livewire\Component;

class SeoCreate extends Component
{

    public $seotitle;
    public $ogtitle;
    public $twtitle;
    public $description;
    public $og_description;
    public $twitter_description;

    protected $listeners = [
        'postAdded' => 'save',
        'validateSeo' => 'validateSeo'
    ];

    protected $rules = [
        'seotitle' => 'nullable|min:5|max:60',
        'ogtitle' => 'nullable|min:5|max:60',
        'twtitle' => 'nullable|min:5|max:60',
        'description' => 'nullable|min:5|max:120',
        'og_description' => 'nullable|min:5|max:120',
        'twitter_description' => 'nullable|min:5|max:120',
    ];

    protected $messages = [
        'title.min' => 'Please ente a title',
    ];

    public function validateSeo()
    {
        dd("Asd");
        $validatedData = $this->validate();
    }

    public function save($id)
    {
        dd("save");
    }

    public function render()
    {
        return view('livewire.admin.seo.seo-create');
    }
}
