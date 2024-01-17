// src/App.tsx

import React from 'react';
import './App.css';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Sidebar from './components/sidebar/Sidebar';
import Historico from './components/sidebar/pages/historico/Historico';

const App: React.FC = () => {
  return (
    <Router>
      <div className="app-container">
      <Sidebar />
        <main>
          <Routes>
            <Route path="/historico" element={<Historico />} />
            <Route path="/campeonatos" element={<h2>Página Inicial</h2>} />
          </Routes>
        </main>
      </div>
    </Router>
  );
};

export default App;
