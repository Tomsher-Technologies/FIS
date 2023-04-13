<?php

namespace App\Http\Livewire\Admin\Common;

use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class MediaLibrary extends Component
{
    use WithFileUploads;

    public $files = [];

    public function render()
    {
        return view('livewire.admin.common.media-library');
    }

    public function finishUpload($name, $tmpPath, $isMultiple)
    {
        $this->cleanupOldUploads();
        $files = collect($tmpPath)->map(function ($i) {
            return TemporaryUploadedFile::createFromLivewire($i);
        })->toArray();
        $this->emitSelf('upload:finished', $name, collect($files)->map->getFilename()->toArray());

        $files = array_merge($this->getPropertyValue($name), $files);
        $this->syncInput($name, $files);
    }
}
