<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'created_at'
    ];
}
