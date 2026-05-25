import { Link } from 'react-router-dom'
import AuthLayout from '../components/layout/AuthLayout.jsx'

export default function Verify() {
  return (
    <AuthLayout
      title="Revisa tu correo"
      footer={<Link to="/login">Ir al inicio de sesión</Link>}
    >
      <p style={{ fontSize: 14, color: 'var(--text-secondary)', textAlign: 'center', marginBottom: 24 }}>
        Te enviamos un correo de bienvenida al registrarte. Si no lo ves, revisa tu carpeta de spam.
      </p>

      <p style={{ fontSize: 13, color: 'var(--text-secondary)', textAlign: 'center' }}>
        Una vez que un administrador verifique tu cuenta, podrás acceder a la plataforma.
      </p>
    </AuthLayout>
  )
}
