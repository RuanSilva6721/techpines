<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Music;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    protected $model = Music::class;

    public function definition(): array
    {
        return [
            'album_id' => Album::factory(),
            'title' => $this->faker->sentence(3),
            'duration' => $this->faker->randomFloat(2, 1, 10),
            'genre' => $this->faker->word,
        ];
    }
}
