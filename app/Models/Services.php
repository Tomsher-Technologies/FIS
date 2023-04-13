<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sub_title',
        'image',
        'content',
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
