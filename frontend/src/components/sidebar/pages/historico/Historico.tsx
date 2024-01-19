// src/components/Historico.tsx

import React, { useEffect, useState } from 'react';
import './Historico.css'; // Importe os estilos
import TabelaHistorico from '../../../tables/TabelaHistorico/TabelaHistorico';







const Historico: React.FC = () => {


const [campeonatos, setCampeonato] = useState([]);
  
  useEffect(() => {
      const fetchCampeonato = async () => {
          const response = await fetch('http://localhost:8000/api/campeonatos');
          const data = await response.json();
          setCampeonato(data);
      };
      
      fetchCampeonato();
  }, []); // Adiciona uma dependência vazia para que este useEffect seja executado apenas uma vez na montagem do componente
  
  useEffect(() => {
      console.log(campeonatos);
  }, [campeonatos]); // Este useEffect será executado sempre que 'campeonato' mudar


  return (
    <div className="historico">
      <h1>Histórico</h1>
      <p>Breve descrição sobre o histórico do campeonato.</p>
      <TabelaHistorico campeonatos={campeonatos} />
    </div>
  );
};

export default Historico;
