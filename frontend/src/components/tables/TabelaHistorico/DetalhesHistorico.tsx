// DetalhesCampeonato.tsx

import { Campeonato } from "../../../types/Campeonato";

interface DetalhesCampeonatoProps {
    campeonato: Campeonato; 
  }
  
  const DetalhesCampeonato: React.FC<DetalhesCampeonatoProps> = ({ campeonato }) => {
    return (
      <div className="detalhes-campeonato">
        <h3>Jogos</h3>
        <ul>
          {campeonato.jogos.map((jogo) => (
            <li key={jogo.id_jogo}>
              {jogo.time_casa.nome_time} {jogo.gols_time_casa} vs {jogo.gols_time_visitante} {jogo.time_visitante.nome_time}
            </li>
          ))}
        </ul>
      </div>
    );
  };

  export default DetalhesCampeonato;