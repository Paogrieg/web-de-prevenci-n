@extends('back.main')
@section('contenido')

      <div class="page-header-row">
        <div class="page-header"><h2><i class="fa-solid fa-comment"></i> Testimonios</h2><p>Relatos y experiencias compartidas por las usuarias</p></div>
        <button class="btn-primary">＋ Nuevo testimonio</button>
      </div>
     <div class="stats-grid">
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-book-open"></i></div><span class="stat-trend t-up">↑ 9%</span></div><div class="stat-value">156</div><div class="stat-label">Total testimonios</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div><span class="stat-trend t-up">↑ 11%</span></div><div class="stat-value">124</div><div class="stat-label">Aprobados</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-hourglass-half"></i></div><span class="stat-trend t-nu">=</span></div><div class="stat-value">24</div><div class="stat-label">En moderación</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-user-secret"></i></div><span class="stat-trend t-nu">=</span></div><div class="stat-value">98</div><div class="stat-label">Anónimos</div></div>
     </div>

      <div class="testimony-card">
        <p class="testimony-content">"Después de años sufriendo violencia psicológica, encontré en esta plataforma el apoyo que necesitaba. El equipo de psicólogas me ayudó a entender que no era mi culpa y a dar los pasos legales necesarios. Hoy vivo una vida libre de miedo."</p>
        <div class="testimony-footer">
          <div class="testimony-author"><div class="u-av">AN</div><div><div style="font-size:13px;font-weight:600">Anónima</div><div style="font-size:11px;color:var(--text-secondary)">Chihuahua · 10 Mar 2026</div></div></div>
          <div style="display:flex;gap:8px"><span class="badge b-apr">Aprobado</span><span class="badge b-anon">Anónimo</span></div>
        </div>
      </div>

      <div class="testimony-card">
        <p class="testimony-content">"Gracias a la red de apoyo de Equoria pude salir de una situación de violencia económica. Me orientaron sobre mis derechos y me conectaron con una abogada que llevó mi caso. No están solas, hay personas que nos escuchan y apoyan."</p>
        <div class="testimony-footer">
          <div class="testimony-author"><div class="u-av" style="background:linear-gradient(135deg,#059669,#10b981)">LM</div><div><div style="font-size:13px;font-weight:600">Laura M.</div><div style="font-size:11px;color:var(--text-secondary)">Cd. Juárez · 8 Mar 2026</div></div></div>
          <div style="display:flex;gap:8px"><span class="badge b-apr">Aprobado</span></div>
        </div>
      </div>

      <div class="testimony-card">
        <p class="testimony-content">"Reporté el acoso digital que sufrí a través de la plataforma y en menos de 48 horas ya tenía orientación legal. El proceso fue muy sencillo y me sentí escuchada en todo momento. Esta plataforma hace una diferencia real."</p>
        <div class="testimony-footer">
          <div class="testimony-author"><div class="u-av" style="background:linear-gradient(135deg,#e879a0,#c084e8)">VH</div><div><div style="font-size:13px;font-weight:600">Valentina H.</div><div style="font-size:11px;color:var(--text-secondary)">Chihuahua · 5 Mar 2026</div></div></div>
          <div style="display:flex;gap:8px"><span class="badge b-rev">En moderación</span></div>
        </div>
      </div>
  
@endsection