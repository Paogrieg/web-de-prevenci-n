import { useState } from 'react'
import { useAuth } from '../context/AuthContext.jsx'
import api from '../services/api.js'
import toast from 'react-hot-toast'
import PageHeader from '../components/shared/PageHeader.jsx'
import Toggle from '../components/ui/Toggle.jsx'

export default function Settings() {
  const { user } = useAuth()
  const [profile, setProfile] = useState({
    name:     user?.name     || 'Administrador',
    lastname: user?.lastname || 'Fuentes',
    email:    user?.email    || 'admin@ejemplo.org.mx',
    phone:    user?.phone_number || '614-000-0000',
    password: '',
  })

  const onChange = (e) => setProfile({ ...profile, [e.target.name]: e.target.value })

  const handleSave = async () => {
    try {
      const payload = { ...profile }
      if (!payload.password) delete payload.password
      await api.put('/profile', payload)
      toast.success('Perfil actualizado')
    } catch (e) {
      toast.error(e.response?.data?.message || 'Error al guardar')
    }
  }

  return (
    <>
      <PageHeader
        icon="fa-solid fa-gear"
        title="Configuración"
        subtitle="Ajustes del sistema y preferencias de la plataforma"
      />

      <div className="profile-hero" style={{ marginBottom: 24 }}>
        <div className="profile-avatar-lg">
          {(profile.name[0] || '').toUpperCase()}{(profile.lastname[0] || '').toUpperCase()}
        </div>
        <div className="profile-info">
          <h3>{profile.name} {profile.lastname}</h3>
          <p>{profile.email} · Chihuahua, México</p>
          <div className="profile-badge">
            <i className="fa-solid fa-star"></i> Administrador del sistema
          </div>
        </div>
        <button
          className="btn-outline"
          style={{ marginLeft: 'auto', color: 'white', borderColor: 'rgba(255,255,255,0.3)' }}
        >
          <i className="fa-solid fa-pen"></i> Editar perfil
        </button>
      </div>

      <div className="two-col" style={{ alignItems: 'start' }}>
        {/* Datos del perfil */}
        <div className="card">
          <div className="card-header">
            <div><div className="card-title">Datos del Perfil</div></div>
            <button className="card-action" onClick={handleSave}>Guardar</button>
          </div>
          <div className="form-grid">
            <div className="form-group">
              <label className="form-label">Nombre</label>
              <input className="form-input" type="text" name="name" value={profile.name} onChange={onChange} />
            </div>
            <div className="form-group">
              <label className="form-label">Apellido</label>
              <input className="form-input" type="text" name="lastname" value={profile.lastname} onChange={onChange} />
            </div>
            <div className="form-group">
              <label className="form-label">Email</label>
              <input className="form-input" type="email" name="email" value={profile.email} onChange={onChange} />
            </div>
            <div className="form-group">
              <label className="form-label">Teléfono</label>
              <input className="form-input" type="tel" name="phone" value={profile.phone} onChange={onChange} />
            </div>
            <div className="form-group full">
              <label className="form-label">Cambiar contraseña</label>
              <input className="form-input" type="password" name="password" value={profile.password} onChange={onChange} placeholder="Nueva contraseña" />
            </div>
          </div>
        </div>

        {/* Preferencias del sistema */}
        <div className="card">
          <div className="card-header">
            <div><div className="card-title">Preferencias del Sistema</div></div>
          </div>

          <div className="config-section">
            <div className="config-section-title">Notificaciones</div>

            <div className="config-row">
              <div>
                <div className="config-label">Nuevas denuncias</div>
                <div className="config-desc">Recibir alerta cuando llegue una denuncia nueva</div>
              </div>
              <Toggle defaultOn={true} />
            </div>

            <div className="config-row">
              <div>
                <div className="config-label">Testimonios pendientes</div>
                <div className="config-desc">Notificar al llegar un testimonio para moderar</div>
              </div>
              <Toggle defaultOn={true} />
            </div>

            <div className="config-row">
              <div>
                <div className="config-label">Pagos y transacciones</div>
                <div className="config-desc">Alertas de movimientos financieros</div>
              </div>
              <Toggle defaultOn={false} />
            </div>
          </div>

          <div className="config-section">
            <div className="config-section-title">Privacidad</div>

            <div className="config-row">
              <div>
                <div className="config-label">Modo anónimo por defecto</div>
                <div className="config-desc">Proteger identidad de usuarias en reportes</div>
              </div>
              <Toggle defaultOn={true} />
            </div>

            <div className="config-row">
              <div>
                <div className="config-label">Autenticación de dos factores</div>
                <div className="config-desc">Mayor seguridad en inicio de sesión</div>
              </div>
              <Toggle defaultOn={true} />
            </div>

            <div className="config-row">
              <div>
                <div className="config-label">Registros de acceso</div>
                <div className="config-desc">Guardar historial de sesiones del sistema</div>
              </div>
              <Toggle defaultOn={false} />
            </div>
          </div>
        </div>
      </div>
    </>
  )
}
