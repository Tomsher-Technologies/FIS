<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'heading',
        'sub_heading',
        'content',
        'has_image',
        'image',
        'has_btn',
        'btn_text',
        'btn_link',
        'pages_id',
        'seo_title',
        'og_title',
        'twitter_title',
        'seo_description',
        'og_description',
        'twitter_description',
        'keywords'
    ];

    public function page()
    {
        return $this->belongsTo(Pages::class);
    }
}
