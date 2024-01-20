// src/components/Historico.tsx

import React, { useEffect, useState } from 'react';
import './Historico.css'; // Importe os estilos
import TabelaHistorico from '../../../tables/TabelaHistorico/TabelaHistorico';







const Historico: React.FC = () => {

const token = localStorage.getItem('token');


const [campeonatos, setCampeonato] = useState([]);
  
  useEffect(() => {
      const fetchCampeonato = async () => {
          const response = await fetch('http://localhost:8000/api/campeonatos', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            }
          });
          const data = await response.json();
          setCampeonato(data.campeonatos.map(campeonato => {
            const final = campeonato.jogos.find(jogo => jogo.fase === 'Final');
          
            const primeiro = [final.time_casa, final.time_visitante].find(time => !campeonato.eliminacoes.some(eliminacao => eliminacao.id_time_eliminado === time.id_time));
          
            const segundo = [final.time_casa, final.time_visitante].find(time => campeonato.eliminacoes.some(eliminacao => eliminacao.id_time_eliminado === time.id_time));
          
            const semifinal = campeonato.jogos.find(jogo => jogo.fase === '3 Lugar');
            const terceiro = [semifinal.time_casa, semifinal.time_visitante].find(time => !campeonato.eliminacoes.some(eliminacao => eliminacao.id_time_eliminado === time.id_time));
            const quarto = [semifinal.time_casa, semifinal.time_visitante].find(time => campeonato.eliminacoes.some(eliminacao => eliminacao.id_time_eliminado === time.id_time));
          
            const timesOrdenados = [primeiro, segundo, terceiro, quarto];
          
            return {
              ...campeonato,
              posicoes: timesOrdenados
            };
          }));
      };
      
      fetchCampeonato();
  }, []);
  useEffect(() => {
      (campeonatos);
  }, [campeonatos]); 

  

  return (
    <div className="historico">
      <h1>Histórico</h1>
      <p>Breve descrição sobre o histórico do campeonato.</p>
      <TabelaHistorico campeonatos={campeonatos} />
    </div>
  );
};

export default Historico;
