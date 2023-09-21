<?php

namespace App\Http\Livewire\Admin\Businesses;

use App\Models\BusinessSettings;
use Livewire\Component;
use Livewire\WithFileUploads;

class BusinessEdit extends Component
{
    use WithFileUploads;

    public $photo;

    public $business_settings;

    protected $rules = [
        'business_settings.type' => 'required',
        'business_settings.title' => 'required_unless:business_settings.type,agency',
        'business_settings.image_alt' => 'nullable',
        'business_settings.link' => 'required_unless:business_settings.type,agency|nullable|url',
        'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
        'business_settings.status' => 'required',
    ];

    protected $messages = [
        'business_settings.title.required_unless' => "Please enter a title",
        'business_settings.link.required_unless' => "Please enter a url",
        'photo.required' => "Please select an image",
    ];

    public function mount(BusinessSettings $business_settings)
    {
        $this->business_settings = $business_settings;
    }

    public function save()
    {
        $validatedData = $this->validate();
        
        if($this->business_settings->type == "agency"){
            $this->business_settings->title = NULL;
            $this->business_settings->link = NULL;
        }
        if ($this->photo) {
            $iname = time() . cleanFileName($this->photo->getClientOriginalName());
            deleteImage($this->business_settings->image);
            $this->photo->storeAs('public/business', $iname);
            $this->business_settings->image = '/storage/business/' .  $iname;
        }

        $this->business_settings->save();

        // $this->dispatchBrowserEvent('swal', [
        //     'title' => 'Successfully Updated',
        //     'timer' => 3000,
        //     'icon' => 'success',
        //     'timerProgressBar' => true,
        // ]);

        $this->dispatchBrowserEvent('clear');

        $this->reset('photo');
        session()->flash('message', 'Successfully Updated.');
 
        return redirect()->route('admin.businesses.index');
    }

    public function render()
    {
        return view('livewire.admin.businesses.business-edit')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Edit Agency/Catalogue'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
