export default function AlertSuccess({ children }) {
  if (!children) return null
  return (
    <div style={{
      background: '#d1fae5', border: '1px solid #10b981', color: '#065f46',
      borderRadius: 10, padding: '12px 16px', marginBottom: 16, fontSize: 13,
    }}>
      <i className="fa-solid fa-circle-check"></i> {children}
    </div>
  )
}
