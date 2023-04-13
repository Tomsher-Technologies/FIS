<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Services;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceCreate extends Component
{
    use WithFileUploads;

    public $photo;

    public $name;
    public $sub_title;
    public $content;
    public $slug;
    public $status = 1;


    // SEO
    public $seotitle;
    public $ogtitle;
    public $twtitle;
    public $seodescription;
    public $og_description;
    public $twitter_description;

    protected $rules = [
        'name' => 'required',
        'content' => 'required',
        'slug' => 'required|unique:services,slug',
        'photo' => 'required|mimes:jpeg,png,jpg,gif,webp|max:1024',

        'seotitle' => 'nullable|min:5|max:60',
        'ogtitle' => 'nullable|min:5|max:60',
        'twtitle' => 'nullable|min:5|max:60',
        'seodescription' => 'nullable|min:5|max:120',
        'og_description' => 'nullable|min:5|max:120',
        'twitter_description' => 'nullable|min:5|max:120',
    ];

    protected $messages = [
        'title.name' => "Please enter a name",
        'slug.required' => "Please enter a seo url",
        'content.required' => "Please enter a content",
        'status.required' => "Please enter select a status",
        'photo.required' => "Please select an image",

        'seotitle.min' => 'Please enter a title',
    ];

    public function save()
    {
        $validatedData = $this->validate();

        $iname = time() . cleanFileName($this->photo->getClientOriginalName());

        $services = Services::create([
            'name' => $this->name,
            'sub_title' => $this->sub_title,
            'content' => $this->content,
            'status' => $this->status,
            'slug' => $this->slug,
            'image' => '/storage/services/' . $iname,
        ]);

        $this->photo->storeAs('public/services', $iname);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Service create',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);

        $services->seo()->create([
            'title' => $this->seotitle,
            'og_title' => $this->ogtitle,
            'twitter_title' => $this->twtitle,
            'description' => $this->seodescription,
            'og_description' => $this->og_description,
            'twitter_description' => $this->twitter_description,
        ]);

        $this->dispatchBrowserEvent('clear');

        $this->reset('name');
        $this->reset('sub_title');
        $this->reset('status');
        $this->reset('photo');
        $this->reset('slug');

        $this->reset('seotitle');
        $this->reset('ogtitle');
        $this->reset('twtitle');
        $this->reset('seodescription');
        $this->reset('og_description');
        $this->reset('twitter_description');
    }

    public function changeSeoUrl($value)
    {
        $this->slug = createSlug($value);
    }

    public function render()
    {
        return view('livewire.admin.services.service-create')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Create Service'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
