<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandCreate extends Component
{

    use WithFileUploads;

    public $title;
    public $description;
    public $image_alt;
    public $status = 1;

    public $photo;
    public $product_photo;

    protected $rules = [
        'title' => 'required',
        'status' => 'required',
        'description' => 'required',
        'image_alt' => 'nullable',
        'photo' => 'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
        'product_photo' => 'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];

    protected $messages = [
        'title.required' => "Please enter a title",
        'status.required' => "Please enter a title",
        'photo.required' => "Please select an image",
        'product_photo.required' => "Please select a product image",
    ];

    public function save()
    {
        $validatedData = $this->validate();

        $iname = time() . cleanFileName($this->photo->getClientOriginalName());
        $piname = time() . cleanFileName($this->product_photo->getClientOriginalName());

        $brand = Brand::create([
            'title' => $this->title,
            'description' => $this->description,
            'image_alt' => $this->image_alt,
            'status' => $this->status,
            'image' => '/storage/brands/' .  $iname,
            'product_image' => '/storage/brands/' .  $piname,
        ]);

        $this->photo->storeAs('public/brands', $iname);
        $this->product_photo->storeAs('public/brands', $piname);

        // $this->dispatchBrowserEvent('swal', [
        //     'title' => 'Brand create',
        //     'timer' => 3000,
        //     'icon' => 'success',
        //     'timerProgressBar' => true,
        // ]);

        $this->dispatchBrowserEvent('clear');

        $this->reset('title');
        $this->reset('description');
        $this->reset('image_alt');
        $this->reset('photo');
        $this->reset('product_photo');
        return redirect()->route('admin.brands.index')->with('status', 'Brand created successfully');
    }

    public function render()
    {
        return view('livewire.admin.brands.brand-create')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Create Brand'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
