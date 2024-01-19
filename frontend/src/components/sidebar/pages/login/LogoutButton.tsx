import { useNavigate } from 'react-router-dom';

const LogoutButton = () => {
  const navigate = useNavigate();

  const handleLogout = () => {
    // Remova o token de autenticação
    localStorage.removeItem('token');

    // Redirecione o usuário para a página de login
    navigate('/login');
  };

  return (
    <button onClick={handleLogout} className="btn btn-danger btn-block">
      Logout
    </button>
  );
};

export default LogoutButton;