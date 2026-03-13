@extends('back.main')
@section('content')
     <div class="view" id="view-inicio">

      <!-- Carousel -->
      

      <!-- Stats -->
      <div class="stats-grid">
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-users"></i></div><span class="stat-trend t-up">↑ 12%</span></div><div class="stat-value">1,284</div><div class="stat-label">Usuarias registradas</div><div class="stat-sub">+47 este mes</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-file-lines"></i></div><span class="stat-trend t-dn">↑ 8%</span></div><div class="stat-value">342</div><div class="stat-label">Denuncias activas</div><div class="stat-sub">12 sin revisar</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-newspaper"></i></div><span class="stat-trend t-nu">= Estable</span></div><div class="stat-value">89</div><div class="stat-label">Noticias publicadas</div><div class="stat-sub">5 en revisión</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div><span class="stat-trend t-up">↑ 23%</span></div><div class="stat-value">218</div><div class="stat-label">Casos resueltos</div><div class="stat-sub">Este mes: 38</div></div>
      </div>

      <!-- Denuncias + Tipos -->
      <div class="two-col">
        <div class="card">
          <div class="card-header"><div><div class="card-title">Denuncias Recientes</div><div class="card-subtitle">Últimas 24 horas</div></div><button class="card-action" onclick="navigate('denuncias')">Ver todas →</button></div>
          <table><thead><tr><th>Usuaria</th><th>Tipo</th><th>Estado</th><th>Fecha</th></tr></thead>
          <tbody>
            <tr><td><div class="user-row"><div class="u-av">MG</div>María G.</div></td><td>Física</td><td><span class="badge b-pen">Pendiente</span></td><td>Hoy, 09:14</td></tr>
            <tr><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#a855d4,#6b2fa0)">AR</div>Ana R.</div></td><td>Psicológica</td><td><span class="badge b-rev">En Revisión</span></td><td>Hoy, 08:52</td></tr>
            <tr><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#059669,#10b981)">LM</div>Laura M.</div></td><td>Sexual</td><td><span class="badge b-res">Resuelto</span></td><td>Ayer, 21:30</td></tr>
            <tr><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#f0c060,#e87d1e)">SL</div>Sofía L.</div></td><td>Económica</td><td><span class="badge b-pen">Pendiente</span></td><td>Ayer, 18:05</td></tr>
            <tr><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#e879a0,#c084e8)">VH</div>Valentina H.</div></td><td>Digital</td><td><span class="badge b-rev">En Revisión</span></td><td>Ayer, 14:22</td></tr>
          </tbody></table>
        </div>
        <div class="card">
          <div class="card-header"><div><div class="card-title">Tipos de Violencia</div><div class="card-subtitle">Distribución este mes</div></div></div>
          <div class="vtype-list">
            <div><div class="vt-hdr"><span class="vt-name"><i class="fa-solid fa-hand-fist"></i> Física</span><span class="vt-count">98 casos</span></div><div class="vt-bg"><div class="vt-bar" style="width:72%;background:linear-gradient(90deg,#6b2fa0,#a855d4)"></div></div></div>
            <div><div class="vt-hdr"><span class="vt-name"><i class="fa-solid fa-brain"></i> Psicológica</span><span class="vt-count">134 casos</span></div><div class="vt-bg"><div class="vt-bar" style="width:100%;background:linear-gradient(90deg,#e879a0,#c084e8)"></div></div></div>
            <div><div class="vt-hdr"><span class="vt-name"><i class="fa-solid fa-triangle-exclamation"></i> Sexual</span><span class="vt-count">67 casos</span></div><div class="vt-bg"><div class="vt-bar" style="width:50%;background:linear-gradient(90deg,#4a1e87,#8b3fbf)"></div></div></div>
            <div><div class="vt-hdr"><span class="vt-name"><i class="fa-solid fa-money-bill"></i> Económica</span><span class="vt-count">43 casos</span></div><div class="vt-bg"><div class="vt-bar" style="width:32%;background:linear-gradient(90deg,#f0c060,#e8a020)"></div></div></div>
            <div><div class="vt-hdr"><span class="vt-name"><i class="fa-solid fa-mobile-screen"></i> Digital / Ciberacoso</span><span class="vt-count">29 casos</span></div><div class="vt-bg"><div class="vt-bar" style="width:22%;background:linear-gradient(90deg,#2d1254,#6b2fa0)"></div></div></div>
          </div>
        </div>
      </div>

      <!-- Actividad / Noticias / Leyes -->
      <div class="three-col">
        <div class="card">
          <div class="card-header"><div><div class="card-title">Actividad Reciente</div><div class="card-subtitle">Últimas acciones</div></div></div>
          <div class="act-list">
            <div class="act-item"><div class="act-dc"><div class="act-dot" style="background:#e879a0"></div><div class="act-line"></div></div><div><div class="act-text">Nueva denuncia por <strong>violencia física</strong></div><div class="act-time">Hace 3 min</div></div></div>
            <div class="act-item"><div class="act-dc"><div class="act-dot" style="background:#a855d4"></div><div class="act-line"></div></div><div><div class="act-text">Testimonio anónimo <strong>aprobado</strong></div><div class="act-time">Hace 18 min</div></div></div>
            <div class="act-item"><div class="act-dc"><div class="act-dot" style="background:#10b981"></div><div class="act-line"></div></div><div><div class="act-text">Noticia verificada: <strong>Nueva ley Chihuahua</strong></div><div class="act-time">Hace 45 min</div></div></div>
            <div class="act-item"><div class="act-dc"><div class="act-dot" style="background:#f0c060"></div><div class="act-line"></div></div><div><div class="act-text">Contacto de emergencia <strong>registrado</strong></div><div class="act-time">Hace 1 hora</div></div></div>
            <div class="act-item"><div class="act-dc"><div class="act-dot" style="background:#6b2fa0"></div><div class="act-line"></div></div><div><div class="act-text">Usuaria <strong>verificó</strong> su cuenta</div><div class="act-time">Hace 2 horas</div></div></div>
          </div>
        </div>
        <div class="card">
          <div class="card-header"><div><div class="card-title">Últimas Noticias</div></div><button class="card-action" onclick="navigate('noticias')">Ver más</button></div>
          <div>
            <div class="noticia-item"><div class="n-img" style="background:#f3e8ff"><i class="fa-solid fa-newspaper"></i></div><div><div class="n-title">Chihuahua refuerza protocolo de atención</div><div class="n-meta">✅ Verificada · Hace 2h</div></div></div>
            <div class="noticia-item"><div class="n-img" style="background:#fce4ef"><i class="fa-solid fa-landmark"></i></div><div><div class="n-title">Nuevos refugios en el norte del país</div><div class="n-meta">⏳ En revisión · Hace 5h</div></div></div>
            <div class="noticia-item"><div class="n-img" style="background:#fff8e6"><i class="fa-solid fa-bullhorn"></i></div><div><div class="n-title">Campaña #NoEstásSola alcanza 2M</div><div class="n-meta">✅ Verificada · Hace 8h</div></div></div>
            <div class="noticia-item"><div class="n-img" style="background:#e8f9f5"><i class="fa-solid fa-scale-balanced"></i></div><div><div class="n-title">Reforma al Art. 325 del Código Penal</div><div class="n-meta">✅ Verificada · Hace 1d</div></div></div>
          </div>
        </div>
        <div class="card">
          <div class="card-header"><div><div class="card-title">Marco Legal</div><div class="card-subtitle">Leyes vigentes</div></div><button class="card-action" onclick="navigate('leyes')">Ver más</button></div>
          <div>
            <div class="ley-item"><div class="ley-title">Ley General de Acceso a una Vida Libre de Violencia</div><span class="ley-region">🇲🇽 Federal</span></div>
            <div class="ley-item"><div class="ley-title">Ley de Acceso de las Mujeres — Chihuahua</div><span class="ley-region">Chihuahua</span></div>
            <div class="ley-item"><div class="ley-title">NOM-046 Violencia Familiar, Sexual y Género</div><span class="ley-region">🇲🇽 Federal</span></div>
            <div class="ley-item"><div class="ley-title">Protocolo de Actuación para Feminicidio</div><span class="ley-region">🇲🇽 Federal</span></div>
          </div>
        </div>
      </div>

    </div><!-- /view-inicio -->

@endsection