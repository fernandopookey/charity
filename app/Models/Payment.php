<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     "title",
    //     "raised",
    //     "goal",
    //     'photos',
    //     "description",
    // ];

    public function cause()
    {
        return $this->belongsTo(Cause::class, 'cause_id', 'id');
    }
}
