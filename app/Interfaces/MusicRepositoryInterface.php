<?php
namespace App\Interfaces;

use App\Models\Product;
use App\Models\ProductMusic;
use App\Models\Music;
use Illuminate\Support\Collection;
use PhpParser\Node\Expr\Cast\Object_;

interface MusicRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Music;

    public function searchByName(string $name): Collection;

    public function create(array $data): Music;

    public function update(int $id, array $data): ?Music;

    public function delete(int $id): bool;

}
