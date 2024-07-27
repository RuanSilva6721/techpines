<?php

namespace App\Providers;

use App\Interfaces\AlbumRepositoryInterface;
use App\Interfaces\MusicRepositoryInterface;
use App\Repositories\AlbumRepository;
use App\Repositories\MusicRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AlbumRepositoryInterface::class, AlbumRepository::class);
        $this->app->bind(MusicRepositoryInterface::class, MusicRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
