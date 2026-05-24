import { useState } from 'react'
import { Link, useNavigate, Navigate } from 'react-router-dom'
import { useAuth } from '../context/AuthContext.jsx'
import AuthLayout from '../components/layout/AuthLayout.jsx'
import toast from 'react-hot-toast'
import "../styles/styles.css"; 

export default function Login() {
  const { user, login } = useAuth()
  const navigate = useNavigate()
  const [form, setForm]       = useState({ email: '', password: '', remember: false })
  const [errors, setErrors]   = useState({})
  const [loading, setLoading] = useState(false)
  const [generalError, setGeneralError] = useState(null)


  if (user) {
    return <Navigate to={user.rol === 'admin' ? "/dashboard" : "/feed"} replace />
  }

  const onChange = (e) => {
    const { name, value, type, checked } = e.target
    setForm({ ...form, [name]: type === 'checkbox' ? checked : value })
  }

  const handleSubmit = async (e) => {
    e.preventDefault()
    setErrors({})
    setGeneralError(null)
    setLoading(true)
    try {
      const res = await login(form) 
      toast.success('Bienvenida')
      if (res.user?.rol === 'admin') {
        navigate('/dashboard')
      } else {
        navigate('/feed')
      }
      
    } catch (err) {
      if (err.response?.status === 422) {
        setErrors(err.response.data.errors || {})
      } else {
        setGeneralError('Correo o contraseña incorrectos.')
      }
    } finally {
      setLoading(false)
    }
  }

  return (
    <AuthLayout
      title="Acceso para administradoras"
      error={generalError}
      footer={
        <>
          <Link to="/forgot-password">¿Olvidaste tu contraseña?</Link>
          <br /><br />
          <Link to="/register">¿No tienes cuenta? Regístrate</Link>
        </>
      }
    >
      <form onSubmit={handleSubmit} noValidate>
        <div className="login-form-group">
          <label htmlFor="email">Correo electrónico</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-envelope"></i>
            <input
              id="email" type="email" name="email"
              value={form.email} onChange={onChange}
              required autoComplete="email" autoFocus
              className={errors.email ? 'is-invalid form-control' : 'form-control'} 
            />
          </div>
          {errors.email && <span className="login-invalid-feedback">{errors.email[0]}</span>}
        </div>

        <div className="login-form-group">
          <label htmlFor="password">Contraseña</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-lock"></i>
            <input
              id="password" type="password" name="password"
              value={form.password} onChange={onChange}
              required autoComplete="current-password"
              className={errors.password ? 'is-invalid form-control' : 'form-control'}
            />
          </div>
          {errors.password && <span className="login-invalid-feedback">{errors.password[0]}</span>}
        </div>

        <div className="login-remember-row">
          <input
            type="checkbox" id="remember" name="remember"
            checked={form.remember} onChange={onChange}
            className="form-check-input"
          />
          <label htmlFor="remember" className="form-check-label">Recordar sesión</label>
        </div>

        <button type="submit" className="btn-login" disabled={loading}>
          {loading
            ? <><i className="fa-solid fa-spinner fa-spin"></i> Iniciando...</>
            : <><i className="fa-solid fa-right-to-bracket"></i> Iniciar sesión</>}
        </button>
      </form>
    </AuthLayout>
  )
}