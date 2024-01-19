

import { Campeonato } from "../../../types/Campeonato";
import DetalhesCampeonato from "./DetalhesHistorico";


interface TabelaHistoricoProps {
    campeonatos: Campeonato[]; 
  }

const TabelaHistorico: React.FC<TabelaHistoricoProps> = ({ campeonatos }) => {
    return (
      <div className="tabela-historico">
        <h2>Tabela de Histórico</h2>
        <table className="tabela">
          <thead>
            <tr>
              <th>Campeonato</th>
              <th>Detalhes</th>
            </tr>
          </thead>
          <tbody>
            {campeonatos.map((campeonato: Campeonato) => (
              <tr key={campeonato.id_campeonato} className="linha-campeonato">
                <td>{campeonato.nome_campeonato}</td>
                <td>
                  <DetalhesCampeonato campeonato={campeonato} />
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    );
  };
  
  export default TabelaHistorico;
  