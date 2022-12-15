<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogEdit extends Component
{
    use WithFileUploads;

    public $blog;

    public $photo;

    protected $rules = [
        'blog.title' => 'required',
        'blog.description' => 'required',
        'blog.status' => 'required',
        'blog.image_alt' => 'nullable',
        'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];

    protected $messages = [
        'blog.title.required' => "Please enter a title",
        'blog.description.required' => "Please enter a description",
        'blog.status.required' => "Please enter a title",
        'photo.required' => "Please select an image",
    ];

    public function mount($blog)
    {
        $this->blog = Blog::find($blog);
    }

    public function save()
    {
        $validatedData = $this->validate();
        if ($this->photo) {
            deleteImage($this->blog->image);
            $iname = time() . $this->photo->getClientOriginalName();
            $this->photo->storeAs('public/blogs', $iname);
            $this->blog->image  = '/storage/blogs/' . $iname;
        }

        $this->blog->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Blog updated',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);
        $this->dispatchBrowserEvent('clear');
        $this->reset('photo');
    }

    public function render()
    {
        return view('livewire.admin.blog.blog-edit')
            ->extends('layouts.admin.app', [
                'body_class' => '',
                'title' => 'Edit Blog'
            ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
