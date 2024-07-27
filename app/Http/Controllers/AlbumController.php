<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Services\AlbumService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    protected $albumService;

    public function __construct(AlbumService $albumService)
    {
        $this->albumService = $albumService;
    }

    public function index(): JsonResponse
    {
        $albums = $this->albumService->getAllAlbums();
        return response()->json($albums);
    }

    public function show(int $id): JsonResponse
    {
        $album = $this->albumService->getAlbumById($id);
        return $album ? response()->json($album) : response()->json(['message' => 'Album não encontrado'], 404);
    }

    public function search(Request $request): JsonResponse
    {
        $name = $request->input('name');
        $albums = $this->albumService->searchAlbumsByName($name);
        return response()->json($albums);
    }

    public function store(Request $request): JsonResponse
    {
        $album = $this->albumService->createAlbum($request->all());
        return response()->json($album, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $album = $this->albumService->updateAlbum($id, $request->all());
        return $album ? response()->json($album) : response()->json(['message' => 'Album não encontrado'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->albumService->deleteAlbum($id);
        return $deleted ? response()->json(null, 204) : response()->json(['message' => 'Album não encontrado'], 404);
    }

    public function musics(int $albumId): JsonResponse
    {
        $album = $this->albumService->getAlbumById($albumId);
        if (!$album) {
            return response()->json(['message' => 'Album não encontrado'], 404);
        }
        $musics = $album->musics;
        return response()->json($musics);
    }
}
