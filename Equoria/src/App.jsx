import { Routes, Route, Navigate } from 'react-router-dom'
import MainLayout from './components/layout/MainLayout.jsx'
import ProtectedRoute from './components/shared/ProtectedRoute.jsx'
import AdminRoute from './components/layout/AdminRoute.jsx' 

// Auth y Públicas
import Landing        from './views/Landing.jsx'
import Login          from './views/Login.jsx'
import Register       from './views/Register.jsx'
import Verify         from './views/Verify.jsx'
import ForgotPassword from './views/ForgotPassword.jsx'

// App - General (Usuarias)
import Feed           from './views/Feed.jsx' 
import UserProfile    from './views/UserProfile.jsx' 

// App - Administración
import Dashboard      from './views/Dashboard.jsx'
import Users          from './views/Users.jsx'
import Complaints     from './views/Complaints.jsx'
import Testimonials   from './views/Testimonials.jsx'
import News           from './views/News.jsx'
import Laws           from './views/Laws.jsx'
import Emergency      from './views/Emergency.jsx'
import Verifications  from './views/Verifications.jsx'
import Payments       from './views/Payments.jsx'
import Settings       from './views/Settings.jsx'

export default function App() {
  return (
    <Routes>
      {/* 1. RUTAS PÚBLICAS */}
      <Route path="/"                element={<Landing />} />
      <Route path="/login"           element={<Login />} />
      <Route path="/register"        element={<Register />} />
      <Route path="/verify-email"    element={<Verify />} />
      <Route path="/forgot-password" element={<ForgotPassword />} />

      {/* 2. RUTAS PRIVADAS - GENERAL (Cualquier usuario autenticado) */}
      <Route 
        path="/feed" 
        element={
          <ProtectedRoute>
            <Feed />
          </ProtectedRoute>
        } 
      />
      <Route 
        path="/profile" 
        element={
          <ProtectedRoute>
            <UserProfile />
          </ProtectedRoute>
        } 
      />

      {/* 3. RUTAS PRIVADAS - ADMINISTRADORAS */}
      <Route
        element={
          <ProtectedRoute>
            <AdminRoute>
              <MainLayout />
            </AdminRoute>
          </ProtectedRoute>
        }
      >
        <Route path="/dashboard"       element={<Dashboard />} />
        <Route path="/users"           element={<Users />} />
        <Route path="/denuncias"       element={<Complaints />} />
        <Route path="/testimonios"     element={<Testimonials />} />
        <Route path="/noticias"        element={<News />} />
        <Route path="/leyes"           element={<Laws />} />
        <Route path="/emergencia"      element={<Emergency />} />
        <Route path="/verificaciones"  element={<Verifications />} />
        <Route path="/pagos"           element={<Payments />} />
        <Route path="/configuracion"   element={<Settings />} />
      </Route>
      
      <Route path="*" element={<Navigate to="/" replace />} />
    </Routes>
  )
}