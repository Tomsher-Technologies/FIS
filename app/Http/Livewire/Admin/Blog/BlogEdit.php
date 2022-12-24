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

    // SEO
    public $seotitle;
    public $ogtitle;
    public $twtitle;
    public $seodescription;
    public $og_description;
    public $twitter_description;

    protected $rules = [
        'blog.title' => 'required',
        'blog.description' => 'required',
        'blog.status' => 'required',
        'blog.image_alt' => 'nullable',
        'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',

        'seotitle' => 'nullable|min:5|max:60',
        'ogtitle' => 'nullable|min:5|max:60',
        'twtitle' => 'nullable|min:5|max:60',
        'seodescription' => 'nullable|min:5|max:120',
        'og_description' => 'nullable|min:5|max:120',
        'twitter_description' => 'nullable|min:5|max:120',
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
        $seo = $this->blog->seo;

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
            deleteImage($this->blog->image);
            $iname = time() . cleanFileName($this->photo->getClientOriginalName());
            $this->photo->storeAs('public/blogs', $iname);
            $this->blog->image  = '/storage/blogs/' . $iname;
        }

        $this->blog->save();

        saveSEO($this->blog, $this, get_class(new Blog));

        // $this->blog->seo()->updateorCreate([
        //     'seo_id' => $this->blog->id,
        //     'seo_type' => get_class(new Blog)
        // ], [
        //     'title' => $this->seotitle,
        //     'og_title' => $this->ogtitle,
        //     'twitter_title' => $this->twtitle,
        //     'description' => $this->seodescription,
        //     'og_description' => $this->og_description,
        //     'twitter_description' => $this->twitter_description,
        // ]);

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
