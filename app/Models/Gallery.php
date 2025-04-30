<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "note",
        "categories_id"
    ];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'categories_id');
    }

    // public function galleryImage()
    // {
    //     return $this->hasOne(GalleryImage::class, 'gallery_id', 'id');
    // }

    public function galleryImage()
    {
        return $this->hasMany(GalleryImage::class, 'gallery_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty("title")) {
                $model->slug = Str::slug($model->title);
            }
        });
    }
}
