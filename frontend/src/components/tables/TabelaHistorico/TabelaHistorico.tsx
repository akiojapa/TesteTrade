

import { useEffect, useState } from "react";
import { Campeonato } from "../../../types/Campeonato";
import { Jogo } from "../../../types/Jogo";
import { Time } from "../../../types/Time";
// import DetalhesCampeonato from "./DetalhesHistorico";


interface TabelaHistoricoProps {
    campeonatos: Campeonato[]; 
  }


const TabelaHistorico: React.FC<TabelaHistoricoProps> = ({ campeonatos }) => {


    useEffect(() => {
        (campeonatos)
    },[campeonatos])

    return (
        <div className="tabela-historico">
        <h2>Tabela de Histórico</h2>
        {campeonatos.map((campeonato) => (
          <div key={campeonato.id_campeonato} className="campeonato-container">
            <h3>{campeonato.nome_campeonato}</h3>
            <div className="card-deck">
              {campeonato.posicoes?.map((time: Time, index: number) => (
                <div key={index} className="card">
                  <div className="card-body">
                    <h5 className="card-title">Posição: {index + 1} º Lugar</h5>
                    <p className="card-text">{time?.nome_time}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        ))}
      </div>
    );
  };
  
  export default TabelaHistorico;
  