import { useState } from 'react'
import { lawsApi } from '../services/endpoints.js'
import useResource from '../hooks/useResource.js'
import PageHeader from '../components/shared/PageHeader.jsx'
import Modal, { ModalFooter } from '../components/ui/Modal.jsx'
import FormInput from '../components/ui/FormInput.jsx'
import FormTextarea from '../components/ui/FormTextarea.jsx'
import DataTable from '../components/shared/DataTable.jsx'
import DeleteButton, { EditButton } from '../components/shared/DeleteButton.jsx'

const EMPTY = { title: '', description: '', state: '', url: '' }

export default function Laws() {
  const { items: laws, create, update, remove } = useResource(lawsApi, 'ley')
  const [modalCreate, setModalCreate] = useState(false)
  const [editing, setEditing] = useState(null)
  const [form, setForm] = useState(EMPTY)

  const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value })

  const openEdit = (l) => {
    setEditing(l)
    setForm({ title: l.title, description: l.description, state: l.state, url: l.url || '' })
  }

  const handleCreate = async (e) => {
    e.preventDefault()
    const ok = await create(form)
    if (ok) { setModalCreate(false); setForm(EMPTY) }
  }

  const handleUpdate = async (e) => {
    e.preventDefault()
    const ok = await update(editing.id, form)
    if (ok) { setEditing(null); setForm(EMPTY) }
  }

  return (
    <>
      <PageHeader
        icon="fa-solid fa-scale-balanced"
        title="Marco Legal"
        subtitle="Leyes y normativas de protección vigentes"
        action={
          <button className="btn-primary" onClick={() => { setForm(EMPTY); setModalCreate(true) }}>
            ＋ Agregar ley
          </button>
        }
      />

      <div className="card">
        <div className="card-header">
          <div>
            <div className="card-title">Leyes Vigentes</div>
            <div className="card-subtitle">Marco legal de protección</div>
          </div>
        </div>

        <DataTable
          columns={['Título', 'Región', 'Descripción', 'Fuente', 'Acciones']}
          data={laws}
          emptyMessage="No hay leyes registradas"
          renderRow={(l) => (
            <tr key={l.id}>
              <td style={{ fontWeight: 500 }}>{l.title}</td>
              <td><span className="ley-region">{l.state}</span></td>
              <td style={{ fontSize: 13, color: 'var(--text-secondary)' }}>
                {l.description?.length > 80 ? `${l.description.slice(0, 80)}...` : l.description}
              </td>
              <td>
                {l.url ? (
                  <a href={l.url} target="_blank" rel="noreferrer" style={{ color: 'var(--plum-500)', fontSize: 12 }}>
                    Ver fuente →
                  </a>
                ) : (
                  <span style={{ fontSize: 12, color: 'var(--text-secondary)' }}>Sin fuente</span>
                )}
              </td>
              <td>
                <div style={{ display: 'flex', gap: 6 }}>
                  <EditButton onClick={() => openEdit(l)} />
                  <DeleteButton onDelete={() => remove(l.id, '¿Eliminar esta ley?')} />
                </div>
              </td>
            </tr>
          )}
        />
      </div>

      {/* Modal CREAR */}
      <Modal open={modalCreate} onClose={() => setModalCreate(false)} title="Agregar Ley">
        <form onSubmit={handleCreate}>
          <FormInput label="Título" icon="fa-solid fa-scale-balanced" name="title" value={form.title} onChange={onChange} required />
          <FormInput label="Región / Estado" icon="fa-solid fa-map-pin" name="state" value={form.state} onChange={onChange} required placeholder="Ej: Federal, Chihuahua" />
          <FormInput label="URL / Fuente (opcional)" icon="fa-solid fa-link" type="url" name="url" value={form.url} onChange={onChange} placeholder="https://..." />
          <FormTextarea label="Descripción" name="description" value={form.description} onChange={onChange} required />
          <ModalFooter onCancel={() => setModalCreate(false)} />
        </form>
      </Modal>

      {/* Modal EDITAR */}
      <Modal open={!!editing} onClose={() => setEditing(null)} title="Editar Ley">
        <form onSubmit={handleUpdate}>
          <FormInput label="Título" icon="fa-solid fa-scale-balanced" name="title" value={form.title} onChange={onChange} required />
          <FormInput label="Región / Estado" icon="fa-solid fa-map-pin" name="state" value={form.state} onChange={onChange} required />
          <FormInput label="URL / Fuente (opcional)" icon="fa-solid fa-link" type="url" name="url" value={form.url} onChange={onChange} placeholder="https://..." />
          <FormTextarea label="Descripción" name="description" value={form.description} onChange={onChange} required />
          <ModalFooter onCancel={() => setEditing(null)} submitLabel="Actualizar" />
        </form>
      </Modal>
    </>
  )
}
