<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $fillable = [
        'seo_id',
        'seo_type',
        'title',
        'og_title',
        'twitter_title',
        'description',
        'og_description',
        'twitter_description',
    ];

    public function seo()
    {
        return $this->morphTo();
    }

    // public function seo()
    // {
    //     return $this->morphOne(Seo::class, 'seo');
    // }
}
