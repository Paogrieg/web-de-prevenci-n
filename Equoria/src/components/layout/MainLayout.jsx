import { Outlet } from 'react-router-dom'
import Sidebar from './Sidebar.jsx'
import Topbar from './Topbar.jsx'

export default function MainLayout() {
  return (
    <div className="app-shell" style={{ display: 'flex', minHeight: '100vh' }}>
      <Sidebar />
      <div className="main" style={{ flex: 1, display: 'flex', flexDirection: 'column' }}>
        <Topbar />
        <main className="content">
          <Outlet />
        </main>
      </div>
    </div>
  )
}
