<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Http\Requests\StoreMusicRequest;
use App\Http\Requests\UpdateMusicRequest;
use App\Services\MusicService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    protected $musicService;

    public function __construct(MusicService $musicService)
    {
        $this->musicService = $musicService;
    }

    public function index(): JsonResponse
    {
        $musics = $this->musicService->getAllMusics();
        return response()->json($musics);
    }

    public function show(int $id): JsonResponse
    {
        $music = $this->musicService->getMusicById($id);
        return $music ? response()->json($music) : response()->json(['message' => 'Música não encontrada'], 404);
    }

    public function search(Request $request): JsonResponse
    {
        $name = $request->input('name');
        $musics = $this->musicService->searchMusicsByName($name);
        return response()->json($musics);
    }

    public function store(Request $request): JsonResponse
    {
        $music = $this->musicService->createMusic($request->all());
        return response()->json($music, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $music = $this->musicService->updateMusic($id, $request->all());
        return $music ? response()->json($music) : response()->json(['message' => 'Música não encontrada'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->musicService->deleteMusic($id);
        return $deleted ? response()->json(null, 204) : response()->json(['message' => 'Música não encontrada'], 404);
    }
}
