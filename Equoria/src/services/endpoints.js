import api from './api.js'

// CRUD genérico reutilizable
const crud = (resource) => ({
  list:   (params)      => api.get(`/${resource}`, { params }).then(r => r.data),
  get:    (id)          => api.get(`/${resource}/${id}`).then(r => r.data),
  create: (data)        => api.post(`/${resource}`, data).then(r => r.data),
  update: (id, data)    => api.put(`/${resource}/${id}`, data).then(r => r.data),
  remove: (id)          => api.delete(`/${resource}/${id}`).then(r => r.data),
})

export const usersApi         = { ...crud('users'),
  verify: (id) => api.patch(`/users/${id}/verify`).then(r => r.data),
}
export const complaintsApi    = crud('complaint')
export const testimonialsApi  = crud('testimonials')
export const newsApi          = crud('new')
export const lawsApi          = crud('laws')
export const emergencyApi     = crud('emergencia')
export const verificationsApi = crud('verification')
export const paymentsApi      = crud('payment')

export const authApi = {
  login:  (data) => api.post('/login', data).then(r => r.data),
  logout: ()     => api.post('/logout').then(r => r.data),
  me:     ()     => api.get('/me').then(r => r.data),
}
