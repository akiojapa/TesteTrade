// src/Navegacao.tsx

import React from 'react';
import { Link } from 'react-router-dom';

const Navegacao: React.FC = () => {
  return (
    <nav>
      <ul>
        <li>
          <Link to="/">Página Inicial</Link>
        </li>
        <li>
          <Link to="/">Em Branco</Link>
        </li>
      </ul>
    </nav>
  );
};

export default Navegacao;
