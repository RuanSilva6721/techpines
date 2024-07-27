<?php
namespace App\Services;

use App\Interfaces\AlbumRepositoryInterface;
use App\Models\Album;

use Illuminate\Database\Eloquent\Collection;

class AlbumService
{
    protected $albumRepositoryInterface;
    public function __construct(AlbumRepositoryInterface $albumRepositoryInterface)
    {
        $this->albumRepositoryInterface = $albumRepositoryInterface;
    }

}
