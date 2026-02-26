<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $casts = [
        'image' => 'array',
        'event_date' => 'date',
    ];

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'event_date',
    ];

    protected static function booted()
    {
        static::creating(function ($gallery) {
            $slug = Str::slug($gallery->title);
            $count = self::where('slug', 'LIKE', "{$slug}%")->count();
            $gallery->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function getThumbnailAttribute()
    {
        return collect($this->image)->first();
    }
}
