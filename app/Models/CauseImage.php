<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CauseImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'cause_id',
        'image'
    ];
}
