<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // public function featuredImage()
    // {
    //     return $this->morphOne(Media::class, 'media')->where('type', '=', 'featured');
    // }

}
