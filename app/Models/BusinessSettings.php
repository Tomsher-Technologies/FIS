<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BusinessSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'type',
        'link',
        'image_alt',
        'image',
        'status',
    ];

    public function getImage()
    {
        return Storage::url(Str::replace('/storage/', '', $this->image));
    }
}
