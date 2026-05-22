import { useState } from 'react'

export default function Toggle({ defaultOn = false, onChange }) {
  const [on, setOn] = useState(defaultOn)
  const toggle = () => {
    const next = !on
    setOn(next)
    onChange?.(next)
  }
  return (
    <button
      type="button"
      className={`toggle ${on ? 'on' : ''}`}
      onClick={toggle}
      aria-pressed={on}
    />
  )
}
