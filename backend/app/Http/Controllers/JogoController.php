<?php

namespace App\Http\Controllers;

use App\Models\Eliminacao;
use App\Models\Jogo;
use App\Models\Time;
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

    public function simulate($id)
{
    $jogo = Jogo::findOrFail($id);

    $golsCasa = mt_rand(0, 8);
    $golsVisitante = mt_rand(0, 8);

    $jogo->gols_time_casa = $golsCasa;
    $jogo->gols_time_visitante = $golsVisitante;
    $jogo->save();

    $eliminacao = new Eliminacao();
    $eliminacao->id_time_eliminado =  $golsCasa > $golsVisitante ? $jogo->id_time_visitante : $jogo->id_time_casa;
    $eliminacao->id_jogo = $jogo->id_jogo;
    $eliminacao->posicao_eliminacao = $jogo->fase; 
    $eliminacao->id_campeonato = $jogo->id_campeonato; 

    $eliminacao->save();

    $numJogos = Jogo::where('id_campeonato', $jogo->id_campeonato)->count();
    $numEliminacoes = Eliminacao::where('id_campeonato', $jogo->id_campeonato)->count();
    if ($numJogos == $numEliminacoes) {
        if($numJogos == 4) {
            $this->createSemiFinals($jogo->id_campeonato);
        } else {
            if($jogo->fase == 'Semifinal') $this->createFinalAndThirdPlace($jogo->id_campeonato);
        }        
    }

    return response()->json($jogo, 200);
}


private function createSemiFinals($id_campeonato)
{
    $times = Eliminacao::where('id_campeonato', $id_campeonato)
        ->pluck('id_time_eliminado')
        ->all();
    
    $times = Time::whereNotIn('id_time', $times)->get();


    for ($i = 0; $i < count($times); $i += 2) {
        $jogo = new Jogo();
        $jogo->id_time_casa = $times[$i]['id_time'];
        $jogo->id_time_visitante = $times[$i + 1]['id_time'];
        $jogo->gols_time_casa = 0;
        $jogo->gols_time_visitante = 0;
        $jogo->fase = 'Semifinal';
        $jogo->data_jogo = now();
        $jogo->id_campeonato = $id_campeonato;
        $jogo->save();
    }
}

private function createFinalAndThirdPlace($id_campeonato)
{
    // Encontre os times que não foram eliminados
    $timesEliminados = Eliminacao::where('id_campeonato', $id_campeonato)
        ->pluck('id_time_eliminado')
        ->all();

    $times = Time::whereNotIn('id_time', $timesEliminados)->get();

    
    // Crie o jogo da final
    $jogoFinal = new Jogo();
    $jogoFinal->id_time_casa = $times[0]['id_time'];
    $jogoFinal->id_time_visitante = $times[1]['id_time'];
    $jogoFinal->gols_time_casa = 0;
    $jogoFinal->gols_time_visitante = 0;
    $jogoFinal->fase = 'Final';
    $jogoFinal->data_jogo = now();
    $jogoFinal->id_campeonato = $id_campeonato;
    $jogoFinal->save();
    
    //criar o jogo de terceiro lugar
    
    $times = Eliminacao::where('id_campeonato', $id_campeonato)
    ->where('posicao_eliminacao', 'Semifinal')
    ->pluck('id_time_eliminado')
    ->all();

    $jogoTerceiro = new Jogo();
    $jogoTerceiro->id_time_casa = $times[0];
    $jogoTerceiro->id_time_visitante = $times[1];
    $jogoTerceiro->gols_time_casa = 0;
    $jogoTerceiro->gols_time_visitante = 0;
    $jogoTerceiro->fase = '3 Lugar';
    $jogoTerceiro->data_jogo = now();
    $jogoTerceiro->id_campeonato = $id_campeonato;
    $jogoTerceiro->save();



}

    
}
