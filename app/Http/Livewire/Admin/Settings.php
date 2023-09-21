<?php

namespace App\Http\Livewire\Admin;

use App\Models\Common\Settings as CommonSettings;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $address;
    public $email;
    public $phone;
    public $working_time;

    public $socialLinks;

    protected $rules = [
        'address.value' => 'required|min:6|max:100',
        'email.value' => 'required|email',
        'phone.value' => 'required',
        'working_time.value' => 'required',
        'socialLinks.*.value' => 'required',
        'about_content.value' => 'required',
        'footer_content.value' => 'required',
    ];

    protected $messages = [
        'address.value.required' => 'The Address cannot be empty.',
        'address.value.min' => 'The Address cannot be less than 6 characters.',
        'address.value.max' => 'The Address cannot be more than 100 characters.',
        'working_time.value.required' => 'Working time is required',
        'phone.value.required' => 'Phone is required',
        'email.value.required' => 'Email is required',
        'email.value.email' => 'Email format is not valid',
        'socialLinks.*.value.required' => 'required',
        'about_content.value.required' => 'About content is required',
        'footer_content.value.required' => 'Footer content is required',
    ];

    public function mount()
    {
        $setting = CommonSettings::all();

        $this->address = $setting->where('name', 'address')->first();
        $this->email = $setting->where('name', 'email')->first();
        $this->phone = $setting->where('name', 'phone')->first();
        $this->working_time = $setting->where('name', 'working_time')->first();

        $this->about_content = $setting->where('name', 'about_content')->first();
        $this->footer_content = $setting->where('name', 'footer_content')->first();
        $this->socialLinks = $setting->where('group', 'social');
    }

    public function saveDetails()
    {
        $validatedData = $this->validate();

        $this->address->save();
        $this->email->save();
        $this->phone->save();
        $this->working_time->save();

        $this->about_content->save();
        $this->footer_content->save();
        $this->socialLinks->each(function ($link) {
            $link->save();
        });

        Cache::forget('settings');
        Cache::rememberForever('settings', function () {
            return CommonSettings::all();
        });

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Settings Saved',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.settings')->extends('layouts.admin.app', [
            'body_class' => '',
            'title' => 'Settings'
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
