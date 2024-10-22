<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "raised",
        "goal",
        'photos',
        "description",
    ];

    public function causeImage()
    {
        return $this->hasOne(CauseImage::class, 'cause_id', 'id');
    }

    public function causePayment()
    {
        return $this->hasMany(Payment::class, 'cause_id', 'id');
    }
}
