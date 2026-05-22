export default function PageHeader({ icon, title, subtitle, action }) {
  return (
    <div className="page-header-row">
      <div className="page-header">
        <h2>{icon && <i className={icon}></i>} {title}</h2>
        {subtitle && <p>{subtitle}</p>}
      </div>
      {action}
    </div>
  )
}
