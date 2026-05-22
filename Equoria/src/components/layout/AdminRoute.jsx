import { Navigate, Outlet } from 'react-router-dom'
import { useAuth } from '../../context/AuthContext'

// 1. Agrega { children } en los parámetros de la función
export default function AdminRoute({ children }) {
  const { user, loading } = useAuth()

  if (loading) return <div>Cargando...</div>

  if (!user) return <Navigate to="/login" replace />

  if (user.rol !== 'admin') {
    return <Navigate to="/feed" replace />
  }

  return children ? children : <Outlet />
}