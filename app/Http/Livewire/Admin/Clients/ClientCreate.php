<?php

namespace App\Http\Livewire\Admin\Clients;

use App\Models\Common\Media;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientCreate extends Component
{
    use WithFileUploads;

    public $photo;
    public $title;
    public $status = "1";

    protected $rules = [
        'title' => 'required',
        'status' => 'required',
        'photo' => 'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];

    protected $messages = [
        'title.required' => "Please enter a title",
        'status.required' => "Please enter a title",
        'photo.required' => "Please select an image",
    ];


    public function save()
    {
        // dd($this->status);
        $validatedData = $this->validate();

        $iname = time() . cleanFileName($this->photo->getClientOriginalName());

        $blog = Media::create([
            'media_id' => 0,
            'media_type' => 'Clients',
            'type' => 'clients',
            'status' => $this->status,
            'alt' => $this->title,
            'url' => '/storage/clients/' . $iname,
        ]);

        $this->photo->storeAs('public/clients', $iname);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Blog create',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);

        $this->dispatchBrowserEvent('clear');

        $this->reset('title');
        $this->reset('status');
        $this->reset('photo');
    }


    public function render()
    {
        return view('livewire.admin.clients.client-create')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Create Client'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
