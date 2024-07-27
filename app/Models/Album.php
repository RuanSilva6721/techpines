<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';
    protected $fillable = ['title', 'artist', 'genre', 'image_path'];

    public function musics()
    {
        return $this->hasMany(Music::class);
    }
}
