import { NavLink } from 'react-router-dom'
import { useAuth } from '../../context/AuthContext.jsx'



const NAV_MAIN = [
  { to: '/',          icon: 'fa-solid fa-house',      label: 'Inicio' },
  { to: '/users',     icon: 'fa-solid fa-user',       label: 'Usuarias' },
  { to: '/denuncias', icon: 'fa-solid fa-file-lines', label: 'Denuncias', badge: 12 },
  { to: '/testimonios', icon: 'fa-solid fa-comment',  label: 'Testimonios' },
  { to: '/noticias',  icon: 'fa-solid fa-newspaper',  label: 'Noticias' },
]

const NAV_RESOURCES = [
  { to: '/leyes',          icon: 'fa-solid fa-book',         label: 'Leyes' },
  { to: '/emergencia',     icon: 'fa-solid fa-phone',        label: 'Contactos Emergencia' },
  { to: '/verificaciones', icon: 'fa-solid fa-circle-check', label: 'Verificaciones', badge: 5 },
  { to: '/pagos',          icon: 'fa-solid fa-credit-card',  label: 'Pagos' },
]

const NAV_SYSTEM = [
  { to: '/configuracion', icon: 'fa-solid fa-gear', label: 'Configuración' },
]

function NavItem({ to, icon, label, badge }) {
  return (
    <NavLink
      to={to}
      end={to === '/'}
      className={({ isActive }) => `nav-item ${isActive ? 'active' : ''}`}
    >
      <span className="nav-icon"><i className={icon}></i></span> {label}
      {badge && <span className="nav-badge">{badge}</span>}
    </NavLink>
  )
}

export default function Sidebar() {
  const { logout } = useAuth()

  return (
    <aside className="sidebar">
      <div className="sidebar-logo">
        <div className="logo-icon">
        </div>
        <h1>Equoria</h1>
      </div>

      <nav className="sidebar-nav">
        <span className="nav-section-label">Principal</span>
        {NAV_MAIN.map((item) => <NavItem key={item.to} {...item} />)}

        <span className="nav-section-label" style={{ marginTop: 8 }}>Recursos</span>
        {NAV_RESOURCES.map((item) => <NavItem key={item.to} {...item} />)}

        <span className="nav-section-label" style={{ marginTop: 8 }}>Sistema</span>
        {NAV_SYSTEM.map((item) => <NavItem key={item.to} {...item} />)}
      </nav>

      <div className="sidebar-emergency">
        <p><i className="fa-solid fa-circle-info"></i> Línea de Crisis</p>
        <button className="emergency-btn">
          <i className="fa-solid fa-phone-volume"></i> 800-900-1000
        </button>
      </div>

      <div style={{ margin: 16 }}>
        <button
          onClick={logout}
          style={{
            width: '100%', padding: 12,
            background: 'rgba(232,121,160,0.15)', color: 'var(--rose-accent)',
            border: '1px solid rgba(232,121,160,0.3)', borderRadius: 10,
            cursor: 'pointer', fontFamily: "'DM Sans',sans-serif",
            fontSize: 14, fontWeight: 600, display: 'flex',
            alignItems: 'center', justifyContent: 'center', gap: 8,
          }}
        >
          <i className="fa-solid fa-right-from-bracket"></i> Cerrar sesión
        </button>
      </div>
    </aside>
  )
}
