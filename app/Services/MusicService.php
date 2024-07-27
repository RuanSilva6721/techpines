<?php
namespace App\Services;

use App\Interfaces\MusicRepositoryInterface;
use App\Models\Music;

use Illuminate\Support\Collection;

class MusicService
{
    protected $musicRepositoryInterface;
    public function __construct(MusicRepositoryInterface $musicRepositoryInterface)
    {
        $this->musicRepositoryInterface = $musicRepositoryInterface;
    }
   

}
