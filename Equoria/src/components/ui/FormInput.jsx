export default function FormInput({ label, icon, name, type = 'text', value, onChange, required, placeholder, ...rest }) {
  return (
    <div className="login-form-group">
      <label>{label}</label>
      <div className="login-input-wrap">
        {icon && <i className={icon}></i>}
        <input
          type={type}
          name={name}
          value={value ?? ''}
          onChange={onChange}
          required={required}
          placeholder={placeholder}
          {...rest}
        />
      </div>
    </div>
  )
}
