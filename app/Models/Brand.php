<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_alt',
        'image',
        'status',
        'product_image'
    ];

    public function getImage()
    {
        return Storage::url(Str::replace('/storage/', '', $this->image));
    }
    public function getProductImage()
    {
        return Storage::url(Str::replace('/storage/', '', $this->product_image));
    }
}
