<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'media_type',
        'type',
        'url',
        'status',
        'alt',
    ];

    public function media()
    {
        return $this->morphTo();
    }

    public function getImage()
    {
        return Storage::url(Str::replace('/storage/', '', $this->url));
    }

    // public function featuredImage()
    // {
    //     return $this->morphOne(Media::class, 'media')->where('type', '=', 'featured');
    // }

}
