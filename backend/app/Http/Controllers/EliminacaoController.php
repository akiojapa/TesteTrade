<?php

namespace App\Http\Controllers;

use App\Models\Eliminacao;
use Illuminate\Http\Request;

class EliminacaoController extends Controller
{
    public function index()
    {
        $eliminacoes = Eliminacao::all();
        return response()->json($eliminacoes);
    }

    public function show($id)
    {
        $eliminacao = Eliminacao::find($id);
        return response()->json($eliminacao);
    }

    public function store(Request $request)
    {
        $eliminacao = Eliminacao::create($request->all());
        return response()->json($eliminacao, 201);
    }

    public function update(Request $request, $id)
    {
        $eliminacao = Eliminacao::findOrFail($id);
        $eliminacao->update($request->all());
        return response()->json($eliminacao, 200);
    }

    public function destroy($id)
    {
        $eliminacao = Eliminacao::findOrFail($id);
        $eliminacao->delete();
        return response()->json(null, 204);
    }
}
