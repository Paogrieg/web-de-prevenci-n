export default function FormTextarea({ label, name, value, onChange, required, rows = 3, placeholder }) {
  return (
    <div className="login-form-group">
      <label>{label}</label>
      <textarea
        name={name}
        value={value ?? ''}
        onChange={onChange}
        required={required}
        rows={rows}
        placeholder={placeholder}
        style={{
          width: '100%', padding: 12, border: '1.5px solid var(--plum-200)',
          borderRadius: 10, fontSize: 14, fontFamily: "'DM Sans',sans-serif",
          resize: 'vertical', outline: 'none',
        }}
      />
    </div>
  )
}
