<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'artist', 'genre', 'cover_image'];

    public function musics()
    {
        return $this->hasMany(Music::class);
    }
}
