import { Time } from "./Time";

export interface Jogo {
    id_jogo: number;
    id_time_casa: number;
    id_time_visitante: number;
    gols_time_casa: number;
    gols_time_visitante: number;
    fase: string;
    data_jogo: Date;
    id_campeonato: number;
    created_at: Date;
    updated_at: Date;
    time_casa: Time;
    time_visitante: Time;
  }