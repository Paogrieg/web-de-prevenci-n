import { useState } from "react";
import { fmtDate, initials } from "../constants/feedData";

export function Skeleton() {
  return (
    <div className="eq-skeleton">
      <div style={{ display: "flex", gap: 12, marginBottom: 16 }}>
        <div className="eq-skel-line" style={{ width: 42, height: 42, borderRadius: 12, flexShrink: 0 }} />
        <div style={{ flex: 1 }}>
          <div className="eq-skel-line" style={{ width: "50%", marginBottom: 6 }} />
          <div className="eq-skel-line" style={{ width: "30%" }} />
        </div>
      </div>
      <div className="eq-skel-line" style={{ width: "80%", height: 16, marginBottom: 10 }} />
      <div className="eq-skel-line" style={{ width: "100%", marginBottom: 6 }} />
      <div className="eq-skel-line" style={{ width: "90%", marginBottom: 6 }} />
      <div className="eq-skel-line" style={{ width: "60%" }} />
    </div>
  );
}

export function PostCard({ post, delay }) {
  const [liked, setLiked] = useState(false);
  const [saved, setSaved] = useState(false);
  const [likes, setLikes] = useState(Math.floor(Math.random() * 300) + 10);

  const toggleLike = () => { 
    setLiked(p => !p); 
    setLikes(p => liked ? p - 1 : p + 1); 
  };

  // Formateador de fecha seguro por si 'fmtDate' falla o no existe
  const dateStr = post.created_at ? new Date(post.created_at).toLocaleDateString() : "";

  // ------------------------------------------
  // 1. DISEÑO PARA NOTICIAS
  // ------------------------------------------
  if (post.type === "news") {
    return (
      <div className="eq-post-card" style={{ animationDelay: `${delay}s`, marginBottom: "15px", padding: "20px", background: "#fff", borderRadius: "12px", border: "1px solid #eee" }}>
        <div style={{ display: "flex", gap: "10px", alignItems: "center", marginBottom: "15px" }}>
          <div className="eq-user-av" style={{ width: 40, height: 40, background: "var(--primary-color)", color: "#fff", display: "flex", alignItems: "center", justifyContent: "center", borderRadius: "10px" }}>
            <i className="fa-solid fa-newspaper" />
          </div>
          <div>
            <div style={{ fontWeight: "bold", color: "var(--primary-color)" }}>Noticia Oficial</div>
            <div style={{ fontSize: "12px", color: "var(--text-secondary)" }}>{dateStr}</div>
          </div>
        </div>
        <div style={{ color: "var(--text-main)" }}>
          <h3 style={{ margin: "0 0 8px 0", fontSize: "16px" }}>{post.title}</h3>
          <p style={{ margin: 0, fontSize: "14px", lineHeight: "1.5" }}>{post.content || post.description}</p>
        </div>
        <div style={{ display: "flex", gap: "20px", marginTop: "15px", paddingTop: "10px", borderTop: "1px solid #eee", color: "var(--text-secondary)", fontSize: "14px" }}>
          <span style={{ cursor: "pointer", color: liked ? "red" : "inherit" }} onClick={toggleLike}>
            <i className={`fa-${liked ? "solid" : "regular"} fa-heart`} /> {likes}
          </span>
          <span style={{ cursor: "pointer" }}><i className="fa-regular fa-comment" /> Comentar</span>
        </div>
      </div>
    );
  }

  // ------------------------------------------
  // 2. DISEÑO PARA TESTIMONIOS
  // ------------------------------------------
  if (post.type === "testimony") {
    // Lectura exacta de tu base de datos
    const isAnon = post.anonymous === 1;
    const authorName = isAnon ? "Anónimo" : (post.user ? `${post.user.name} ${post.user.lastname}` : "Usuaria");
    const isVerif = !isAnon && post.user?.verificated === 1;
    const userInitials = isAnon ? "AN" : (post.user ? post.user.name.substring(0,2).toUpperCase() : "US");

    return (
      <div className="eq-post-card" style={{ animationDelay: `${delay}s`, marginBottom: "15px", padding: "20px", background: "#fff", borderRadius: "12px", border: "1px solid #eee" }}>
        <div style={{ display: "flex", gap: "10px", alignItems: "center", marginBottom: "15px" }}>
          <div className="eq-user-av" style={{ width: 40, height: 40, background: isAnon ? "#999" : "var(--primary-color)", color: "#fff", display: "flex", alignItems: "center", justifyContent: "center", borderRadius: "10px" }}>
            {userInitials}
          </div>
          <div>
            <div style={{ fontWeight: "bold", color: "var(--text-main)", display: "flex", alignItems: "center", gap: "5px" }}>
              {authorName}
              {isVerif && <i className="fa-solid fa-circle-check" style={{ color: "#a855f7" }} title="Usuaria verificada" />}
            </div>
            <div style={{ fontSize: "12px", color: "var(--text-secondary)" }}>{dateStr}</div>
          </div>
        </div>
        <div style={{ color: "var(--text-main)" }}>
          <p style={{ margin: 0, fontSize: "14px", lineHeight: "1.5" }}>{post.content}</p>
        </div>
        <div style={{ display: "flex", gap: "20px", marginTop: "15px", paddingTop: "10px", borderTop: "1px solid #eee", color: "var(--text-secondary)", fontSize: "14px" }}>
          <span style={{ cursor: "pointer", color: liked ? "red" : "inherit" }} onClick={toggleLike}>
            <i className={`fa-${liked ? "solid" : "regular"} fa-heart`} /> {likes}
          </span>
          <span style={{ cursor: "pointer" }}><i className="fa-regular fa-comment" /> Comentar</span>
        </div>
      </div>
    );
  }

  // ------------------------------------------
  // 3. DISEÑO PARA LEYES
  // ------------------------------------------
  if (post.type === "law") {
    return (
      <div className="eq-post-card" style={{ animationDelay: `${delay}s`, marginBottom: "15px", padding: "20px", background: "#fff", borderRadius: "12px", border: "1px solid #eee" }}>
        <div style={{ display: "flex", gap: "10px", alignItems: "center", marginBottom: "15px" }}>
          <div className="eq-user-av" style={{ width: 40, height: 40, background: "#8b5cf6", color: "#fff", display: "flex", alignItems: "center", justifyContent: "center", borderRadius: "10px" }}>
            <i className="fa-solid fa-scale-balanced" />
          </div>
          <div>
            <div style={{ fontWeight: "bold", color: "#8b5cf6" }}>Legislación y Leyes</div>
            <div style={{ fontSize: "12px", color: "var(--text-secondary)" }}>{dateStr}</div>
          </div>
        </div>
        <div style={{ color: "var(--text-main)" }}>
          <h3 style={{ margin: "0 0 8px 0", fontSize: "16px" }}>{post.title}</h3>
          <p style={{ margin: 0, fontSize: "14px", lineHeight: "1.5" }}>
            {post.description || "Recurso legal disponible para consulta en la plataforma."}
          </p>
        </div>
        <div style={{ display: "flex", gap: "20px", marginTop: "15px", paddingTop: "10px", borderTop: "1px solid #eee", color: "var(--text-secondary)", fontSize: "14px" }}>
          <span style={{ cursor: "pointer", color: liked ? "red" : "inherit" }} onClick={toggleLike}>
            <i className={`fa-${liked ? "solid" : "regular"} fa-heart`} /> {likes}
          </span>
          <span style={{ cursor: "pointer" }}><i className="fa-solid fa-up-right-from-square" /> Leer completa</span>
        </div>
      </div>
    );
  }

  // Si no encuentra ninguno de los 3 tipos, no dibuja nada para no romper la pantalla
  return null;
}