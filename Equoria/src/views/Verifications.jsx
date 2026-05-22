import { useState } from 'react'
import { verificationsApi } from '../services/endpoints.js'
import useResource from '../hooks/useResource.js'
import PageHeader from '../components/shared/PageHeader.jsx'
import StatCard from '../components/ui/StatCard.jsx'
import Badge from '../components/ui/Badge.jsx'
import Modal, { ModalFooter } from '../components/ui/Modal.jsx'
import FormInput from '../components/ui/FormInput.jsx'
import FormSelect from '../components/ui/FormSelect.jsx'
import DataTable from '../components/shared/DataTable.jsx'
import DeleteButton, { EditButton } from '../components/shared/DeleteButton.jsx'
import { formatDate } from '../components/shared/formatDate.js'

const STATE_OPTIONS = [
  { value: 'pendiente', label: 'Pendiente' },
  { value: 'aprobada',  label: 'Aprobada' },
  { value: 'rechazada', label: 'Rechazada' },
]

const EMPTY = { new_id: '', state: 'pendiente', date_verification: '' }

export default function Verifications() {
  const { items: verifications, create, update, remove } = useResource(verificationsApi, 'verificación')
  const [modalCreate, setModalCreate] = useState(false)
  const [editing, setEditing] = useState(null)
  const [form, setForm] = useState(EMPTY)

  const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value })

  const openEdit = (v) => {
    setEditing(v)
    setForm({ new_id: v.new_id, state: v.state, date_verification: v.date_verification })
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
    pendiente:  verifications.filter((v) => v.state === 'pendiente').length,
    aprobada:   verifications.filter((v) => v.state === 'aprobada').length,
    rechazada:  verifications.filter((v) => v.state === 'rechazada').length,
  }
  const tasaAprobacion = verifications.length > 0
    ? Math.round((counts.aprobada / verifications.length) * 100)
    : 0

  return (
    <>
      <PageHeader
        icon="fa-solid fa-circle-check"
        title="Verificaciones"
        subtitle="Revisión y aprobación de contenido pendiente"
        action={
          <button className="btn-primary" onClick={() => { setForm(EMPTY); setModalCreate(true) }}>
            ＋ Nueva verificación
          </button>
        }
      />

      <div className="stats-grid">
        <StatCard icon="fa-solid fa-hourglass-half" iconVariant="g" value={counts.pendiente} label="Pendientes" />
        <StatCard icon="fa-solid fa-circle-check"   iconVariant="t" value={counts.aprobada}  label="Aprobadas" />
        <StatCard icon="fa-solid fa-circle-xmark"   iconVariant="r" value={counts.rechazada} label="Rechazadas" />
        <StatCard icon="fa-solid fa-chart-simple"   iconVariant="v" value={`${tasaAprobacion}%`} label="Tasa aprobación" />
      </div>

      <div className="card">
        <div className="card-header">
          <div><div className="card-title">Cola de Verificación</div></div>
        </div>

        <DataTable
          columns={['#', 'Noticia ID', 'Estado', 'Fecha verificación', 'Acciones']}
          data={verifications}
          emptyMessage="No hay verificaciones registradas"
          renderRow={(v) => (
            <tr key={v.id}>
              <td style={{ color: 'var(--text-secondary)' }}>#{v.id}</td>
              <td>#{v.new_id}</td>
              <td><Badge status={v.state} /></td>
              <td>{formatDate(v.date_verification)}</td>
              <td>
                <div style={{ display: 'flex', gap: 6 }}>
                  <EditButton onClick={() => openEdit(v)} />
                  <DeleteButton onDelete={() => remove(v.id, '¿Eliminar esta verificación?')} />
                </div>
              </td>
            </tr>
          )}
        />
      </div>

      {/* Modal CREAR */}
      <Modal open={modalCreate} onClose={() => setModalCreate(false)} title="Nueva Verificación">
        <form onSubmit={handleCreate}>
          <FormInput label="ID de Noticia" icon="fa-solid fa-newspaper" type="number" name="new_id" value={form.new_id} onChange={onChange} required placeholder="ID de la noticia" />
          <FormSelect label="Estado" icon="fa-solid fa-circle-half-stroke" name="state" value={form.state} onChange={onChange} required options={STATE_OPTIONS} />
          <FormInput label="Fecha de verificación" icon="fa-solid fa-calendar" type="date" name="date_verification" value={form.date_verification} onChange={onChange} required />
          <ModalFooter onCancel={() => setModalCreate(false)} />
        </form>
      </Modal>

      {/* Modal EDITAR */}
      <Modal open={!!editing} onClose={() => setEditing(null)} title="Editar Verificación">
        <form onSubmit={handleUpdate}>
          <FormSelect label="Estado" icon="fa-solid fa-circle-half-stroke" name="state" value={form.state} onChange={onChange} required options={STATE_OPTIONS} />
          <FormInput label="Fecha de verificación" icon="fa-solid fa-calendar" type="date" name="date_verification" value={form.date_verification} onChange={onChange} required />
          <ModalFooter onCancel={() => setEditing(null)} submitLabel="Actualizar" />
        </form>
      </Modal>
    </>
  )
}
