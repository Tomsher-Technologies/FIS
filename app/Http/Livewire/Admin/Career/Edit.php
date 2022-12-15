<?php

namespace App\Http\Livewire\Admin\Career;

use App\Models\Career;
use Livewire\Component;

class Edit extends Component
{

    public $career;

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

    public function mount(Career $career)
    {
        $this->career = $career;
        $this->title = $career->title;
        $this->description = $career->description;
        $this->status = $career->status;
    }

    public function save()
    {
        $validatedData = $this->validate();

        $this->career->title = $this->title;
        $this->career->description = $this->description;
        $this->career->status = $this->status;
        $this->career->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Career updated',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);

    }

    public function render()
    {
        return view('livewire.admin.career.edit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
