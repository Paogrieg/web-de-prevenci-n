import { useState } from 'react'
import { Link } from 'react-router-dom'
import api from '../services/api.js'
import AuthLayout from '../components/layout/AuthLayout.jsx'
import toast from 'react-hot-toast'

export default function Verify() {
  const [resent, setResent] = useState(false)
  const [loading, setLoading] = useState(false)

  const handleResend = async (e) => {
    e.preventDefault()
    setLoading(true)
    try {
      await api.post('/email/verification-notification')
      setResent(true)
      toast.success('Enlace de verificación enviado')
    } catch (err) {
      toast.error(err.response?.data?.message || 'No se pudo reenviar el enlace')
    } finally {
      setLoading(false)
    }
  }

  return (
    <AuthLayout
      title="Verifica tu correo electrónico"
      footer={<Link to="/login">Volver al inicio de sesión</Link>}
    >
      {resent && (
        <div style={{
          background: '#d1fae5', border: '1px solid #10b981', color: '#065f46',
          borderRadius: 10, padding: '12px 16px', marginBottom: 16, fontSize: 13,
        }}>
          <i className="fa-solid fa-circle-check"></i> Se envió un nuevo enlace de verificación a tu correo.
        </div>
      )}

      <p style={{ fontSize: 14, color: 'var(--text-secondary)', textAlign: 'center', marginBottom: 24 }}>
        Antes de continuar, revisa tu correo electrónico para encontrar el enlace de verificación.
      </p>

      <p style={{ fontSize: 13, color: 'var(--text-secondary)', textAlign: 'center', marginBottom: 16 }}>
        Si no recibiste el correo,
      </p>

      <form onSubmit={handleResend}>
        <button type="submit" className="btn-login" disabled={loading}>
          {loading
            ? <><i className="fa-solid fa-spinner fa-spin"></i> Enviando...</>
            : <><i className="fa-solid fa-paper-plane"></i> Solicitar otro enlace</>}
        </button>
      </form>
    </AuthLayout>
  )
}
