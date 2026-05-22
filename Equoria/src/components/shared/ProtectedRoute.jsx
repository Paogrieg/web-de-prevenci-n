import { Navigate } from 'react-router-dom'
import { useAuth } from '../../context/AuthContext.jsx'

export default function ProtectedRoute({ children }) {
  const { user, loading } = useAuth()

  if (loading) {
    return (
      <div style={{ display: 'flex', justifyContent: 'center', alignItems: 'center', height: '100vh' }}>
        <i className="fa-solid fa-spinner fa-spin" style={{ fontSize: 32, color: 'var(--plum-500)' }}></i>
      </div>
    )
  }

  if (!user) return <Navigate to="/login" replace />
  return children
}
