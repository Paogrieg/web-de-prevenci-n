export default function FormSelect({ label, icon, name, value, onChange, required, options, placeholder }) {
  return (
    <div className="login-form-group">
      <label>{label}</label>
      <div className="login-input-wrap">
        {icon && <i className={icon}></i>}
        <select
          name={name}
          value={value ?? ''}
          onChange={onChange}
          required={required}
          style={{
            width: '100%', padding: '12px 14px 12px 40px',
            border: '1.5px solid var(--plum-200)', borderRadius: 10,
            fontSize: 14, fontFamily: "'DM Sans',sans-serif", outline: 'none',
            appearance: 'none', background: 'var(--surface)',
          }}
        >
          {placeholder && <option value="">{placeholder}</option>}
          {options.map((opt) => (
            <option key={opt.value} value={opt.value}>{opt.label}</option>
          ))}
        </select>
      </div>
    </div>
  )
}
