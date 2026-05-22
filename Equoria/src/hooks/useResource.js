import { useState, useEffect, useCallback } from 'react'
import toast from 'react-hot-toast'

/**
 * Hook genérico para listar, crear, actualizar y eliminar recursos.
 * @param {object} api - objeto con list/create/update/remove (de endpoints.js)
 * @param {string} label - nombre del recurso para mensajes (ej: "denuncia")
 */
export default function useResource(api, label = 'registro') {
  const [items, setItems]     = useState([])
  const [loading, setLoading] = useState(true)
  const [error, setError]     = useState(null)

  const fetchAll = useCallback(async () => {
    setLoading(true)
    try {
      const data = await api.list()
      // Soporta { data: [...] } o array directo
      setItems(Array.isArray(data) ? data : data.data || [])
      setError(null)
    } catch (e) {
      setError(e)
      toast.error(`Error al cargar ${label}s`)
    } finally {
      setLoading(false)
    }
  }, [api, label])

  useEffect(() => { fetchAll() }, [fetchAll])

  const create = async (payload) => {
    try {
      await api.create(payload)
      toast.success(`${label} creada correctamente`)
      await fetchAll()
      return true
    } catch (e) {
      toast.error(e.response?.data?.message || `Error al crear ${label}`)
      return false
    }
  }

  const update = async (id, payload) => {
    try {
      await api.update(id, payload)
      toast.success(`${label} actualizada correctamente`)
      await fetchAll()
      return true
    } catch (e) {
      toast.error(e.response?.data?.message || `Error al actualizar ${label}`)
      return false
    }
  }

  const remove = async (id, confirmMsg = '¿Eliminar este registro?') => {
    if (!window.confirm(confirmMsg)) return false
    try {
      await api.remove(id)
      toast.success(`${label} eliminada`)
      await fetchAll()
      return true
    } catch (e) {
      toast.error(`Error al eliminar ${label}`)
      return false
    }
  }

  return { items, loading, error, fetchAll, create, update, remove }
}
