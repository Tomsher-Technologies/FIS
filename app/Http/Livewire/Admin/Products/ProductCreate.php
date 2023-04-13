<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $link;
    public $image_alt;
    public $status = 1;

    public $photo;

    protected $rules = [
        'title' => 'required',
        'status' => 'required',
        'link' => 'required|url',
        'image_alt' => 'nullable',
        'photo' => 'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];

    protected $messages = [
        'title.required' => "Please enter a title",
        'status.required' => "Please enter a title",
        'link.required' => "Please enter a url",
        'photo.required' => "Please select an image",
    ];

    public function save()
    {
        $validatedData = $this->validate();

        $iname = time() . cleanFileName($this->photo->getClientOriginalName());

        $product = Product::create([
            'title' => $this->title,
            'link' => $this->link,
            'image_alt' => $this->image_alt,
            'status' => $this->status,
            'image' => '/storage/products/' .  $iname,
        ]);

        $this->photo->storeAs('public/products', $iname);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Product create',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);

        $this->dispatchBrowserEvent('clear');

        $this->reset('title');
        $this->reset('link');
        $this->reset('image_alt');
        $this->reset('photo');
    }

    public function render()
    {
        return view('livewire.admin.products.product-create')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Create Product'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
