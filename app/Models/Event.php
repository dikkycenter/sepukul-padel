<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'event_date',
        'description',
        'flag',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    protected static function booted()
    {
        static::creating(function ($event) {
            $slug = Str::slug($event->title);
            $count = self::where('slug', 'LIKE', "{$slug}%")->count();
            $event->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function scopeUpcoming($query)
    {
        return $query->whereDate('event_date', '>=', now())
            ->orderBy('event_date', 'asc');
    }

    public function scopePast($query)
    {
        return $query->whereDate('event_date', '<', now())
            ->orderBy('event_date', 'desc');
    }
}
