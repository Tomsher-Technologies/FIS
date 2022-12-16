<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogCreate extends Component
{
    use WithFileUploads;

    public $photo;

    public $title;
    public $description;
    public $image_alt;
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
        'title' => 'required',
        'description' => 'required',
        'status' => 'required',
        'slug' => 'required|unique:blogs,slug',
        'image_alt' => 'nullable',
        'photo' => 'required|mimes:jpeg,png,jpg,gif,webp|max:1024',

        'seotitle' => 'nullable|min:5|max:60',
        'ogtitle' => 'nullable|min:5|max:60',
        'twtitle' => 'nullable|min:5|max:60',
        'seodescription' => 'nullable|min:5|max:120',
        'og_description' => 'nullable|min:5|max:120',
        'twitter_description' => 'nullable|min:5|max:120',
    ];

    protected $messages = [
        'title.required' => "Please enter a title",
        'slug.required' => "Please enter a seo url",
        'description.required' => "Please enter a description",
        'status.required' => "Please enter a title",
        'photo.required' => "Please select an image",

        'seotitle.min' => 'Please enter a title',
    ];

    public function save()
    {
        $validatedData = $this->validate();

        $iname = time() . cleanFileName($this->photo->getClientOriginalName());

        $blog = Blog::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'image_alt' => $this->image_alt,
            'slug' => $this->slug,
            'image' => '/storage/blogs/' . $iname,
        ]);

        $this->photo->storeAs('public/blogs', $iname);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Blog create',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);

        $blog->seo()->create([
            'title' => $this->seotitle,
            'og_title' => $this->ogtitle,
            'twitter_title' => $this->twtitle,
            'description' => $this->seodescription,
            'og_description' => $this->og_description,
            'twitter_description' => $this->twitter_description,
        ]);

        $this->dispatchBrowserEvent('clear');

        $this->reset('title');
        $this->reset('description');
        $this->reset('status');
        $this->reset('photo');
        $this->reset('image_alt');
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
