<?php
namespace App\Interfaces;

use App\Models\Album;
use Illuminate\Database\Eloquent\Collection;

interface AlbumRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Album;

    public function searchByName(string $name): Collection;

    public function create(array $data): Album;

    public function update(int $id, array $data): ?Album;

    public function delete(int $id): bool;
}
