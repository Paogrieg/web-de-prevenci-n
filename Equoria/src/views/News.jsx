import { useState } from 'react'
import { newsApi } from '../services/endpoints.js'
import useResource from '../hooks/useResource.js'
import PageHeader from '../components/shared/PageHeader.jsx'
import StatCard from '../components/ui/StatCard.jsx'
import Modal, { ModalFooter } from '../components/ui/Modal.jsx'
import FormInput from '../components/ui/FormInput.jsx'
import FormTextarea from '../components/ui/FormTextarea.jsx'
import DataTable from '../components/shared/DataTable.jsx'
import DeleteButton, { EditButton } from '../components/shared/DeleteButton.jsx'
import UserAvatar from '../components/shared/UserAvatar.jsx'
import { formatDate } from '../components/shared/formatDate.js'

const EMPTY = { title: '', content: '' }

export default function News() {
  const { items: news, create, update, remove } = useResource(newsApi, 'noticia')
  const [modalCreate, setModalCreate] = useState(false)
  const [editing, setEditing] = useState(null)
  const [form, setForm] = useState(EMPTY)

  const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value })

  const openEdit = (n) => {
    setEditing(n)
    setForm({ title: n.title, content: n.content })
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
        icon="fa-solid fa-newspaper"
        title="Noticias"
        subtitle="Publicaciones y comunicados de la plataforma"
        action={
          <button className="btn-primary" onClick={() => { setForm(EMPTY); setModalCreate(true) }}>
            ＋ Nueva noticia
          </button>
        }
      />

      <div className="stats-grid">
        <StatCard icon="fa-solid fa-newspaper" iconVariant="v" value={news.length} label="Total publicadas" />
      </div>

      <div className="card">
        <div className="card-header">
          <div>
            <div className="card-title">Todas las Noticias</div>
            <div className="card-subtitle">{news.length} noticias</div>
          </div>
        </div>

        <DataTable
          columns={['Título', 'Autor', 'Publicación', 'Acciones']}
          data={news}
          emptyMessage="No hay noticias registradas"
          renderRow={(n) => (
            <tr key={n.id}>
              <td style={{ fontWeight: 500 }}>{n.title}</td>
              <td>
                <div className="user-row">
                  <UserAvatar name={n.user?.name || 'U'} />
                  {n.user?.name || 'Sin autor'}
                </div>
              </td>
              <td>{formatDate(n.created_at)}</td>
              <td>
                <div style={{ display: 'flex', gap: 6 }}>
                  <EditButton onClick={() => openEdit(n)} />
                  <DeleteButton onDelete={() => remove(n.id, '¿Eliminar esta noticia?')} />
                </div>
              </td>
            </tr>
          )}
        />
      </div>

      {/* Modal CREAR */}
      <Modal open={modalCreate} onClose={() => setModalCreate(false)} title="Nueva Noticia">
        <form onSubmit={handleCreate}>
          <FormInput label="Título" icon="fa-solid fa-newspaper" name="title" value={form.title} onChange={onChange} required />
          <FormTextarea label="Contenido" name="content" value={form.content} onChange={onChange} required rows={5} />
          <ModalFooter onCancel={() => setModalCreate(false)} submitLabel="Publicar" />
        </form>
      </Modal>

      {/* Modal EDITAR */}
      <Modal open={!!editing} onClose={() => setEditing(null)} title="Editar Noticia">
        <form onSubmit={handleUpdate}>
          <FormInput label="Título" icon="fa-solid fa-newspaper" name="title" value={form.title} onChange={onChange} required />
          <FormTextarea label="Contenido" name="content" value={form.content} onChange={onChange} required rows={5} />
          <ModalFooter onCancel={() => setEditing(null)} submitLabel="Actualizar" />
        </form>
      </Modal>
    </>
  )
}
