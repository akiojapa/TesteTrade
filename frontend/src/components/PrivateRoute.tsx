import React from 'react';
import { Navigate } from 'react-router-dom';
import { useAuth } from '../context/AuthProvider/AuthProvider';
import Sidebar from './sidebar/Sidebar';

interface PrivateRouteProps {
  element: React.ReactElement;
}

const PrivateRoute: React.FC<PrivateRouteProps> = ({ element }) => {
  const { isAuthenticated } = useAuth();

  return isAuthenticated ? (
    <>
    <div style={{ display: 'flex' }}>
      <Sidebar />
      <div style={{ flex: 1 }}>{element}</div>
    </div>
    </>
  ) : (
    <Navigate to="/login" />
  );
};

export default PrivateRoute;