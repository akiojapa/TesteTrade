import React, { useEffect } from 'react';
import { Time } from '../../../../types/Time';
import './campeonato.css';
import { Jogo } from '../../../../types/Jogo';
import Loading from '../../../loading/Loading';

const Campeonato: React.FC = () => {
    const token = localStorage.getItem('token') ?? '';

    const [times, setTimes] = React.useState([])
    const [timesEscolhidos, setTimesEscolhidos] = React.useState<Time[]>([]);
    const [campeonato, setCampeonato] = React.useState({});
    const [isModalOpen, setIsModalOpen] = React.useState(false);
    const [time, setTime] = React.useState<Time>({} as Time);
    const [loading, setLoading] = React.useState(false);

    React.useEffect(() => { 

      setLoading(true);

      fetch('http://localhost:8000/api/times/', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
      
      })
        .then(response => response.json())
        .then(data => setTimes(data));
  
      fetch('http://localhost:8000/api/campeonatos/', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
      
      
      })
        .then(response => response.json())
        .then(data => {
          setCampeonato(data.campeonato_ativo)
          setLoading(false)
        });
      
    }, []);

    useEffect(() => {
      console.log(campeonato)
    },[campeonato])

    const handleCheckboxChange = (time: Time, isChecked: boolean) => {
      if (isChecked) {
        setTimesEscolhidos(prevTimes => [...prevTimes, time]);
      } else {
        setTimesEscolhidos(prevTimes => prevTimes.filter(t => t.id_time !== time.id_time));
      }
    };

    const handleOpenModal = () => {
      setIsModalOpen(true);
    };
  
    const handleCloseModal = () => {
      setIsModalOpen(false);
    };

    const handleCriarCampeonato = async () => {
      try {
          const response = await fetch('http://localhost:8000/api/campeonatos', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
              },
              body: JSON.stringify(timesEscolhidos),
          });
  
          const data = await response.json();
  
          console.log(data.mensagem); // Mensagem da API
      } catch (error) {
          console.error('Erro ao criar campeonato:', error);
      }
  };



    const handleSubmit = async (e: React.FormEvent) => {
      e.preventDefault();
      try {
        const response = await fetch('http://localhost:8000/api/times', {
          method: 'POST',
          headers: {
              'Authorization': `Bearer ${token}`,
              'Accept': 'application/json'
          },
          body: JSON.stringify(time),
        });
  
        if (response.ok) {
          console.log('Time criado com sucesso!');
        } else {
          console.error('Erro ao criar o time');
        }
      } catch (error) {
        console.error('Erro na requisição:', error);
      }
    };



  return (
    <div>
      {loading ? <Loading /> :( <>
      <h2>Campeonato</h2>
      <p>Aqui será criado um campeonato</p>
      {!campeonato ? (
      <>
      {times.map((time: Time, index) => (
  <div className='container' key={index}>
    <input 
      type="checkbox" 
      id={`time-${time.id_time}`} 
      value={time.id_time} 
      onChange={(e) =>  handleCheckboxChange(time, e.target.checked)}
    />
    <label htmlFor={`time-${time.id_time}`}>{time.nome_time}</label>
  </div>
  
))}


</>) :(<>
<h1>
  {'Campeonato ' + campeonato.nome_campeonato}
</h1>
</>)
      }
  <div className='buttons'>
  {times.length !==8 && <button className='btn btn-primary' onClick={handleOpenModal}>Criar Time</button>}

 {isModalOpen && (
        <div className="modal">
          <h2>Criar novo Time</h2>
            <form onSubmit={handleSubmit}>
              <label htmlFor="nome_time">Nome do Time:</label>
              <input onChange={(e) => setTime({...time, nome_time: e.target.value})} type="text" id="nome_time" name="nome_time" value={time?.nome_time??''} />

              <label htmlFor="pais">País:</label>
              <input onChange={(e) => setTime({...time, pais: e.target.value})} type="text" id="pais" name="pais" value={time?.pais??''}/>

              <label htmlFor="liga">Liga:</label>
              <input onChange={(e) => setTime({...time, liga: e.target.value})} type="text" id="liga" name="liga" value={time?.liga??''}/>

              <label htmlFor="temporada">Temporada:</label>
              <input onChange={(e) => setTime({...time, temporada: e.target.value})} type="text" id="temporada" name="temporada"  value={time?.temporada??''}/>

              <label htmlFor="inscricao">Ano de inscrição:</label>
              <input onChange={(e) => setTime({...time, data_inscricao: e.target.value})} type="date" id="inscricao" name="inscricao"  value={time?.data_inscricao ?? new Date().toISOString().substring(0, 10)}/>


              <button type="submit">Criar Time</button>
            </form>
          <button onClick={handleCloseModal}>Fechar</button>
        </div>
      )}
  {!campeonato && <button className='m-4' disabled={timesEscolhidos.length !== 8} onClick={handleCriarCampeonato}>{'Criar campeonato'}</button> }
  </div>
  <div className="container">
  <h2>Chaves</h2>
  <div className="row">
    {campeonato?.jogos?.map((jogo: Jogo, index) => (
      <div key={jogo.id_jogo} className="card">
        <div className="card-body">
          <h5 className="card-title">Jogo #{jogo.id_jogo}</h5>
          <p className="card-text">
            {jogo.time_casa.nome_time} vs {jogo.time_visitante.nome_time}
          </p>
          <p className="card-text">Data do Jogo: {jogo.data_jogo}</p>
          <button className="btn btn-primary">Simular</button>
        </div>
        {index < campeonato.jogos.length - 1 && <div className="connector"></div>}
      </div>
    ))}
  </div>
</div>
</>
)}
</div>
  


  );
};

export default Campeonato;