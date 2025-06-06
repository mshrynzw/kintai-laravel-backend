<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'stamped_at'
    ];

    protected $casts = [
        'stamped_at' => 'datetime'
    ];
}
