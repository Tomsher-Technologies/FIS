<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandEdit extends Component
{
    use WithFileUploads;

    public $photo;

    public $brand;

    protected $rules = [
        'brand.title' => 'required',
        'brand.status' => 'required',
        'brand.description' => 'required',
        'brand.image_alt' => 'nullable',
        'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];

    protected $messages = [
        'brand.title.required' => "Please enter a title",
        'brand.status.required' => "Please enter a title",
        'photo.required' => "Please select an image",
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

        $this->brand->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Brand updated',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);

        $this->dispatchBrowserEvent('clear');

        $this->reset('photo');
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
