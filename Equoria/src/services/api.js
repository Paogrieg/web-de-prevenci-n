import axios from 'axios'

// Lee el meta name="csrf-token" del index.html (equivalente al <meta name="csrf-token"> del layouts/app)
function getCsrfMeta() {
  if (typeof document === 'undefined') return null
  return document.querySelector('meta[name="csrf-token"]')?.content || null
}

const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL || 'http://localhost:8000/api',
  withCredentials: true, // necesario para Sanctum cookies (SPA stateful)
  // Axios lee automáticamente XSRF-TOKEN cookie y envía X-XSRF-TOKEN header
  xsrfCookieName: 'XSRF-TOKEN',
  xsrfHeaderName: 'X-XSRF-TOKEN',
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
    'X-Requested-With': 'XMLHttpRequest',
  },
})

// Inyectar token JWT/Sanctum desde localStorage + CSRF token si está disponible
api.interceptors.request.use((config) => {
  const token = localStorage.getItem('auth_token')
  if (token) config.headers.Authorization = `Bearer ${token}`

  const csrf = getCsrfMeta()
  if (csrf) config.headers['X-CSRF-TOKEN'] = csrf

  return config
})

/**
 * Llama esto ANTES del login si usas Sanctum SPA con cookies (stateful).
 * Equivale a hacer GET /sanctum/csrf-cookie en Laravel.
 *   import { initSanctum } from '@/services/api'
 *   await initSanctum()
 *   await login({ email, password })
 */
export async function initSanctum() {
  const baseUrl = (import.meta.env.VITE_API_URL || 'http://localhost:8000/api').replace(/\/api\/?$/, '')
  await axios.get(`${baseUrl}/sanctum/csrf-cookie`, { withCredentials: true })
}

// Manejo global de 401
api.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response?.status === 401) {
      localStorage.removeItem('auth_token')
      if (window.location.pathname !== '/login') {
        window.location.href = '/login'
      }
    }
    return Promise.reject(error)
  }
)

export default api
