<?php

namespace App\Models;

use App\Traits\OptimizeImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'email',
        'avatar',
    ];

    public function score()
    {
        return $this->hasOne(Score::class);
    }

    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar && Storage::disk('public')->exists($this->avatar)) {
        return asset('storage/' . $this->avatar);
    }

    return 'https://ui-avatars.com/api/?name='
        . urlencode($this->name)
        . '&size=400&background=ffffff&color=1C3557';
    }
}
