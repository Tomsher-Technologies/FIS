<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Livewire\Component;

class GalleryListing extends Component
{

    protected $listeners = ['uploadCompleted' => 'getData'];

    public $imageIds;
    public $images;
    public $setOfIds;

    protected $rules = [
        'images.*.image_alt' => 'nullable',
    ];

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->images = Gallery::all();
        $this->setOfIds = $this->images->pluck('id')->toArray();
        $this->imageIds = array_fill_keys($this->setOfIds, false);
    }

    public function save()
    {
        foreach ($this->setOfIds as  $value) {
            if ($this->imageIds[$value]) {
                $img =  Gallery::find($value);
                deleteImage($img->image);
                $img->delete();
            }
        }
        $this->getData();
    }

    public function saveImage()
    {
        foreach($this->images as $image){
            $image->save();
        }
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Gallery Updated',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.gallery.gallery-listing');
    }
}
