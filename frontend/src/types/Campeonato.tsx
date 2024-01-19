import { Eliminacao } from "./Eliminacao";
import { Jogo } from "./Jogo";

export interface Campeonato {
    id_campeonato: number;
    nome_campeonato: string;
    ano_campeonato: number;
    created_at: Date;
    updated_at: Date;
    jogos: Jogo[];
    eliminacoes: Eliminacao[];
  }