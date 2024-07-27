<?php
namespace App\Services;

use App\Interfaces\AlbumRepositoryInterface;
use App\Models\Album;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;

class AlbumService
{
    protected $albumRepository;

    public function __construct(AlbumRepositoryInterface $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    public function getAllAlbums(): Collection
    {
        return $this->albumRepository->all();
    }

    public function getAlbumById(int $id): ?Album
    {
        return $this->albumRepository->find($id);
    }

    public function searchAlbumsByName(string $name): Collection
    {
        return $this->albumRepository->searchByName($name);
    }

    public function createAlbum(array $data): Album
    {
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return $this->albumRepository->create($data);
    }

    public function updateAlbum(int $id, array $data): ?Album
    {
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return $this->albumRepository->update($id, $data);
    }

    public function deleteAlbum(int $id): bool
    {
        return $this->albumRepository->delete($id);
    }

}
