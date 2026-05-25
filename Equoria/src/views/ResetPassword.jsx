import { useState, useEffect } from 'react'
import { Link, useNavigate, useSearchParams } from 'react-router-dom'
import api from '../services/api.js'
import AuthLayout from '../components/layout/AuthLayout.jsx'
import toast from 'react-hot-toast'
import '../styles/styles.css'

export default function ResetPassword() {
  const [searchParams] = useSearchParams()
  const navigate = useNavigate()

  const token = searchParams.get('token') || ''
  const email = searchParams.get('email') || ''

  const [form, setForm] = useState({
    password: '',
    password_confirmation: '',
  })
  const [errors, setErrors] = useState({})
  const [loading, setLoading] = useState(false)
  const [showPassword, setShowPassword] = useState(false)
  const [showConfirm, setShowConfirm] = useState(false)
  const [done, setDone] = useState(false)

  // Si no hay token o email en la URL, redirigir
  useEffect(() => {
    if (!token || !email) {
      toast.error('Enlace de recuperación inválido.')
      navigate('/forgot-password', { replace: true })
    }
  }, [token, email, navigate])

  const onChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value })
  }

  const handleSubmit = async (e) => {
    e.preventDefault()
    setErrors({})

    // Validación básica en cliente
    if (form.password.length < 6) {
      setErrors({ password: ['La contraseña debe tener al menos 6 caracteres.'] })
      return
    }
    if (form.password !== form.password_confirmation) {
      setErrors({ password_confirmation: ['Las contraseñas no coinciden.'] })
      return
    }

    setLoading(true)
    try {
      await api.post('/reset-password', {
        token,
        email,
        password: form.password,
        password_confirmation: form.password_confirmation,
      })
      setDone(true)
      toast.success('¡Contraseña actualizada!')
      setTimeout(() => navigate('/login', { replace: true }), 3000)
    } catch (err) {
      if (err.response?.status === 422) {
        const serverErrors = err.response.data.errors || {}
        // Si el backend devuelve message general (no errores de campo)
        if (Object.keys(serverErrors).length === 0 && err.response.data.message) {
          setErrors({ general: err.response.data.message })
        } else {
          setErrors(serverErrors)
        }
      } else {
        setErrors({ general: err.response?.data?.message || 'Ocurrió un error. Intenta de nuevo.' })
      }
    } finally {
      setLoading(false)
    }
  }

  return (
    <AuthLayout
      title="Nueva contraseña"
      error={errors.general || null}
      footer={<Link to="/login">Volver al inicio de sesión</Link>}
    >
      {done ? (
        <div style={{
          background: '#d1fae5',
          border: '1px solid #10b981',
          color: '#065f46',
          borderRadius: 10,
          padding: '12px 16px',
          marginBottom: 16,
          fontSize: 14,
          textAlign: 'center',
        }}>
          <i className="fa-solid fa-circle-check" style={{ marginRight: 8 }}></i>
          ¡Contraseña actualizada! Redirigiendo al inicio de sesión...
        </div>
      ) : (
        <>
          <p style={{
            fontSize: 14,
            color: 'var(--text-secondary)',
            textAlign: 'center',
            marginBottom: 24,
          }}>
            Crea una nueva contraseña para <strong>{email}</strong>
          </p>

          <form onSubmit={handleSubmit} noValidate>
            {/* Nueva contraseña */}
            <div className="login-form-group">
              <label htmlFor="password">Nueva contraseña</label>
              <div className="login-input-wrap">
                <i className="fa-solid fa-lock"></i>
                <input
                  id="password"
                  type={showPassword ? 'text' : 'password'}
                  name="password"
                  value={form.password}
                  onChange={onChange}
                  required
                  autoFocus
                  className={errors.password ? 'is-invalid' : ''}
                  placeholder="Mínimo 6 caracteres"
                />
                <button
                  type="button"
                  onClick={() => setShowPassword(!showPassword)}
                  style={{ background: 'none', border: 'none', cursor: 'pointer', padding: '0 8px' }}
                  tabIndex={-1}
                >
                  <i className={`fa-solid ${showPassword ? 'fa-eye-slash' : 'fa-eye'}`}
                     style={{ color: 'var(--text-secondary)' }}></i>
                </button>
              </div>
              {errors.password && (
                <span className="login-invalid-feedback">{errors.password[0]}</span>
              )}
            </div>

            {/* Confirmar contraseña */}
            <div className="login-form-group">
              <label htmlFor="password_confirmation">Confirmar contraseña</label>
              <div className="login-input-wrap">
                <i className="fa-solid fa-lock"></i>
                <input
                  id="password_confirmation"
                  type={showConfirm ? 'text' : 'password'}
                  name="password_confirmation"
                  value={form.password_confirmation}
                  onChange={onChange}
                  required
                  className={errors.password_confirmation ? 'is-invalid' : ''}
                />
                <button
                  type="button"
                  onClick={() => setShowConfirm(!showConfirm)}
                  style={{ background: 'none', border: 'none', cursor: 'pointer', padding: '0 8px' }}
                  tabIndex={-1}
                >
                  <i className={`fa-solid ${showConfirm ? 'fa-eye-slash' : 'fa-eye'}`}
                     style={{ color: 'var(--text-secondary)' }}></i>
                </button>
              </div>
              {errors.password_confirmation && (
                <span className="login-invalid-feedback">{errors.password_confirmation[0]}</span>
              )}
            </div>

            <button type="submit" className="btn-login" disabled={loading}>
              {loading
                ? <><i className="fa-solid fa-spinner fa-spin"></i> Guardando...</>
                : <><i className="fa-solid fa-key"></i> Actualizar contraseña</>}
            </button>
          </form>
        </>
      )}
    </AuthLayout>
  )
}
