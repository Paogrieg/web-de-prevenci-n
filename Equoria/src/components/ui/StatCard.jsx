export default function StatCard({ icon, iconVariant = 'v', value, label, sub, trend }) {
  return (
    <div className="stat-card">
      <div className="stat-header">
        <div className={`stat-icon si-${iconVariant}`}>
          <i className={icon}></i>
        </div>
        {trend && <span className={`stat-trend t-${trend.type}`}>{trend.label}</span>}
      </div>
      <div className="stat-value">{value}</div>
      <div className="stat-label">{label}</div>
      {sub && <div className="stat-sub">{sub}</div>}
    </div>
  )
}
