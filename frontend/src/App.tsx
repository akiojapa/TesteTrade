// src/App.tsx

import React from 'react';
import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Sidebar from './components/sidebar/Sidebar';
import Historico from './components/sidebar/pages/historico/Historico';
import Campeonato from './components/sidebar/pages/campeonato/Campeonato';

const App: React.FC = () => {
  return (
    <Router>
      <div className="app-container">
      <Sidebar />
        <main>
          <Routes>
            <Route path="/historico" element={<Historico />} />
            <Route path="/campeonatos" element={<Campeonato />} />
          </Routes>
        </main>
      </div>
    </Router>
  );
};

export default App;
