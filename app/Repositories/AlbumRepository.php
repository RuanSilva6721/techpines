<?php
namespace App\Repositories;

use App\Interfaces\AlbumRepositoryInterface;
use App\Models\Album;
use Illuminate\Database\Eloquent\Collection;

class AlbumRepository implements AlbumRepositoryInterface
{
    public function all(): Collection
    {
        return Album::with('musics')->get();
    }

    public function find(int $id): ?Album
    {
        return Album::with('musics')->find($id);
    }

    public function searchByName(string $name): Collection
    {
        return Album::where('title', 'like', "%$name%")->with('musics')->get();
    }

    public function create(array $data): Album
    {
        return Album::create($data);
    }

    public function update(int $id, array $data): ?Album
    {
        $album = $this->find($id);
        if ($album) {
            $album->update($data);
        }
        return $album;
    }

    public function delete(int $id): bool
    {
        $album = $this->find($id);
        return $album ? $album->delete() : false;
    }
}
