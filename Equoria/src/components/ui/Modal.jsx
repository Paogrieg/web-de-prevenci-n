import { useEffect } from 'react'

export default function Modal({ open, onClose, title, children, maxWidth = 500 }) {
  useEffect(() => {
    const onEsc = (e) => e.key === 'Escape' && onClose?.()
    if (open) document.addEventListener('keydown', onEsc)
    return () => document.removeEventListener('keydown', onEsc)
  }, [open, onClose])

  if (!open) return null

  return (
    <div
      onClick={onClose}
      style={{
        position: 'fixed', inset: 0, background: 'rgba(26,10,46,0.5)',
        zIndex: 999, display: 'flex', alignItems: 'center', justifyContent: 'center',
      }}
    >
      <div
        onClick={(e) => e.stopPropagation()}
        style={{
          background: 'white', borderRadius: 20, padding: 36, width: '100%',
          maxWidth, boxShadow: 'var(--shadow-lg)', maxHeight: '90vh', overflowY: 'auto',
        }}
      >
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: 24 }}>
          <h3 style={{ fontFamily: "'Playfair Display',serif", color: 'var(--plum-800)' }}>{title}</h3>
          <button
            onClick={onClose}
            style={{ background: 'none', border: 'none', fontSize: 20, cursor: 'pointer', color: 'var(--text-secondary)' }}
          >
            ✕
          </button>
        </div>
        {children}
      </div>
    </div>
  )
}

export function ModalFooter({ onCancel, submitLabel = 'Guardar' }) {
  return (
    <div style={{ display: 'flex', gap: 10, justifyContent: 'flex-end' }}>
      <button type="button" onClick={onCancel} className="btn-outline" style={{ padding: '10px 20px' }}>
        Cancelar
      </button>
      <button type="submit" className="btn-login" style={{ width: 'auto', padding: '10px 24px' }}>
        {submitLabel}
      </button>
    </div>
  )
}
