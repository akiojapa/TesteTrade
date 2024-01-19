// Seu arquivo principal onde define as rotas

import './App.css';
import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Historico from './components/sidebar/pages/historico/Historico';
import Campeonato from './components/sidebar/pages/campeonato/Campeonato';
import Login from './components/sidebar/pages/login/Login';
import PrivateRoute from './components/PrivateRoute';
import { AuthProvider } from './context/AuthProvider/AuthProvider';

const App: React.FC = () => {
  return (
<Router>
  <AuthProvider>
    <div className="container">
      <main>
        <Routes>
          <Route path="/historico" element={<PrivateRoute element={<Historico />} />} />
          <Route path="/campeonatos" element={<PrivateRoute element={<Campeonato />} />} />
          <Route path="/login" element={<Login />} />
        </Routes>
      </main>
    </div>
  </AuthProvider>
</Router>
  );
};

export default App;
