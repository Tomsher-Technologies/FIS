<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandEdit extends Component
{
    use WithFileUploads;

    public $photo;
    public $product_photo;

    public $brand;

    protected $rules = [
        'brand.title' => 'required',
        'brand.status' => 'required',
        'brand.description' => 'required',
        'brand.image_alt' => 'nullable',
        'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
        'product_photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];

    protected $messages = [
        'brand.title.required' => "Please enter a title",
        'brand.status.required' => "Please enter a title",
        'photo.required' => "Please select an image",
        'product_photo.required' => "Please select a product image",
    ];

    public function mount($brand)
    {
        $this->brand = Brand::find($brand);
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->photo) {
            deleteImage($this->brand->image);
            $iname = time() . cleanFileName($this->photo->getClientOriginalName());
            $this->photo->storeAs('public/brands', $iname);
            $this->brand->image = '/storage/brands/' . $iname;
        }

        if ($this->product_photo) {
            deleteImage($this->brand->product_image);
            $piname = time() . cleanFileName($this->product_photo->getClientOriginalName());
            $this->product_photo->storeAs('public/brands', $piname);
            $this->brand->product_image = '/storage/brands/' . $piname;
        }

        $this->brand->save();

        // $this->dispatchBrowserEvent('swal', [
        //     'title' => 'Brand updated',
        //     'timer' => 3000,
        //     'icon' => 'success',
        //     'timerProgressBar' => true,
        // ]);

        $this->dispatchBrowserEvent('clear');

        $this->reset('photo');
        return redirect()->route('admin.brands.index')->with('status', 'Brand updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.brands.brand-edit')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Edit Brand'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
