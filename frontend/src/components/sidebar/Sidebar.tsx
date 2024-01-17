
import React from 'react';
import { Link } from 'react-router-dom';
import './Sidebar.css'; 

const Sidebar: React.FC = () => {
  return (
    <div className="sidebar">
      <div className="sidebar-button">
        <Link to="/campeonatos">Campeonato</Link>
      </div>
      <div className="sidebar-button">
        <Link to="/historico">Histórico</Link>
      </div>
      <div className="sidebar-button logout-button">
        <button onClick={() => console.log('Botão de Logout clicado')}>Logout</button>
      </div>
    </div>
  );
};

export default Sidebar;
