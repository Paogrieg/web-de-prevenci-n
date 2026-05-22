import { useState } from 'react'
import { usersApi } from '../services/endpoints.js'
import useResource from '../hooks/useResource.js'
import { useAuth } from '../context/AuthContext.jsx'
import PageHeader from '../components/shared/PageHeader.jsx'
import StatCard from '../components/ui/StatCard.jsx'
import Badge from '../components/ui/Badge.jsx'
import DataTable from '../components/shared/DataTable.jsx'
import DeleteButton from '../components/shared/DeleteButton.jsx'
import UserAvatar from '../components/shared/UserAvatar.jsx'
import { formatDate } from '../components/shared/formatDate.js'
import toast from 'react-hot-toast'

export default function Users() {
  const { user: currentUser } = useAuth()
  const { items: users, fetchAll, remove } = useResource(usersApi, 'usuaria')

  const handleVerify = async (id) => {
    try {
      await usersApi.verify(id)
      toast.success('Usuaria verificada')
      fetchAll()
    } catch {
      toast.error('Error al verificar')
    }
  }

  const verifiedCount = users.filter((u) => u.verificated).length
  const pendingCount  = users.filter((u) => !u.verificated).length
  const newThisMonth  = users.filter((u) => {
    if (!u.created_at) return false
    const created = new Date(u.created_at)
    const now = new Date()
    return created.getMonth() === now.getMonth() && created.getFullYear() === now.getFullYear()
  }).length

  return (
    <>
      <PageHeader
        icon="fa-solid fa-users"
        title="Usuarias"
        subtitle="Gestión de usuarias registradas en la plataforma"
      />

      <div className="stats-grid">
        <StatCard icon="fa-solid fa-users"          iconVariant="v" value={users.length} label="Total registradas" />
        <StatCard icon="fa-solid fa-circle-check"   iconVariant="t" value={verifiedCount} label="Verificadas" />
        <StatCard icon="fa-solid fa-user-plus"      iconVariant="g" value={newThisMonth} label="Nuevas este mes" />
        <StatCard icon="fa-solid fa-hourglass-half" iconVariant="r" value={pendingCount} label="Pendientes verificar" />
      </div>

      <div className="card">
        <div className="card-header">
          <div>
            <div className="card-title">Listado de Usuarias</div>
            <div className="card-subtitle">{users.length} usuarias registradas</div>
          </div>
        </div>

        <DataTable
          columns={['Usuaria', 'Rol', 'Teléfono', 'Estado', 'Registro', 'Acciones']}
          data={users}
          emptyMessage="No hay usuarias registradas"
          renderRow={(u) => (
            <tr key={u.id}>
              <td>
                <div className="user-row">
                  <UserAvatar name={u.name} lastname={u.lastname} />
                  <div>
                    <div style={{ fontWeight: 500 }}>{u.name} {u.lastname}</div>
                    <div style={{ fontSize: 11, color: 'var(--text-secondary)' }}>{u.email}</div>
                  </div>
                </div>
              </td>
              <td>{u.rol && u.rol[0].toUpperCase() + u.rol.slice(1)}</td>
              <td>{u.phone_number}</td>
              <td>
                {u.verificated ? (
                  <Badge status="verificada" />
                ) : (
                  <div style={{ display: 'flex', gap: 6, alignItems: 'center' }}>
                    <Badge status="pendiente" />
                    <button
                      onClick={() => handleVerify(u.id)}
                      className="btn btn-sm btn-success"
                      style={{ padding: '4px 8px' }}
                    >
                      <i className="fa-regular fa-circle-check"></i>
                    </button>
                  </div>
                )}
              </td>
              <td>{formatDate(u.created_at)}</td>
              <td>
                {u.id !== currentUser?.id && (
                  <DeleteButton onDelete={() => remove(u.id, '¿Eliminar esta usuaria?')} />
                )}
              </td>
            </tr>
          )}
        />
      </div>
    </>
  )
}
