import { useState } from 'react'
import { useAuth } from '../../context/AuthContext.jsx'

export default function Topbar() {
  const { user } = useAuth()
  const [search, setSearch] = useState('')

  const initials = user
    ? `${(user.name?.[0] || '').toUpperCase()}${(user.lastname?.[0] || '').toUpperCase()}` || 'AD'
    : 'AD'

  return (
    <header className="topbar">
      <div className="topbar-title"></div>
      <div className="topbar-search">
        <span style={{ color: 'var(--text-secondary)' }}>
          <i className="fa-solid fa-magnifying-glass"></i>
        </span>
        <input
          type="text"
          placeholder="Buscar…"
          value={search}
          onChange={(e) => setSearch(e.target.value)}
        />
      </div>
      <div className="topbar-actions">
        <div className="topbar-icon-btn">
          <i className="fa-solid fa-bell"></i>
          <div className="notif-dot"></div>
        </div>
        <div className="topbar-icon-btn">
          <i className="fa-regular fa-clipboard"></i>
        </div>
        <div className="avatar-btn">{initials}</div>
      </div>
    </header>
  )
}
