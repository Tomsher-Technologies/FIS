<?php

namespace App\Http\Livewire\Admin\Clients;

use App\Models\Common\Media;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientEdit extends Component
{
    use WithFileUploads;

    public $client;

    public $photo;

    protected $rules = [
        'client.alt' => 'required',
        'client.status' => 'required',
        'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];

    protected $messages = [
        'client.alt.required' => "Please enter a title",
        'client.status.required' => "Please enter a title",
        'photo.required' => "Please select an image",
    ];


    public function save()
    {
        $validatedData = $this->validate();
        if ($this->photo) {
            deleteImage($this->client->url);
            $iname = time() . cleanFileName($this->photo->getClientOriginalName());
            $this->photo->storeAs('public/clients', $iname);
            $this->client->url  = '/storage/clients/' . $iname;
        }

        $this->client->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Client updated',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);
        $this->dispatchBrowserEvent('clear');
        $this->reset('photo');
    }

    public function mount($client)
    {
        $this->client = Media::find($client);
    }

    public function render()
    {
        return view('livewire.admin.clients.client-edit')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Edit Client'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
