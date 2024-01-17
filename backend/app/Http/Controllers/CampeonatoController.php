<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampeonatoFormRequest;
use App\Models\Campeonato;
use App\Models\Time;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampeonatoController extends Controller
{
    public function index()
    {
        $campeonatos = Campeonato::with(['jogos', 'jogos.timeCasa', 'jogos.timeVisitante', 'eliminacoes', 'eliminacoes.timeEliminado'])->get();
        return response()->json($campeonatos);
    }

    public function show($id)
    {
        $campeonato = Campeonato::find($id);
        return response()->json($campeonato);
    }

    public function store(Request $request)
    {
        $campeonato = Campeonato::create($request->all());
        return response()->json($campeonato, 201);
    }

    public function update(Request $request, $id)
    {
        $campeonato = Campeonato::findOrFail($id);
        $campeonato->update($request->all());
        return response()->json($campeonato, 200);
    }

    public function destroy($id)
    {
        $campeonato = Campeonato::findOrFail($id);
        $campeonato->delete();
        return response()->json(null, 204);
    }

    public function getDetails($id){

        $campeonato = Campeonato::with('jogos.time', 'eliminacoes')->find($id);
        return response()->json($campeonato);

    }

}
