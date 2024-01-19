
import React from 'react';
import { Link } from 'react-router-dom';
import './Sidebar.css'; 
import LogoutButton from './pages/login/LogoutButton';

const Sidebar: React.FC = () => {
  return (
    <div className="sidebar">
    <div className="sidebar-button">
      <Link to="/campeonatos" className="btn btn-primary btn-block">Campeonato</Link>
    </div>
    <div className="sidebar-button">
      <Link to="/historico" className="btn btn-primary btn-block">Histórico</Link>
    </div>
    <div className="sidebar-button logout-button">
      <LogoutButton />
    </div>
  </div>
  );
};

export default Sidebar;
