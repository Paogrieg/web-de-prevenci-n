export default function DeleteButton({ onDelete }) {
  return (
    <button
      type="button"
      onClick={onDelete}
      style={{
        padding: '4px 10px', fontSize: 12,
        background: 'var(--rose-light)', color: 'var(--rose-accent)',
        border: '1px solid var(--rose-accent)', borderRadius: 8, cursor: 'pointer',
      }}
    >
      <i className="fa-solid fa-trash"></i>
    </button>
  )
}

export function EditButton({ onClick }) {
  return (
    <button
      type="button"
      onClick={onClick}
      className="btn-outline"
      style={{ padding: '4px 10px', fontSize: 12 }}
    >
      <i className="fa-solid fa-pen"></i>
    </button>
  )
}
