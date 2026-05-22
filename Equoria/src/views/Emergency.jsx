import { useState } from 'react'
import { emergencyApi } from '../services/endpoints.js'
import useResource from '../hooks/useResource.js'
import PageHeader from '../components/shared/PageHeader.jsx'
import StatCard from '../components/ui/StatCard.jsx'
import Modal, { ModalFooter } from '../components/ui/Modal.jsx'
import FormInput from '../components/ui/FormInput.jsx'
import FormSelect from '../components/ui/FormSelect.jsx'
import DataTable from '../components/shared/DataTable.jsx'
import DeleteButton, { EditButton } from '../components/shared/DeleteButton.jsx'

const RELATION_OPTIONS = [
  { value: 'Refugio',        label: 'Refugio' },
  { value: 'Abogada',        label: 'Abogada' },
  { value: 'Psicóloga',      label: 'Psicóloga' },
  { value: 'Dependencia',    label: 'Dependencia policial' },
  { value: 'Línea de crisis',label: 'Línea de crisis' },
  { value: 'Otro',           label: 'Otro' },
]

const EMPTY = { name: '', lastname: '', phone_number: '', relation: '' }

export default function Emergency() {
  const { items: contacts, create, update, remove } = useResource(emergencyApi, 'contacto')
  const [modalCreate, setModalCreate] = useState(false)
  const [editing, setEditing] = useState(null)
  const [form, setForm] = useState(EMPTY)

  const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value })

  const openEdit = (c) => {
    setEditing(c)
    setForm({ name: c.name, lastname: c.lastname, phone_number: c.phone_number, relation: c.relation })
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
        icon="fa-solid fa-phone"
        title="Contactos de Emergencia"
        subtitle="Red de apoyo y contactos de confianza registrados"
        action={
          <button className="btn-primary" onClick={() => { setForm(EMPTY); setModalCreate(true) }}>
            <i className="fa-solid fa-plus"></i> Nuevo contacto
          </button>
        }
      />

      <div className="stats-grid">
        <StatCard icon="fa-solid fa-phone" iconVariant="v" value={contacts.length} label="Total contactos" />
      </div>

      <div className="card">
        <div className="card-header">
          <div>
            <div className="card-title">Todos los Contactos</div>
            <div className="card-subtitle">{contacts.length} contactos registrados</div>
          </div>
        </div>

        <DataTable
          columns={['Nombre', 'Teléfono', 'Relación', 'Acciones']}
          data={contacts}
          emptyMessage="No hay contactos registrados"
          renderRow={(c) => (
            <tr key={c.id}>
              <td style={{ fontWeight: 500 }}>{c.name} {c.lastname}</td>
              <td>{c.phone_number}</td>
              <td>{c.relation}</td>
              <td>
                <div style={{ display: 'flex', gap: 6 }}>
                  <EditButton onClick={() => openEdit(c)} />
                  <DeleteButton onDelete={() => remove(c.id, '¿Eliminar este contacto?')} />
                </div>
              </td>
            </tr>
          )}
        />
      </div>

      {/* Modal CREAR */}
      <Modal open={modalCreate} onClose={() => setModalCreate(false)} title="Nuevo Contacto">
        <form onSubmit={handleCreate}>
          <FormInput label="Nombre" icon="fa-solid fa-user" name="name" value={form.name} onChange={onChange} required />
          <FormInput label="Apellido" icon="fa-solid fa-user" name="lastname" value={form.lastname} onChange={onChange} required />
          <FormInput label="Teléfono" icon="fa-solid fa-phone" type="tel" name="phone_number" value={form.phone_number} onChange={onChange} required maxLength={10} placeholder="10 dígitos" />
          <FormSelect label="Tipo de relación" icon="fa-solid fa-tag" name="relation" value={form.relation} onChange={onChange} required placeholder="Selecciona..." options={RELATION_OPTIONS} />
          <ModalFooter onCancel={() => setModalCreate(false)} />
        </form>
      </Modal>

      {/* Modal EDITAR */}
      <Modal open={!!editing} onClose={() => setEditing(null)} title="Editar Contacto">
        <form onSubmit={handleUpdate}>
          <FormInput label="Nombre" icon="fa-solid fa-user" name="name" value={form.name} onChange={onChange} required />
          <FormInput label="Apellido" icon="fa-solid fa-user" name="lastname" value={form.lastname} onChange={onChange} required />
          <FormInput label="Teléfono" icon="fa-solid fa-phone" type="tel" name="phone_number" value={form.phone_number} onChange={onChange} required maxLength={10} />
          <FormSelect label="Tipo de relación" icon="fa-solid fa-tag" name="relation" value={form.relation} onChange={onChange} required options={RELATION_OPTIONS} />
          <ModalFooter onCancel={() => setEditing(null)} submitLabel="Actualizar" />
        </form>
      </Modal>
    </>
  )
}
