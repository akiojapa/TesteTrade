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
    public function index(Request $request) {

        if(!Auth::check()) {
            throw new AuthenticationException();
        }
       
        $campeonato = Campeonato::all();
        $mensagemSucesso = session('mensagem.sucesso');


        return view('campeonato.index')->with('campeonato', $campeonato)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(){

        $times = Time::all();

        return view('campeonato.create', ['times' => $times]);
    }

    public function store(CampeonatoFormRequest $request) {

        // $nomeCampeonato = $request->input('nome');

        // $serie = new Campeonato();
        // $serie->nome = $nomeCampeonato;
        // $serie->save();
        

        $campeonato = Campeonato::create($request->all());

        // $request->session()->flash('mensagem.sucesso', "Série {$serie->nome} adicionada com sucesso!");

        // return redirect()->route('campeonato.index');

        return to_route('campeonato.index')->with('mensagem.sucesso', "Série {$campeonato->nome} adicionada com sucesso!");

    }

    public function destroy(Campeonato $campeonato) {

        $campeonato->delete();

        // Campeonato::destroy($request->campeonato);

        return to_route('campeonato.index')->with('mensagem.sucesso', "Série {$campeonato->nome} removida com sucesso!");

    }

    public function edit(Campeonato $campeonato) {

        

        return view('campeonato.edit')->with('campeonato', $campeonato);

    }

    public function update(Campeonato $campeonato, CampeonatoFormRequest $request) {

        $campeonato->fill($request->all());
        $campeonato->save();

        return to_route('campeonato.index')->with('mensagem.sucesso', "Série {$campeonato->nome} alterada com sucesso!");
        
    }


}
