<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogCreate extends Component
{
    use WithFileUploads;

    public $photo;

    public $title;
    public $description;
    public $image_alt;
    public $status = 1;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'status' => 'required',
        'image_alt' => 'nullable',
        'photo' => 'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];

    protected $messages = [
        'title.required' => "Please enter a title",
        'description.required' => "Please enter a description",
        'status.required' => "Please enter a title",
        'photo.required' => "Please select an image",
    ];

    public function save()
    {
        $validatedData = $this->validate();

        $iname = time() . $this->photo->getClientOriginalName();

        $blog = Blog::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'image_alt' => $this->image_alt,
            'image' => '/storage/blogs/' . $iname,
        ]);

        $this->photo->storeAs('public/blogs', $iname);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Blog create',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);
        $this->dispatchBrowserEvent('clear');

        $this->reset('title');
        $this->reset('description');
        $this->reset('status');
        $this->reset('photo');
        $this->reset('image_alt');
    }

    public function render()
    {
        return view('livewire.admin.blog.blog-create')
            ->extends('layouts.admin.app', [
                'body_class' => '',
                'title' => 'Create Blog'
            ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
