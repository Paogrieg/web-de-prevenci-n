<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon"><img src="{{ asset('img/logo.png') }}" alt="Logo"></div>
    <h1>Equoria</h1>
  </div>

  <nav class="sidebar-nav">
    <span class="nav-section-label">Principal</span>
    <a href="/" class="nav-item" data-page="inicio">
      <span class="nav-icon"><i class="fa-solid fa-house"></i></span> Inicio
    </a>
    <a href="/users" class="nav-item" data-page="usuarias">
      <span class="nav-icon"><i class="fa-solid fa-user"></i></span> Usuarias
    </a>
    <a href="/denuncias" class="nav-item" data-page="denuncias">
      <span class="nav-icon"><i class="fa-solid fa-file-lines"></i></span> Denuncias <span class="nav-badge">12</span>
    </a>
    <a href="/testimonios" class="nav-item" data-page="testimonios">
      <span class="nav-icon"><i class="fa-solid fa-comment"></i></span> Testimonios
    </a>
    <a href="/noticias" class="nav-item" data-page="noticias">
      <span class="nav-icon"><i class="fa-solid fa-newspaper"></i></span> Noticias
    </a>

    <span class="nav-section-label" style="margin-top:8px">Recursos</span>
    <a href="/leyes" class="nav-item" data-page="leyes">
      <span class="nav-icon"><i class="fa-solid fa-book"></i></span> Leyes
    </a>
    <a href="/emergencia" class="nav-item" data-page="contactos">
      <span class="nav-icon"><i class="fa-solid fa-phone"></i></span> Contactos Emergencia
    </a>
    <a href="/verificaciones" class="nav-item" data-page="verificaciones">
      <span class="nav-icon"><i class="fa-solid fa-circle-check"></i></span> Verificaciones <span class="nav-badge">5</span>
    </a>
    <a href="/pagos" class="nav-item" data-page="pagos">
      <span class="nav-icon"><i class="fa-solid fa-credit-card"></i></span> Pagos
    </a>

    <span class="nav-section-label" style="margin-top:8px">Sistema</span>
    <a href="/configuracion" class="nav-item" data-page="configuracion">
      <span class="nav-icon"><i class="fa-solid fa-gear"></i></span> Configuración
    </a>
  </nav>

  <div class="sidebar-emergency">
    <p><i class="fa-solid fa-circle-info"></i> Línea de Crisis</p>
    <button class="emergency-btn"><i class="fa-solid fa-phone-volume"></i> 800-900-1000</button>
  </div>
    <div style="margin:16px">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" style="width:100%;padding:12px;background:rgba(232,121,160,0.15);color:var(--rose-accent);border:1px solid rgba(232,121,160,0.3);border-radius:10px;cursor:pointer;font-family:'DM Sans',sans-serif;font-size:14px;font-weight:600;display:flex;align-items:center;justify-content:center;gap:8px">
        <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
      </button>
    </form>
  </div>
</aside>