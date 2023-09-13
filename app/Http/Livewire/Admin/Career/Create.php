<?php

namespace App\Http\Livewire\Admin\Career;

use App\Models\Career;
use Livewire\Component;

class Create extends Component
{

    public $title;
    public $description;
    public $status = 1;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'status' => 'required',
    ];

    protected $messages = [
        'title.required' => "Please enter a title",
        'description.required' => "Please enter a description",
        'status.required' => "Please enter a title",
    ];

    public function save()
    {
        $validatedData = $this->validate();

        Career::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        // $this->dispatchBrowserEvent('swal', [
        //     'title' => 'Career create',
        //     'timer' => 3000,
        //     'icon' => 'success',
        //     'timerProgressBar' => true,
        // ]);
        $this->dispatchBrowserEvent('clear', [
            'title' => 'Career create',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);

        $this->reset('title');
        $this->reset('description');
        $this->reset('status');

        session()->flash('message', 'Career successfully created.');
 
        return redirect()->route('admin.career.index');

    }

    public function render()
    {
        return view('livewire.admin.career.create');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
