<?php

namespace App\Http\Livewire\Admin\StoreLocation;

use App\Models\StoreLoction;
use Livewire\Component;

class LocationCreate extends Component
{

    public $name;
    public $location;
    public $iframe;
    public $status = 1;

    protected $rules = [
        'name' => 'required',
        'location' => 'required',
        'iframe' => 'required',
        'status' => 'required',
    ];

    protected $messages = [
        'name.required' => "Please enter a name",
        'location.required' => "Please enter a location",
        'iframe.required' => "Please enter a map",
        'status.required' => "Please enter select a status",
    ];

    public function save()
    {
        $validatedData = $this->validate();

        $location = StoreLoction::create([
            'name' => $this->name,
            'location' => $this->location,
            'iframe' => $this->iframe,
            'status' => $this->status,
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Location create',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);

        $this->reset('name');
        $this->reset('location');
        $this->reset('iframe');
        $this->reset('status');
    }

    public function render()
    {
        return view('livewire.admin.store-location.location-create')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Create Service'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
