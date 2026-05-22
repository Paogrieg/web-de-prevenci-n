import { useState, useRef } from 'react'
import { Link, useNavigate, Navigate } from 'react-router-dom'
import { useAuth } from '../context/AuthContext.jsx'
import { authApi } from '../services/endpoints.js'
import api from '../services/api.js'
import AuthLayout from '../components/layout/AuthLayout.jsx'
import toast from 'react-hot-toast'
import "../styles/styles.css"; 

const DOCUMENT_TYPES = [
  { value: 'ine',             label: 'INE / Credencial de elector' },
  { value: 'pasaporte',       label: 'Pasaporte' },
  { value: 'acta_nacimiento', label: 'Acta de nacimiento' },
  { value: 'curp',            label: 'CURP' },
]

const MAX_FILE_SIZE = 5 * 1024 * 1024 // 5 MB

const EMPTY = {
  name: '', lastname: '', email: '', phone_number: '',
  dateBirth: '', document_type: '', password: '', password_confirmation: '',
}

export default function Register() {
  const { user } = useAuth()
  const navigate = useNavigate()
  const fileInputRef = useRef(null)
  const [form, setForm]       = useState(EMPTY)
  const [document, setDocument] = useState(null)
  const [errors, setErrors]   = useState({})
  const [loading, setLoading] = useState(false)
  const [hasErrors, setHasErrors] = useState(false)

  if (user) return <Navigate to="/" replace />

  const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value })

  const onFileChange = (e) => {
    const file = e.target.files?.[0]
    if (!file) { setDocument(null); return }
    if (file.size > MAX_FILE_SIZE) {
      toast.error('El archivo no debe exceder 5MB')
      e.target.value = ''
      return
    }
    setDocument(file)
  }

  const handleSubmit = async (e) => {
    e.preventDefault()
    setErrors({})
    setHasErrors(false)

    // Validación básica del lado del cliente
    if (form.password !== form.password_confirmation) {
      setErrors({ password_confirmation: ['Las contraseñas no coinciden'] })
      setHasErrors(true)
      return
    }

    setLoading(true)
    try {
      // multipart/form-data por el archivo del documento
      const fd = new FormData()
      Object.entries(form).forEach(([key, value]) => fd.append(key, value))
      if (document) fd.append('document', document)

      await api.post('/register', fd, {
        headers: { 'Content-Type': 'multipart/form-data' },
      })
      toast.success('Cuenta creada correctamente. Revisa tu correo para verificarla.')
      navigate('/verify-email')
    } catch (err) {
      if (err.response?.status === 422) {
        setErrors(err.response.data.errors || {})
        setHasErrors(true)
      } else {
        toast.error(err.response?.data?.message || 'Error al registrarse')
      }
    } finally {
      setLoading(false)
    }
  }

  const errorOf = (field) => errors[field]?.[0]

  return (
    <AuthLayout
      title="Crear cuenta"
      maxWidth={480}
      error={hasErrors ? 'Por favor corrige los errores del formulario.' : null}
      footer={<Link to="/login">¿Ya tienes cuenta? Inicia sesión</Link>}
    >
      <form onSubmit={handleSubmit} noValidate>
        <div className="login-form-group">
          <label htmlFor="name">Nombre</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-user"></i>
            <input
              id="name" type="text" name="name" value={form.name}
              onChange={onChange} required autoComplete="name" autoFocus
              className={errorOf('name') ? 'is-invalid' : ''}
            />
          </div>
          {errorOf('name') && <span className="login-invalid-feedback">{errorOf('name')}</span>}
        </div>

        <div className="login-form-group">
          <label htmlFor="lastname">Apellido</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-user"></i>
            <input
              id="lastname" type="text" name="lastname" value={form.lastname}
              onChange={onChange} required autoComplete="family-name"
              className={errorOf('lastname') ? 'is-invalid' : ''}
            />
          </div>
          {errorOf('lastname') && <span className="login-invalid-feedback">{errorOf('lastname')}</span>}
        </div>

        <div className="login-form-group">
          <label htmlFor="email">Correo electrónico</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-envelope"></i>
            <input
              id="email" type="email" name="email" value={form.email}
              onChange={onChange} required autoComplete="email"
              className={errorOf('email') ? 'is-invalid' : ''}
            />
          </div>
          {errorOf('email') && <span className="login-invalid-feedback">{errorOf('email')}</span>}
        </div>

        <div className="login-form-group">
          <label htmlFor="phone_number">Teléfono</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-phone"></i>
            <input
              id="phone_number" type="tel" name="phone_number"
              value={form.phone_number} onChange={onChange}
              required maxLength={10} placeholder="10 dígitos"
              className={errorOf('phone_number') ? 'is-invalid' : ''}
            />
          </div>
          {errorOf('phone_number') && <span className="login-invalid-feedback">{errorOf('phone_number')}</span>}
        </div>

        <div className="login-form-group">
          <label htmlFor="dateBirth">Fecha de nacimiento</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-calendar"></i>
            <input
              id="dateBirth" type="date" name="dateBirth"
              value={form.dateBirth} onChange={onChange} required
              className={errorOf('dateBirth') ? 'is-invalid' : ''}
            />
          </div>
          {errorOf('dateBirth') && <span className="login-invalid-feedback">{errorOf('dateBirth')}</span>}
        </div>

        <div className="login-form-group">
          <label htmlFor="document_type">Tipo de documento</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-id-card"></i>
            <select
              id="document_type" name="document_type"
              value={form.document_type} onChange={onChange}
              style={{
                width: '100%', padding: '12px 14px 12px 40px',
                border: '1.5px solid var(--plum-200)', borderRadius: 10,
                fontSize: 14, fontFamily: "'DM Sans',sans-serif",
                color: 'var(--text-primary)', background: 'var(--surface)',
                outline: 'none', appearance: 'none',
              }}
            >
              <option value="">Selecciona un documento...</option>
              {DOCUMENT_TYPES.map((d) => (
                <option key={d.value} value={d.value}>{d.label}</option>
              ))}
            </select>
          </div>
          {errorOf('document_type') && <span className="login-invalid-feedback">{errorOf('document_type')}</span>}
        </div>

        <div className="login-form-group">
          <label htmlFor="document">Documento de verificación</label>
          <div
            onClick={() => fileInputRef.current?.click()}
            style={{
              border: '1.5px dashed var(--plum-300)', borderRadius: 10,
              padding: 20, textAlign: 'center',
              background: 'var(--plum-100)', cursor: 'pointer',
            }}
          >
            <i
              className="fa-solid fa-cloud-arrow-up"
              style={{ fontSize: 24, color: 'var(--plum-500)', marginBottom: 8, display: 'block' }}
            ></i>
            <div style={{ fontSize: 13, color: 'var(--text-secondary)' }}>
              Sube tu documento aquí
            </div>
            <div style={{ fontSize: 11, color: 'var(--plum-500)', marginTop: 4 }}>
              JPG, PNG o PDF · Máx. 5MB
            </div>
            {document && (
              <div style={{ fontSize: 12, color: 'var(--plum-700)', marginTop: 8, fontWeight: 600 }}>
                {document.name}
              </div>
            )}
          </div>
          <input
            ref={fileInputRef}
            id="document" type="file" name="document"
            accept=".jpg,.jpeg,.png,.pdf"
            style={{ display: 'none' }}
            onChange={onFileChange}
          />
          {errorOf('document') && <span className="login-invalid-feedback">{errorOf('document')}</span>}
        </div>

        <div className="login-form-group">
          <label htmlFor="password">Contraseña</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-lock"></i>
            <input
              id="password" type="password" name="password"
              value={form.password} onChange={onChange}
              required autoComplete="new-password"
              className={errorOf('password') ? 'is-invalid' : ''}
            />
          </div>
          {errorOf('password') && <span className="login-invalid-feedback">{errorOf('password')}</span>}
        </div>

        <div className="login-form-group">
          <label htmlFor="password-confirm">Confirmar contraseña</label>
          <div className="login-input-wrap">
            <i className="fa-solid fa-lock"></i>
            <input
              id="password-confirm" type="password" name="password_confirmation"
              value={form.password_confirmation} onChange={onChange}
              required autoComplete="new-password"
              className={errorOf('password_confirmation') ? 'is-invalid' : ''}
            />
          </div>
          {errorOf('password_confirmation') && (
            <span className="login-invalid-feedback">{errorOf('password_confirmation')}</span>
          )}
        </div>

        <button type="submit" className="btn-login" disabled={loading}>
          {loading
            ? <><i className="fa-solid fa-spinner fa-spin"></i> Registrando...</>
            : <><i className="fa-solid fa-user-plus"></i> Registrarse</>}
        </button>
      </form>
    </AuthLayout>
  )
}
