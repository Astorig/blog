<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Model;

class Articles extends Model
{
    use HasFactory;

    protected $casts = [
        'published' => 'boolean'
    ];
}
