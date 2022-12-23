<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pages extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id_name',
        'page_name',
        'banner_text',
        'banner_content',
        'banner_btn_text',
        'banner_btn_link',
        'banner_image',
        'seo_url',
    ];

    public function moudels()
    {
        return $this->hasMany(Modules::class);
    }

    public function getFunctionName()
    {
        return Str::camel($this->page_id_name);
    }
}
