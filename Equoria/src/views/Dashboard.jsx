import { useNavigate } from 'react-router-dom'
import StatCard from '../components/ui/StatCard.jsx'
import Badge from '../components/ui/Badge.jsx'
import UserAvatar from '../components/shared/UserAvatar.jsx'

const RECENT_COMPLAINTS = [
  { id: 1, name: 'María G.',     type: 'Física',      status: 'pendiente', date: 'Hoy, 09:14',  gradient: null },
  { id: 2, name: 'Ana R.',       type: 'Psicológica', status: 'revision',  date: 'Hoy, 08:52',  gradient: 'linear-gradient(135deg,#a855d4,#6b2fa0)' },
  { id: 3, name: 'Laura M.',     type: 'Sexual',      status: 'resuelto',  date: 'Ayer, 21:30', gradient: 'linear-gradient(135deg,#059669,#10b981)' },
  { id: 4, name: 'Sofía L.',     type: 'Económica',   status: 'pendiente', date: 'Ayer, 18:05', gradient: 'linear-gradient(135deg,#f0c060,#e87d1e)' },
  { id: 5, name: 'Valentina H.', type: 'Digital',     status: 'revision',  date: 'Ayer, 14:22', gradient: 'linear-gradient(135deg,#e879a0,#c084e8)' },
]

const VIOLENCE_TYPES = [
  { icon: 'fa-solid fa-hand-fist',            name: 'Física',              cases: 98,  pct: 72,  bg: 'linear-gradient(90deg,#6b2fa0,#a855d4)' },
  { icon: 'fa-solid fa-brain',                name: 'Psicológica',         cases: 134, pct: 100, bg: 'linear-gradient(90deg,#e879a0,#c084e8)' },
  { icon: 'fa-solid fa-triangle-exclamation', name: 'Sexual',              cases: 67,  pct: 50,  bg: 'linear-gradient(90deg,#4a1e87,#8b3fbf)' },
  { icon: 'fa-solid fa-money-bill',           name: 'Económica',           cases: 43,  pct: 32,  bg: 'linear-gradient(90deg,#f0c060,#e8a020)' },
  { icon: 'fa-solid fa-mobile-screen',        name: 'Digital / Ciberacoso',cases: 29,  pct: 22,  bg: 'linear-gradient(90deg,#2d1254,#6b2fa0)' },
]

const ACTIVITY = [
  { color: '#e879a0', text: <>Nueva denuncia por <strong>violencia física</strong></>, time: 'Hace 3 min' },
  { color: '#a855d4', text: <>Testimonio anónimo <strong>aprobado</strong></>,         time: 'Hace 18 min' },
  { color: '#10b981', text: <>Noticia verificada: <strong>Nueva ley Chihuahua</strong></>, time: 'Hace 45 min' },
  { color: '#f0c060', text: <>Contacto de emergencia <strong>registrado</strong></>,   time: 'Hace 1 hora' },
  { color: '#6b2fa0', text: <>Usuaria <strong>verificó</strong> su cuenta</>,          time: 'Hace 2 horas' },
]

const NEWS = [
  { title: 'Chihuahua refuerza protocolo de atención', icon: 'fa-solid fa-newspaper',       bg: '#f3e8ff', meta: 'Verificada · Hace 2h', verified: true },
  { title: 'Nuevos refugios en el norte del país',     icon: 'fa-solid fa-landmark',        bg: '#fce4ef', meta: 'En revisión · Hace 5h', verified: false },
  { title: 'Campaña #NoEstásSola alcanza 2M',          icon: 'fa-solid fa-bullhorn',        bg: '#fff8e6', meta: 'Verificada · Hace 8h', verified: true },
  { title: 'Reforma al Art. 325 del Código Penal',     icon: 'fa-solid fa-scale-balanced',  bg: '#e8f9f5', meta: 'Verificada · Hace 1d', verified: true },
]

const LAWS = [
  { title: 'Ley General de Acceso a una Vida Libre de Violencia', region: '🇲🇽 Federal' },
  { title: 'Ley de Acceso de las Mujeres — Chihuahua',            region: 'Chihuahua' },
  { title: 'NOM-046 Violencia Familiar, Sexual y Género',         region: '🇲🇽 Federal' },
  { title: 'Protocolo de Actuación para Feminicidio',             region: '🇲🇽 Federal' },
]

export default function Dashboard() {
  const navigate = useNavigate()

  return (
    <>
      <div className="stats-grid">
        <StatCard icon="fa-solid fa-users"                iconVariant="v" value="1,284" label="Usuarias registradas" sub="+47 este mes"     trend={{ type: 'up', label: '↑ 12%' }} />
        <StatCard icon="fa-solid fa-file-lines"           iconVariant="r" value="342"   label="Denuncias activas"    sub="12 sin revisar"   trend={{ type: 'dn', label: '↑ 8%' }} />
        <StatCard icon="fa-solid fa-newspaper"            iconVariant="g" value="89"    label="Noticias publicadas"  sub="5 en revisión"    trend={{ type: 'nu', label: '= Estable' }} />
        <StatCard icon="fa-solid fa-circle-check"         iconVariant="t" value="218"   label="Casos resueltos"      sub="Este mes: 38"     trend={{ type: 'up', label: '↑ 23%' }} />
      </div>

      <div className="two-col">
        <div className="card">
          <div className="card-header">
            <div>
              <div className="card-title">Denuncias Recientes</div>
              <div className="card-subtitle">Últimas 24 horas</div>
            </div>
            <button className="card-action" onClick={() => navigate('/denuncias')}>Ver todas →</button>
          </div>
          <table>
            <thead>
              <tr><th>Usuaria</th><th>Tipo</th><th>Estado</th><th>Fecha</th></tr>
            </thead>
            <tbody>
              {RECENT_COMPLAINTS.map((c) => (
                <tr key={c.id}>
                  <td>
                    <div className="user-row">
                      <UserAvatar name={c.name} gradient={c.gradient} />
                      {c.name}
                    </div>
                  </td>
                  <td>{c.type}</td>
                  <td><Badge status={c.status} /></td>
                  <td>{c.date}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>

        <div className="card">
          <div className="card-header">
            <div>
              <div className="card-title">Tipos de Violencia</div>
              <div className="card-subtitle">Distribución este mes</div>
            </div>
          </div>
          <div className="vtype-list">
            {VIOLENCE_TYPES.map((v) => (
              <div key={v.name}>
                <div className="vt-hdr">
                  <span className="vt-name"><i className={v.icon}></i> {v.name}</span>
                  <span className="vt-count">{v.cases} casos</span>
                </div>
                <div className="vt-bg">
                  <div className="vt-bar" style={{ width: `${v.pct}%`, background: v.bg }}></div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>

      <div className="three-col">
        <div className="card">
          <div className="card-header">
            <div>
              <div className="card-title">Actividad Reciente</div>
              <div className="card-subtitle">Últimas acciones</div>
            </div>
          </div>
          <div className="act-list">
            {ACTIVITY.map((a, i) => (
              <div className="act-item" key={i}>
                <div className="act-dc">
                  <div className="act-dot" style={{ background: a.color }}></div>
                  <div className="act-line"></div>
                </div>
                <div>
                  <div className="act-text">{a.text}</div>
                  <div className="act-time">{a.time}</div>
                </div>
              </div>
            ))}
          </div>
        </div>

        <div className="card">
          <div className="card-header">
            <div><div className="card-title">Últimas Noticias</div></div>
            <button className="card-action" onClick={() => navigate('/noticias')}>Ver más</button>
          </div>
          <div>
            {NEWS.map((n, i) => (
              <div className="noticia-item" key={i}>
                <div className="n-img" style={{ background: n.bg }}><i className={n.icon}></i></div>
                <div>
                  <div className="n-title">{n.title}</div>
                  <div className="n-meta">
                    <i className={n.verified ? 'fa-solid fa-circle-check' : 'fa-solid fa-hourglass-half'}></i> {n.meta}
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>

        <div className="card">
          <div className="card-header">
            <div>
              <div className="card-title">Marco Legal</div>
              <div className="card-subtitle">Leyes vigentes</div>
            </div>
            <button className="card-action" onClick={() => navigate('/leyes')}>Ver más</button>
          </div>
          <div>
            {LAWS.map((l, i) => (
              <div className="ley-item" key={i}>
                <div className="ley-title">{l.title}</div>
                <span className="ley-region">{l.region}</span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </>
  )
}
