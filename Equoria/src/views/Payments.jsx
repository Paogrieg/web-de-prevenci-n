import { useState } from 'react'
import { paymentsApi } from '../services/endpoints.js'
import useResource from '../hooks/useResource.js'
import PageHeader from '../components/shared/PageHeader.jsx'
import StatCard from '../components/ui/StatCard.jsx'
import Badge from '../components/ui/Badge.jsx'
import Modal, { ModalFooter } from '../components/ui/Modal.jsx'
import FormInput from '../components/ui/FormInput.jsx'
import FormSelect from '../components/ui/FormSelect.jsx'
import DataTable from '../components/shared/DataTable.jsx'
import DeleteButton, { EditButton } from '../components/shared/DeleteButton.jsx'
import { formatDate, formatMoney } from '../components/shared/formatDate.js'

const METHOD_OPTIONS = [
  { value: 'Tarjeta de crédito', label: 'Tarjeta de crédito' },
  { value: 'Tarjeta de débito',  label: 'Tarjeta de débito' },
  { value: 'Transferencia',      label: 'Transferencia' },
  { value: 'OXXO Pay',           label: 'OXXO Pay' },
]

const STATUS_OPTIONS = [
  { value: 'in_process', label: 'En proceso' },
  { value: 'completed',  label: 'Completado' },
  { value: 'canceled',   label: 'Cancelado' },
]

const EMPTY = {
  cost: '', payment_method: '', payment_reference: '',
  status: 'in_process', payment_date: '', verification_id: '',
}

export default function Payments() {
  const { items: payments, create, update, remove } = useResource(paymentsApi, 'pago')
  const [modalCreate, setModalCreate] = useState(false)
  const [editing, setEditing] = useState(null)
  const [form, setForm] = useState(EMPTY)

  const onChange = (e) => setForm({ ...form, [e.target.name]: e.target.value })

  const openEdit = (p) => {
    setEditing(p)
    setForm({
      cost: p.cost, payment_method: p.payment_method,
      payment_reference: p.payment_reference, status: p.status,
      payment_date: p.payment_date, verification_id: p.verification_id || '',
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

  const completed = payments.filter((p) => p.status === 'completed')
  const totalIngresos = completed.reduce((sum, p) => sum + Number(p.cost || 0), 0)
  const totalProcesados = payments.reduce((sum, p) => sum + Number(p.cost || 0), 0)

  const counts = {
    completed:  payments.filter((p) => p.status === 'completed').length,
    in_process: payments.filter((p) => p.status === 'in_process').length,
    canceled:   payments.filter((p) => p.status === 'canceled').length,
  }

  return (
    <>
      <PageHeader
        icon="fa-solid fa-credit-card"
        title="Pagos"
        subtitle="Control financiero y métodos de pago del sistema"
        action={
          <button className="btn-primary" onClick={() => { setForm(EMPTY); setModalCreate(true) }}>
            ＋ Nuevo pago
          </button>
        }
      />

      <div className="pagos-hero">
        <div className="credit-card">
          <div>
            <div className="cc-chip"><i className="fa-solid fa-credit-card" style={{ color: 'rgb(255,255,255)' }}></i></div>
            <div className="cc-number">4562 &nbsp;1122 &nbsp;4594 &nbsp;7852</div>
          </div>
          <div className="cc-footer">
            <div><div className="cc-label">Titular</div><div className="cc-val">Admin</div></div>
            <div style={{ textAlign: 'right' }}><div className="cc-label">Vence</div><div className="cc-val">03/28</div></div>
            <div className="cc-brand">
              <i className="fa-solid fa-circle" style={{ color: 'rgb(48,113,230)' }}></i>
              <i className="fa-solid fa-circle" style={{ color: 'rgb(255,0,0)' }}></i>
            </div>
          </div>
        </div>

        <div className="pago-box">
          <div className="pago-icon"><i className="fa-solid fa-building-columns"></i></div>
          <div className="pago-lbl">Ingresos del mes</div>
          <div className="pago-name">Transferencias</div>
          <div className="pago-amount">+${formatMoney(totalIngresos)}</div>
          <div className="pago-sub">Fondos recibidos</div>
        </div>

        <div className="pago-box">
          <div className="pago-icon sec"><i className="fa-solid fa-money-bill-transfer"></i></div>
          <div className="pago-lbl">Pagos procesados</div>
          <div className="pago-name">Verificaciones</div>
          <div className="pago-amount">${formatMoney(totalProcesados)}</div>
          <div className="pago-sub">{payments.length} pagos en total</div>
        </div>
      </div>

      <div className="stats-grid">
        <StatCard icon="fa-solid fa-credit-card"     iconVariant="v" value={payments.length}    label="Total pagos" />
        <StatCard icon="fa-solid fa-circle-check"    iconVariant="t" value={counts.completed}   label="Completados" />
        <StatCard icon="fa-solid fa-hourglass-half"  iconVariant="g" value={counts.in_process}  label="En proceso" />
        <StatCard icon="fa-solid fa-circle-xmark"    iconVariant="r" value={counts.canceled}    label="Cancelados" />
      </div>

      <div className="card">
        <div className="card-header">
          <div>
            <div className="card-title">Historial de Pagos</div>
            <div className="card-subtitle">{payments.length} pagos registrados</div>
          </div>
        </div>

        <DataTable
          columns={['#', 'Costo', 'Método', 'Referencia', 'Estado', 'Fecha', 'Acciones']}
          data={payments}
          emptyMessage="No hay pagos registrados"
          renderRow={(p) => (
            <tr key={p.id}>
              <td style={{ color: 'var(--text-secondary)' }}>#{p.id}</td>
              <td style={{ fontWeight: 600 }}>${formatMoney(p.cost)}</td>
              <td>{p.payment_method}</td>
              <td style={{ fontSize: 12, color: 'var(--text-secondary)' }}>{p.payment_reference}</td>
              <td><Badge status={p.status} /></td>
              <td>{formatDate(p.payment_date)}</td>
              <td>
                <div style={{ display: 'flex', gap: 6 }}>
                  <EditButton onClick={() => openEdit(p)} />
                  <DeleteButton onDelete={() => remove(p.id, '¿Eliminar este pago?')} />
                </div>
              </td>
            </tr>
          )}
        />
      </div>

      {/* Modal CREAR */}
      <Modal open={modalCreate} onClose={() => setModalCreate(false)} title="Nuevo Pago">
        <form onSubmit={handleCreate}>
          <FormInput label="Costo" icon="fa-solid fa-dollar-sign" type="number" step="0.01" name="cost" value={form.cost} onChange={onChange} required placeholder="0.00" />
          <FormSelect label="Método de pago" icon="fa-solid fa-credit-card" name="payment_method" value={form.payment_method} onChange={onChange} required placeholder="Selecciona..." options={METHOD_OPTIONS} />
          <FormInput label="Referencia" icon="fa-solid fa-hashtag" name="payment_reference" value={form.payment_reference} onChange={onChange} required placeholder="Ej: REF-001" />
          <FormSelect label="Estado" icon="fa-solid fa-circle-half-stroke" name="status" value={form.status} onChange={onChange} required options={STATUS_OPTIONS} />
          <FormInput label="Fecha de pago" icon="fa-solid fa-calendar" type="date" name="payment_date" value={form.payment_date} onChange={onChange} required />
          <FormInput label="ID de verificación" icon="fa-solid fa-link" type="number" name="verification_id" value={form.verification_id} onChange={onChange} required placeholder="ID de la verificación" />
          <ModalFooter onCancel={() => setModalCreate(false)} />
        </form>
      </Modal>

      {/* Modal EDITAR */}
      <Modal open={!!editing} onClose={() => setEditing(null)} title="Editar Pago">
        <form onSubmit={handleUpdate}>
          <FormInput label="Costo" icon="fa-solid fa-dollar-sign" type="number" step="0.01" name="cost" value={form.cost} onChange={onChange} required />
          <FormSelect label="Método de pago" icon="fa-solid fa-credit-card" name="payment_method" value={form.payment_method} onChange={onChange} required options={METHOD_OPTIONS} />
          <FormInput label="Referencia" icon="fa-solid fa-hashtag" name="payment_reference" value={form.payment_reference} onChange={onChange} required />
          <FormSelect label="Estado" icon="fa-solid fa-circle-half-stroke" name="status" value={form.status} onChange={onChange} required options={STATUS_OPTIONS} />
          <FormInput label="Fecha de pago" icon="fa-solid fa-calendar" type="date" name="payment_date" value={form.payment_date} onChange={onChange} required />
          <ModalFooter onCancel={() => setEditing(null)} submitLabel="Actualizar" />
        </form>
      </Modal>
    </>
  )
}
