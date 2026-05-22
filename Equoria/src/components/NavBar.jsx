import { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom"; // 1. Importamos useNavigate
import { COLORS, NAV_LINKS, outlineBtn, primaryBtn } from "../constants/data";

function NavLink({ label }) {
  const [hov, setHov] = useState(false);
  return (
    <span 
      onMouseEnter={() => setHov(true)} 
      onMouseLeave={() => setHov(false)}
      style={{ cursor: "pointer", color: hov ? "var(--primary-color, blue)" : "inherit" }}
    >
      {label}
    </span>
  );
}

export default function Navbar() {
  const [scrolled, setScrolled] = useState(false);
  const navigate = useNavigate(); 

  useEffect(() => {
    const fn = () => setScrolled(window.scrollY > 10);
    window.addEventListener("scroll", fn);
    return () => window.removeEventListener("scroll", fn);
  }, []);

  return (
    <nav style={{
      position: "sticky", top: 0, zIndex: 100,
      background: COLORS.white,
      borderBottom: `1px solid rgba(107,47,160,${scrolled ? 0.15 : 0.08})`,
      boxShadow: scrolled ? "0 4px 20px rgba(26,10,46,0.1)" : "0 2px 12px rgba(26,10,46,0.04)",
      padding: "0 48px", height: 68,
      display: "flex", alignItems: "center", gap: 32,
      transition: "box-shadow 0.3s, border-color 0.3s",
    }}>

      {NAV_LINKS.map(l => (
        <NavLink key={l} label={l} />
      ))}

      <div style={{ display: "flex", alignItems: "center", gap: 12, marginLeft: "auto" }}>
        <button style={outlineBtn} onClick={() => navigate('/login')}>
          Iniciar sesión
        </button>
        <button style={primaryBtn} onClick={() => navigate('/register')}>
          Registrarse
        </button>
      </div>
    </nav>
  );
}