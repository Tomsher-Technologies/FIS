<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{

    use WithFileUploads;

    public $photo;

    public $product;

    protected $rules = [
        'product.title' => 'required',
        'product.status' => 'required',
        'product.link' => 'required|url',
        'product.image_alt' => 'nullable',
        'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];

    protected $messages = [
        'product.title.required' => "Please enter a title",
        'product.status.required' => "Please enter a title",
        'product.link.required' => "Please enter a url",
        'photo.required' => "Please select an image",
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        // $this->product = Product::findOrFail($product);
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->photo) {
            $iname = time() . cleanFileName($this->photo->getClientOriginalName());
            deleteImage($this->product->image);
            $this->photo->storeAs('public/products', $iname);
            $this->product->image = '/storage/products/' .  $iname;
        }

        $this->product->save();

        // $this->dispatchBrowserEvent('swal', [
        //     'title' => 'Product updated',
        //     'timer' => 3000,
        //     'icon' => 'success',
        //     'timerProgressBar' => true,
        // ]);

        $this->dispatchBrowserEvent('clear');

        $this->reset('photo');

        session()->flash('message', 'Product successfully updated.');
 
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.products.product-edit')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Create Product'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
