import { useState } from 'react'
import { testimonialsApi } from '../services/endpoints.js'
import useResource from '../hooks/useResource.js'
import PageHeader from '../components/shared/PageHeader.jsx'
import StatCard from '../components/ui/StatCard.jsx'
import Badge from '../components/ui/Badge.jsx'
import Modal, { ModalFooter } from '../components/ui/Modal.jsx'
import FormInput from '../components/ui/FormInput.jsx'
import FormSelect from '../components/ui/FormSelect.jsx'
import FormTextarea from '../components/ui/FormTextarea.jsx'
import DataTable from '../components/shared/DataTable.jsx'
import DeleteButton, { EditButton } from '../components/shared/DeleteButton.jsx'
import { formatDate } from '../components/shared/formatDate.js'

const ANON_OPTIONS = [
  { value: '1', label: 'Sí, anónimo' },
  { value: '0', label: 'No, público' },
]

const EMPTY = { content: '', anonymous: '1', complaint_id: '' }

export default function Testimonials() {
  const { items: testimonials, create, update, remove } = useResource(testimonialsApi, 'testimonio')
  const [modalCreate, setModalCreate] = useState(false)
  const [editing, setEditing] = useState(null)
  const [form, setForm] = useState(EMPTY)

  const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value })

  const openEdit = (t) => {
    setEditing(t)
    setForm({ content: t.content, anonymous: String(t.anonymous), complaint_id: t.complaint_id || '' })
  }

  const handleCreate = async (e) => {
    e.preventDefault()
    const ok = await create({ ...form, anonymous: Number(form.anonymous) })
    if (ok) { setModalCreate(false); setForm(EMPTY) }
  }

  const handleUpdate = async (e) => {
    e.preventDefault()
    const ok = await update(editing.id, { ...form, anonymous: Number(form.anonymous) })
    if (ok) { setEditing(null); setForm(EMPTY) }
  }

  const anonCount = testimonials.filter((t) => t.anonymous).length

  return (
    <>
      <PageHeader
        icon="fa-solid fa-comment"
        title="Testimonios"
        subtitle="Relatos y experiencias compartidas por las usuarias"
        action={
          <button className="btn-primary" onClick={() => { setForm(EMPTY); setModalCreate(true) }}>
            ＋ Nuevo testimonio
          </button>
        }
      />

      <div className="stats-grid">
        <StatCard icon="fa-solid fa-book-open"   iconVariant="v" value={testimonials.length} label="Total testimonios" />
        <StatCard icon="fa-solid fa-user-secret" iconVariant="r" value={anonCount}           label="Anónimos" />
      </div>

      <div className="card">
        <div className="card-header">
          <div><div className="card-title">Todos los Testimonios</div></div>
        </div>

        <DataTable
          columns={['Contenido', 'Usuaria', 'Anónimo', 'Fecha', 'Acciones']}
          data={testimonials}
          emptyMessage="No hay testimonios registrados"
          renderRow={(t) => (
            <tr key={t.id}>
              <td style={{ maxWidth: 300, fontSize: 13 }}>
                {t.content?.length > 100 ? `${t.content.slice(0, 100)}...` : t.content}
              </td>
              <td>
                {t.anonymous
                  ? <span style={{ color: 'var(--text-secondary)' }}>Anónima</span>
                  : (t.user?.name || 'Desconocida')}
              </td>
              <td>
                {t.anonymous
                  ? <Badge status="anonimo" />
                  : <Badge status="publico" />}
              </td>
              <td>{formatDate(t.created_at)}</td>
              <td>
                <div style={{ display: 'flex', gap: 6 }}>
                  <EditButton onClick={() => openEdit(t)} />
                  <DeleteButton onDelete={() => remove(t.id, '¿Eliminar este testimonio?')} />
                </div>
              </td>
            </tr>
          )}
        />
      </div>

      {/* Modal CREAR */}
      <Modal open={modalCreate} onClose={() => setModalCreate(false)} title="Nuevo Testimonio">
        <form onSubmit={handleCreate}>
          <FormTextarea label="Contenido" name="content" value={form.content} onChange={onChange} required rows={5} />
          <FormSelect label="¿Es anónimo?" icon="fa-solid fa-user-secret" name="anonymous" value={form.anonymous} onChange={onChange} required options={ANON_OPTIONS} />
          <FormInput label="ID de denuncia relacionada" icon="fa-solid fa-link" type="number" name="complaint_id" value={form.complaint_id} onChange={onChange} required placeholder="ID de la denuncia" />
          <ModalFooter onCancel={() => setModalCreate(false)} />
        </form>
      </Modal>

      {/* Modal EDITAR */}
      <Modal open={!!editing} onClose={() => setEditing(null)} title="Editar Testimonio">
        <form onSubmit={handleUpdate}>
          <FormTextarea label="Contenido" name="content" value={form.content} onChange={onChange} required rows={5} />
          <FormSelect label="¿Es anónimo?" icon="fa-solid fa-user-secret" name="anonymous" value={form.anonymous} onChange={onChange} required options={ANON_OPTIONS} />
          <ModalFooter onCancel={() => setEditing(null)} submitLabel="Actualizar" />
        </form>
      </Modal>
    </>
  )
}
