<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Services;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceEdit extends Component
{
    use WithFileUploads;

    public $photo;
    public $service;

    // SEO
    public $seotitle;
    public $ogtitle;
    public $twtitle;
    public $seodescription;
    public $og_description;
    public $twitter_description;


    function rules()
    {
        return [
            'service.name' => 'required',
            'service.content' => 'required',
            'service.status' => 'required',
            'service.sub_title' => 'nullable',
            'service.slug' => ['required', 'unique:services,slug,' . $this->service->id],
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',

            'seotitle' => 'nullable|min:5|max:60',
            'ogtitle' => 'nullable|min:5|max:60',
            'twtitle' => 'nullable|min:5|max:60',
            'seodescription' => 'nullable|min:5|max:120',
            'og_description' => 'nullable|min:5|max:120',
            'twitter_description' => 'nullable|min:5|max:120',
        ];
    }

    protected $messages = [
        'service.title.required' => "Please enter a title",
        'service.description.required' => "Please enter a description",
        'service.status.required' => "Please enter a title",
        'photo.required' => "Please select an image",
    ];

    public function mount($service)
    {
        $this->service = Services::find($service);
        $seo = $this->service->seo;

        $this->seotitle = $seo->title;
        $this->ogtitle = $seo->og_title;
        $this->twtitle = $seo->twitter_title;
        $this->seodescription = $seo->description;
        $this->og_description = $seo->og_description;
        $this->twitter_description = $seo->twitter_description;
    }

    public function save()
    {
        $validatedData = $this->validate();
        if ($this->photo) {
            deleteImage($this->service->image);
            $iname = time() . cleanFileName($this->photo->getClientOriginalName());
            $this->photo->storeAs('public/services', $iname);
            $this->service->image  = '/storage/services/' . $iname;
        }

        $this->service->save();

        $this->service->seo()->updateorCreate([
            'seo_id' => $this->service->id,
            'seo_type' => get_class(new Services())
        ], [
            'title' => $this->seotitle,
            'og_title' => $this->ogtitle,
            'twitter_title' => $this->twtitle,
            'description' => $this->seodescription,
            'og_description' => $this->og_description,
            'twitter_description' => $this->twitter_description,
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Service updated',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);
        $this->dispatchBrowserEvent('clear');
        $this->reset('photo');
    }

    public function changeSeoUrl($value)
    {
        $this->service->slug = createSlug($value);
    }

    public function render()
    {
        return view('livewire.admin.services.service-edit')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Create Service'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
