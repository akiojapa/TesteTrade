<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampeonatoFormRequest;
use App\Models\Campeonato;
use App\Models\Jogo;
use App\Models\Time;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampeonatoController extends Controller
{
    public function index()
    {
        $campeonatos = Campeonato::with([
            'jogos' => function ($query) {
                $query->whereIn('fase', ['Final', '3 Lugar']);
            },
            'jogos.timeCasa',
            'jogos.timeVisitante',
            'eliminacoes' => function ($query) {
                $query->whereIn('posicao_eliminacao', ['Final', '3 Lugar']);
            },
            'eliminacoes.timeEliminado',
        ])->get();    
        $campeonatoAtivo = Campeonato::whereDoesntHave('eliminacoes', function ($query) {
            $query->where('posicao_eliminacao', 'Final');
        })->with(['jogos', 'jogos.timeCasa', 'jogos.timeVisitante', 'eliminacoes', 'eliminacoes.timeEliminado'])->first();

        $campeonatos = $campeonatos->filter(function ($campeonato) use ($campeonatoAtivo) {
            return $campeonato->id_campeonato != $campeonatoAtivo->id_campeonato;
        });

    
        return response()->json([
            'campeonatos' => $campeonatos->values(),
            'campeonato_ativo' => $campeonatoAtivo,
        ]);
    }

    public function show($id)
    {
        $campeonato = Campeonato::find($id);
        return response()->json($campeonato);
    }

    public function store(Request $request)
    {
        $times = $request->all();
    
        $campeonato = Campeonato::create([
            'nome_campeonato' => '#' . (Campeonato::count() + 1),
            'ano_campeonato' => date('Y'),
        ]);
    
        $this->criarQuartasDeFinais($campeonato, $times);
    
        return response()->json(['mensagem' => 'Campeonato criado com sucesso']);
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

    private function criarQuartasDeFinais(Campeonato $campeonato, array $times)
    {
        shuffle($times);
    
        $jogos = [];
        for ($i = 0; $i < count($times); $i += 2) {
            $jogo = new Jogo([
                'id_time_casa' => $times[$i]['id_time'],
                'id_time_visitante' => $times[$i + 1]['id_time'],
                'gols_time_casa' => 0,
                'gols_time_visitante' => 0,
                'fase' => 'Quartas de Final',
                'data_jogo' => now(),
            ]);
    
            $jogos[] = $jogo;
        }
    
        $campeonato->jogos()->saveMany($jogos);
    }

        public function obterCampeonatoEmAtividade()
    {
        $campeonato = Campeonato::whereDoesntHave('eliminacoes', function ($query) {
            $query->where('posicao_eliminacao', 'Final');
        })->with(['jogos', 'jogos.timeCasa', 'jogos.timeVisitante', 'eliminacoes', 'eliminacoes.timeEliminado'])->first();

        return response()->json($campeonato);
    }

}
