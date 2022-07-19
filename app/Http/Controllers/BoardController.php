<?php

namespace App\Http\Controllers;

use App\Actions\Assets\CreateNewAsset;
use App\Models\Asset;
use App\Models\AssetSubcategory;
use App\Models\Board;
use App\Models\HardwareAsset;
use App\Models\SoftwareAsset;
use App\Models\Tile;
use App\Models\Utilization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class BoardController extends Controller
{
    public function index(Request $request): InertiaResponse
    {
        return Inertia::render('Boards/Index', [
            'boards' => 'hello',
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attr' => 'required',
        ]);

        return redirect()->route('boards.index');
    }

    public function create(Request $request)
    {
        $user = $request->user();
        $tiles = $user->tileConfigurations;
        return Inertia::render('Boards/Create', [
            'tiles' => Tile::all()
        ]);
    }

    public function show(Request $request, Board $board): InertiaResponse
    {
        return Inertia::render('Boards/Show', [
            'board' => $board,
            'boardTiles' => $board->boardTiles
           ]);
    }

    public function update(Request $request)
    {
        return back();
    }

    public function destroy(Request $request, Board $board)
    {
        return back();
    }
}
