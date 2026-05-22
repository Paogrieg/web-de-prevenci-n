const VARIANTS = {
  pendiente:  { cls: 'b-pen', text: 'Pendiente' },
  revision:   { cls: 'b-rev', text: 'En Revisión' },
  resuelto:   { cls: 'b-res', text: 'Resuelto' },
  completed:  { cls: 'b-res', text: 'Completado' },
  in_process: { cls: 'b-rev', text: 'En proceso' },
  canceled:   { cls: 'b-pen', text: 'Cancelado' },
  aprobada:   { cls: 'b-apr', text: 'Aprobada' },
  rechazada:  { cls: 'b-rec', text: 'Rechazada' },
  verificada: { cls: 'b-res', text: 'Verificada' },
  publico:    { cls: 'b-res', text: 'Público' },
  anonimo:    { cls: 'b-anon', text: 'Anónimo' },
}

export default function Badge({ status, children, variant }) {
  if (children) {
    return <span className={`badge ${variant || ''}`}>{children}</span>
  }
  const v = VARIANTS[status] || { cls: 'b-pen', text: status }
  return <span className={`badge ${v.cls}`}>{v.text}</span>
}
