import { useState } from 'react'
import { Link } from 'react-router-dom'
import api from '../services/api.js'
import AuthLayout from '../components/layout/AuthLayout.jsx'
import toast from 'react-hot-toast'
import "../styles/styles.css"; 

export default function ForgotPassword() {
  const [email, setEmail] = useState('')
  const [sent, setSent] = useState(false)
  const [errors, setErrors] = useState({})
  const [loading, setLoading] = useState(false)

  const handleSubmit = async (e) => {
    e.preventDefault()
    setErrors({})
    setLoading(true)
    try {
      await api.post('/forgot-password', { email })
      setSent(true)
      toast.success('Enlace enviado')
    } catch (err) {
      if (err.response?.status === 422) {
        setErrors(err.response.data.errors || {})
      } else {
        toast.error(err.response?.data?.message || 'No se pudo enviar el enlace')
      }
    } finally {
      setLoading(false)
    }
  }

  return (
    <AuthLayout
      title="Recuperar contraseña"
      footer={<Link to="/login">Volver al inicio de sesión</Link>}
    >
      {sent ? (
        <div style={{
          background: '#d1fae5', border: '1px solid #10b981', color: '#065f46',
          borderRadius: 10, padding: '12px 16px', marginBottom: 16, fontSize: 13,
        }}>
          <i className="fa-solid fa-circle-check"></i> Te enviamos un correo con instrucciones para restablecer tu contraseña.
        </div>
      ) : (
        <p style={{ fontSize: 14, color: 'var(--text-secondary)', textAlign: 'center', marginBottom: 24 }}>
          Ingresa tu correo y te enviaremos un enlace para restablecer tu contraseña.
        </p>
      )}

      <form onSubmit={handleSubmit} noValidate>
        <div className="login-form-group">
          <label htmlFor="email">Correo electrónico</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-envelope"></i>
            <input
              id="email" type="email" name="email"
              value={email} onChange={(e) => setEmail(e.target.value)}
              required autoComplete="email" autoFocus
              className={errors.email ? 'is-invalid' : ''}
            />
          </div>
          {errors.email && <span className="login-invalid-feedback">{errors.email[0]}</span>}
        </div>

        <button type="submit" className="btn-login" disabled={loading}>
          {loading
            ? <><i className="fa-solid fa-spinner fa-spin"></i> Enviando...</>
            : <><i className="fa-solid fa-paper-plane"></i> Enviar enlace</>}
        </button>
      </form>
    </AuthLayout>
  )
}
