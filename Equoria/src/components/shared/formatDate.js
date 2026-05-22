import { format, parseISO } from 'date-fns'
import { es } from 'date-fns/locale'

export function formatDate(value, pattern = 'dd MMM yyyy') {
  if (!value) return ''
  try {
    const date = typeof value === 'string' ? parseISO(value) : value
    return format(date, pattern, { locale: es })
  } catch {
    return value
  }
}

export function formatMoney(value) {
  const num = Number(value) || 0
  return num.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
}
