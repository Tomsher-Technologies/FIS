<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogEdit extends Component
{
    use WithFileUploads;

    public $blog;
    public $slug;
    public $photo;

    // SEO
    public $seotitle;
    public $ogtitle;
    public $twtitle;
    public $seodescription;
    public $og_description;
    public $twitter_description;
    public $seokeywords;

    protected $rules = [
        'blog.title' => 'required',
        'blog.description' => 'required',
        'blog.status' => 'required',
        'blog.slug' => 'required',
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
        'blog.slug.required' => "Please enter a seo url",
        'blog.description.required' => "Please enter a description",
        'blog.status.required' => "Please enter a title",
        'photo.required' => "Please select an image",
    ];

    public function mount($blog)
    {
        $this->blog = Blog::find($blog);
        $this->seotitle = $this->blog->seo_title;
        $this->ogtitle = $this->blog->og_title;
        $this->twtitle = $this->blog->twitter_title;
        $this->slug = $this->blog->slug;
        $this->seodescription = $this->blog->seo_description;
        $this->og_description = $this->blog->og_description;
        $this->twitter_description = $this->blog->twitter_description;
        $this->seokeywords =  $this->blog->keywords;

        // echo '<pre>';
        // print_r($this);
        // die;
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
        $this->blog->slug = $this->blog->slug;
        $this->blog->seo_title = $this->seotitle;
        $this->blog->og_title = $this->ogtitle;
        $this->blog->twitter_title = $this->twtitle;
        $this->blog->seo_description = $this->seodescription;
        $this->blog->og_description = $this->og_description;
        $this->blog->twitter_description = $this->twitter_description;
        $this->blog->keywords = $this->seokeywords;

        $this->blog->save();

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

        Cache::forget('blogs');

        // $this->dispatchBrowserEvent('swal', [
        //     'title' => 'Blog updated',
        //     'timer' => 3000,
        //     'icon' => 'success',
        //     'timerProgressBar' => true,
        // ]);
        $this->dispatchBrowserEvent('clear');
        $this->reset('photo');
        session()->flash('message', 'Blog successfully updated.');
 
        return redirect()->route('admin.blog.index');
    }

    public function changeSeoUrl($value)
    {
        $this->blog->slug = createSlug($value);
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
