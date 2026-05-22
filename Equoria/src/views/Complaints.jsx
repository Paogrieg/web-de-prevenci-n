import { useState } from 'react'
import { complaintsApi } from '../services/endpoints.js'
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
import UserAvatar from '../components/shared/UserAvatar.jsx'
import { formatDate } from '../components/shared/formatDate.js'

const TYPE_OPTIONS = [
  { value: 'Física', label: 'Física' },
  { value: 'Psicológica', label: 'Psicológica' },
  { value: 'Sexual', label: 'Sexual' },
  { value: 'Económica', label: 'Económica' },
  { value: 'Digital', label: 'Digital' },
]

const STATUS_OPTIONS = [
  { value: 'pendiente', label: 'Pendiente' },
  { value: 'revision',  label: 'En revisión' },
  { value: 'resuelto',  label: 'Resuelto' },
]

const EMPTY = { title: '', description: '', type: '', status: 'pendiente', date: '', lat: '', lng: '' }

export default function Complaints() {
  const { items: complaints, create, update, remove } = useResource(complaintsApi, 'denuncia')
  const [modalCreate, setModalCreate] = useState(false)
  const [editing, setEditing]         = useState(null)
  const [form, setForm]               = useState(EMPTY)

  const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value })

  const openEdit = (c) => {
    setEditing(c)
    setForm({
      title: c.title, description: c.description, type: c.type,
      status: c.status, date: c.date, lat: c.lat || '', lng: c.lng || '',
    })
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

  const counts = {
    pendiente: complaints.filter((c) => c.status === 'pendiente').length,
    revision:  complaints.filter((c) => c.status === 'revision').length,
    resuelto:  complaints.filter((c) => c.status === 'resuelto').length,
  }

  return (
    <>
      <PageHeader
        icon="fa-solid fa-triangle-exclamation"
        title="Denuncias"
        subtitle="Gestión y seguimiento de reportes de violencia"
        action={
          <button className="btn-primary" onClick={() => { setForm(EMPTY); setModalCreate(true) }}>
            ＋ Nueva denuncia
          </button>
        }
      />

      <div className="stats-grid">
        <StatCard icon="fa-solid fa-triangle-exclamation" iconVariant="r" value={complaints.length} label="Total denuncias" />
        <StatCard icon="fa-solid fa-hourglass-half"       iconVariant="g" value={counts.pendiente}  label="Sin revisar" />
        <StatCard icon="fa-solid fa-magnifying-glass"     iconVariant="v" value={counts.revision}   label="En revisión" />
        <StatCard icon="fa-solid fa-circle-check"         iconVariant="t" value={counts.resuelto}   label="Resueltas" />
      </div>

      <div className="card">
        <div className="card-header">
          <div>
            <div className="card-title">Todas las Denuncias</div>
            <div className="card-subtitle">{complaints.length} denuncias en total</div>
          </div>
        </div>

        <DataTable
          columns={['#', 'Usuaria', 'Tipo', 'Estado', 'Fecha', 'Acciones']}
          data={complaints}
          emptyMessage="No hay denuncias registradas"
          renderRow={(c) => (
            <tr key={c.id}>
              <td style={{ color: 'var(--text-secondary)' }}>
                #DEN-{String(c.id).padStart(3, '0')}
              </td>
              <td>
                <div className="user-row">
                  <UserAvatar name={c.user?.name || 'U'} />
                  {c.user?.name || 'Desconocida'}
                </div>
              </td>
              <td>{c.type}</td>
              <td><Badge status={c.status} /></td>
              <td>{formatDate(c.date)}</td>
              <td>
                <div style={{ display: 'flex', gap: 6 }}>
                  <EditButton onClick={() => openEdit(c)} />
                  <DeleteButton onDelete={() => remove(c.id, '¿Eliminar esta denuncia?')} />
                </div>
              </td>
            </tr>
          )}
        />
      </div>

      {/* Modal CREAR */}
      <Modal open={modalCreate} onClose={() => setModalCreate(false)} title="Nueva Denuncia">
        <form onSubmit={handleCreate}>
          <FormInput    label="Título" icon="fa-solid fa-file-lines" name="title" value={form.title} onChange={onChange} required />
          <FormSelect   label="Tipo de violencia" icon="fa-solid fa-tag" name="type" value={form.type} onChange={onChange} required placeholder="Selecciona..." options={TYPE_OPTIONS} />
          <FormSelect   label="Estado" icon="fa-solid fa-circle-half-stroke" name="status" value={form.status} onChange={onChange} required options={STATUS_OPTIONS} />
          <FormInput    label="Fecha" icon="fa-solid fa-calendar" type="date" name="date" value={form.date} onChange={onChange} required />
          <FormInput    label="Latitud" icon="fa-solid fa-map-pin" type="number" step="any" name="lat" value={form.lat} onChange={onChange} required placeholder="Ej: 28.6353" />
          <FormInput    label="Longitud" icon="fa-solid fa-map-pin" type="number" step="any" name="lng" value={form.lng} onChange={onChange} required placeholder="Ej: -106.0889" />
          <FormTextarea label="Descripción" name="description" value={form.description} onChange={onChange} required />
          <ModalFooter onCancel={() => setModalCreate(false)} />
        </form>
      </Modal>

      {/* Modal EDITAR */}
      <Modal open={!!editing} onClose={() => setEditing(null)} title="Editar Denuncia">
        <form onSubmit={handleUpdate}>
          <FormInput    label="Título" icon="fa-solid fa-file-lines" name="title" value={form.title} onChange={onChange} required />
          <FormSelect   label="Tipo de violencia" icon="fa-solid fa-tag" name="type" value={form.type} onChange={onChange} required options={TYPE_OPTIONS} />
          <FormSelect   label="Estado" icon="fa-solid fa-circle-half-stroke" name="status" value={form.status} onChange={onChange} required options={STATUS_OPTIONS} />
          <FormInput    label="Fecha" icon="fa-solid fa-calendar" type="date" name="date" value={form.date} onChange={onChange} required />
          <FormTextarea label="Descripción" name="description" value={form.description} onChange={onChange} required />
          <ModalFooter onCancel={() => setEditing(null)} submitLabel="Actualizar" />
        </form>
      </Modal>
    </>
  )
}
