<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'heading',
        'sub_heading',
        'content',
        'created_at'
    ];
}
