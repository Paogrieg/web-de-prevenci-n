import { createContext, useContext, useState, useEffect } from 'react'
import { authApi } from '../services/endpoints.js'

const AuthContext = createContext(null)

export function AuthProvider({ children }) {
  const [user, setUser]       = useState(null)
  const [loading, setLoading] = useState(true)

  useEffect(() => {
    const token = localStorage.getItem('auth_token')
    if (!token) { setLoading(false); return }
    authApi.me()
      .then((data) => setUser(data.user || data))
      .catch(() => localStorage.removeItem('auth_token'))
      .finally(() => setLoading(false))
  }, [])

  const login = async (credentials) => {
    const data = await authApi.login(credentials)
    if (data.token) localStorage.setItem('auth_token', data.token)
    setUser(data.user)
    return data
  }

  const logout = async () => {
    try { await authApi.logout() } catch (e) { /* noop */ }
    localStorage.removeItem('auth_token')
    setUser(null)
  }

  return (
    <AuthContext.Provider value={{ user, loading, login, logout }}>
      {children}
    </AuthContext.Provider>
  )
}

export const useAuth = () => useContext(AuthContext)
