<?php

namespace App\Models;

use DOMDocument;
use DOMXPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_alt',
        'image',
        'status',
        'slug',
    ];

    public function getImage()
    {
        return Storage::url(Str::replace('/storage/', '', $this->image));
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seo');
    }
}
