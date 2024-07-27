<?php
namespace App\Repositories;

use App\Interfaces\MusicRepositoryInterface;
use App\Models\Music;
use Illuminate\Support\Collection;
use PhpParser\Node\Expr\Cast\Object_;

class MusicRepository implements MusicRepositoryInterface
{
    public function all(): Collection
    {
        return Music::all();
    }

    public function find(int $id): ?Music
    {
        return Music::find($id);
    }

    public function searchByName(string $name): Collection
    {
        return Music::where('title', 'like', "%$name%")->get();
    }

    public function create(array $data): Music
    {
        return Music::create($data);
    }

    public function update(int $id, array $data): ?Music
    {
        $music = $this->find($id);
        if ($music) {
            $music->update($data);
        }
        return $music;
    }

    public function delete(int $id): bool
    {
        $music = $this->find($id);
        return $music ? $music->delete() : false;
    }
}
