export default function UserAvatar({ name = '', lastname = '', gradient }) {
  const initials = `${(name[0] || '').toUpperCase()}${(lastname[0] || '').toUpperCase()}` || 'U'
  return (
    <div className="u-av" style={gradient ? { background: gradient } : undefined}>
      {initials}
    </div>
  )
}
