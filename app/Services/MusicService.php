<?php
namespace App\Services;

use App\Interfaces\MusicRepositoryInterface;
use App\Models\Music;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class MusicService
{
    protected $musicRepository;

    public function __construct(MusicRepositoryInterface $musicRepository)
    {
        $this->musicRepository = $musicRepository;
    }

    public function getAllMusics(): Collection
    {
        return $this->musicRepository->all();
    }

    public function getMusicById(int $id): ?Music
    {
        return $this->musicRepository->find($id);
    }

    public function searchMusicsByName(string $name): Collection
    {
        return $this->musicRepository->searchByName($name);
    }

    public function createMusic(array $data): Music
    {
        $validator = Validator::make($data, [
            'album_id' => 'required|exists:albums,id',
            'title' => 'required|string|max:255',
            'duration' => 'required|numeric|min:0',
            'genre' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return $this->musicRepository->create($data);
    }

    public function updateMusic(int $id, array $data): ?Music
    {
        $validator = Validator::make($data, [
            'album_id' => 'required|exists:albums,id',
            'title' => 'required|string|max:255',
            'duration' => 'required|numeric|min:0',
            'genre' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return $this->musicRepository->update($id, $data);
    }

    public function deleteMusic(int $id): bool
    {
        return $this->musicRepository->delete($id);
    }
}
