<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function index()
    {
        $jogos = Jogo::all();
        return response()->json($jogos);
    }

    public function show($id)
    {
        $jogo = Jogo::find($id);
        return response()->json($jogo);
    }

    public function store(Request $request)
    {
        $jogo = Jogo::create($request->all());
        return response()->json($jogo, 201);
    }

    public function update(Request $request, $id)
    {
        $jogo = Jogo::findOrFail($id);
        $jogo->update($request->all());
        return response()->json($jogo, 200);
    }

    public function destroy($id)
    {
        $jogo = Jogo::findOrFail($id);
        $jogo->delete();
        return response()->json(null, 204);
    }
}
