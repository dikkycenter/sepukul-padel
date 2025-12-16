<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function score()
    {
        return $this->hasOne(Score::class);
    }

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'email',
        'avatar',
    ];
      
}
