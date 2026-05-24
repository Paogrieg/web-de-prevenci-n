import { useState } from "react";
import { useNavigate } from "react-router-dom"; 
import { useAuth } from "../context/AuthContext"; 
import { useFeed } from "../hooks/useFeed";
import { API_BASE } from "../api/client";
import { PostCard, Skeleton } from "../components/PostCard";
import { FeedNavbar, LeftSidebar, RightSidebar } from "../components/FeedLayout";
import confetti from "canvas-confetti";
import toast from "react-hot-toast";
import "../styles/equoria.css"; 

export default function EquoriaFeed() {
  const navigate = useNavigate(); 
  const { user } = useAuth();  

  const [activeTab, setActiveTab] = useState("inicio");
  const [activePage, setActivePage] = useState("inicio");
  const [search, setSearch] = useState("");

  const [content, setContent] = useState("");
  const [isAnonymous, setIsAnonymous] = useState(false);
  const [isSubmitting, setIsSubmitting] = useState(false);

  const { feed, news, testimonials, laws, loading, error, refetch } = useFeed();

  const tabFiltered = feed.filter(p => {
    if (activeTab === "inicio")      return true;
    if (activeTab === "noticias")    return p.type === "news";
    if (activeTab === "testimonios") return p.type === "testimony";
    if (activeTab === "leyes")       return p.type === "law";
    return true;
  });

  const filtered = search.trim()
    ? tabFiltered.filter(p =>
        (p.title       || "").toLowerCase().includes(search.toLowerCase()) ||
        (p.content     || "").toLowerCase().includes(search.toLowerCase()) ||
        (p.description || "").toLowerCase().includes(search.toLowerCase())
      )
    : tabFiltered;

  const apiOk = !loading && !error;
  const stats = { news: news.length, test: testimonials.length, laws: laws.length };
  const userInitials = user?.name ? user.name.substring(0, 2).toUpperCase() : "U";

  const handlePublish = async () => {
    if (!content.trim() || !user) return;

    const loadingToast = toast.loading('Publicando tu testimonio...');
    setIsSubmitting(true);
    
    const token = localStorage.getItem('auth_token'); 

    if (!token) {
      toast.error("No se encontró tu sesión. Por favor, reintenta.", { id: loadingToast });
      setIsSubmitting(false);
      return; 
    }

    try {
      const response = await fetch(`${API_BASE}/testimonials`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "Authorization": `Bearer ${token}` 
        },
        body: JSON.stringify({
          content: content,
          anonymous: isAnonymous,
          user_id: user.id,
          complaint_id: 1 
        })
      });

      if (!response.ok) {
        const errorData = await response.json().catch(() => null);
        throw new Error(errorData?.message || errorData?.error || `Error: ${response.status}`);
      }

      const duration = 1.5 * 1000;
      const animationEnd = Date.now() + duration;
      const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };
      const colors = ['#4caf50', '#ff9800', '#81c784'];

      const interval = setInterval(function() {
        const timeLeft = animationEnd - Date.now();

        if (timeLeft <= 0) {
          return clearInterval(interval);
        }

        const particleCount = 50 * (timeLeft / duration);
        
        confetti({ 
          ...defaults, 
          particleCount, 
          origin: { x: Math.random() * (0.3 - 0.1) + 0.1, y: Math.random() - 0.2 }, 
          colors: colors, 
          angle: 60 
        });
        
        confetti({ 
          ...defaults, 
          particleCount, 
          origin: { x: Math.random() * (0.9 - 0.7) + 0.7, y: Math.random() - 0.2 }, 
          colors: colors, 
          angle: 120 
        });
      }, 250);

      toast.success((t) => (
        <span style={{ textAlign: 'center' }}>
          <b>¡Testimonio publicado!</b>
          <br />
          Has ganado <span style={{ color: '#4caf50', fontWeight: 'bold' }}>+10 Puntos de Empatía</span> <i className="fa-solid fa-award" style={{ color: '#ff9800', marginLeft: '4px' }} />
        </span>
      ), {
        id: loadingToast,
        duration: 5000,
        icon: <i className="fa-solid fa-circle-check" style={{ color: '#4caf50', fontSize: '1.2rem' }} />,
        style: {
          borderRadius: '12px',
          background: '#fff',
          color: '#333',
          border: '1px solid #e0e0e0',
          padding: '16px',
          boxShadow: '0 4px 12px rgba(0,0,0,0.1)'
        },
      });

      setContent("");
      setIsAnonymous(false);
      refetch();

    } catch (err) {
      console.error(err);
      toast.error(`No pudimos publicar: ${err.message}`, { id: loadingToast });
    } finally {
      setIsSubmitting(false);
    }
  };

  return (
    <>
      <FeedNavbar 
        apiOk={apiOk} error={error} loading={loading} stats={stats}
        search={search} setSearch={setSearch} 
        activeTab={activeTab} setActiveTab={setActiveTab} setActivePage={setActivePage} 
      />

      <div className="eq-layout">
        <LeftSidebar activePage={activePage} setActivePage={setActivePage} setActiveTab={setActiveTab} />

        <main className="eq-feed">
          <div className="eq-compose">
            <div className="eq-compose-row">
              <div 
                className="eq-user-av" 
                style={{ width: 42, height: 42, borderRadius: 12, cursor: "pointer" }}
                onClick={() => navigate("/profile")}
                title="Ir a mi perfil"
              >
                {userInitials}
              </div>
              
              <input 
                className="eq-compose-input" 
                placeholder="Comparte tu experiencia o testimonio..." 
                value={content}
                onChange={(e) => setContent(e.target.value)}
                disabled={isSubmitting}
              />
            </div>
            <div className="eq-compose-actions">
              
              <button 
                className="eq-compose-act"
                style={{ color: isAnonymous ? "#4caf50" : "inherit" }}
                onClick={() => setIsAnonymous(!isAnonymous)}
                disabled={isSubmitting}
              >
                <i className="fa-solid fa-user-secret" /> {isAnonymous ? "Modo Anónimo Activo" : "Anónimo"}
              </button>

              <button 
                className="eq-compose-act"
                onClick={handlePublish}
                disabled={isSubmitting || !content.trim()}
                style={{ opacity: (!content.trim() || isSubmitting) ? 0.5 : 1, cursor: (!content.trim() || isSubmitting) ? "not-allowed" : "pointer" }}
              >
                {isSubmitting ? (
                  <><i className="fa-solid fa-spinner fa-spin" /> Publicando...</>
                ) : (
                  <><i className="fa-solid fa-paper-plane" /> Publicar</>
                )}
              </button>
            </div>
          </div>

          {loading && [1, 2, 3].map(i => <Skeleton key={i} />)}

          {error && !loading && (
            <div className="eq-empty">
              <div className="eq-empty-icon"><i className="fa-solid fa-tower-broadcast" /></div>
              <div className="eq-empty-title">Sin conexión con la API</div>
              <div className="eq-empty-sub">
                Verifica tu servidor en <code>{API_BASE}</code>. Error: {error}
              </div>
              <button className="eq-retry-btn" onClick={refetch}><i className="fa-solid fa-rotate-right" /> Reintentar</button>
            </div>
          )}

          {!loading && !error && filtered.length === 0 && (
            <div className="eq-empty">
              <div className="eq-empty-icon"><i className="fa-solid fa-magnifying-glass" /></div>
              <div className="eq-empty-title">Sin resultados</div>
            </div>
          )}

          {!loading && !error && filtered.map((p, i) => (
            <PostCard key={`${p.type}-${p.id}`} post={p} delay={i * 0.06} />
          ))}
        </main>

        <RightSidebar stats={stats} loading={loading} refetch={refetch} />
      </div>
    </>
  );
}