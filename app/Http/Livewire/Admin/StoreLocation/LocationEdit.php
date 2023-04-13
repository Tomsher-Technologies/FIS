<?php

namespace App\Http\Livewire\Admin\StoreLocation;

use App\Models\StoreLoction;
use Livewire\Component;

class LocationEdit extends Component
{
    public $location;

    protected $rules = [
        'location.name' => 'required',
        'location.location' => 'required',
        'location.iframe' => 'required',
        'location.status' => 'required',
    ];

    protected $messages = [
        'location.name.required' => "Please enter a name",
        'location.location.required' => "Please enter a location",
        'location.iframe.required' => "Please enter a map",
        'location.status.required' => "Please enter select a status",
    ];

    public function mount(StoreLoction $location){
        $this->location = $location;
    }

    public function save()
    {
        $validData = $this->validate();

        $this->location->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Location updated',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);

    }

    public function render()
    {
        return view('livewire.admin.store-location.location-edit')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Create Service'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
