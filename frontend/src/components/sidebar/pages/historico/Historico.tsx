// src/components/Historico.tsx

import React, { useEffect, useState } from 'react';
import './Historico.css'; // Importe os estilos







const Historico: React.FC = () => {


const [campeonato, setCampeonato] = useState({});
  
  useEffect(() => {
      const fetchCampeonato = async () => {
          const response = await fetch('http://localhost:8000/api/times/4');
          const data = await response.json();
          setCampeonato(data);
      };
      
      fetchCampeonato();
  }, []); // Adiciona uma dependência vazia para que este useEffect seja executado apenas uma vez na montagem do componente
  
  useEffect(() => {
      console.log(campeonato);
  }, [campeonato]); // Este useEffect será executado sempre que 'campeonato' mudar


  return (
    <div className="historico">
      <h1>Histórico</h1>
      <p>Breve descrição sobre o histórico do campeonato.</p>
      {/* Adicione o restante dos elementos conforme necessário */}
    </div>
  );
};

export default Historico;
