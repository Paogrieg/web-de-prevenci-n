@extends('back.main')
@section('content')

<div class="view" id="view-denuncias">
      <div class="page-header-row">
        <div class="page-header"><h2><i class="fa-solid fa-triangle-exclamation"></i> Denuncias</h2><p>Gestión y seguimiento de reportes de violencia</p></div>
        <button class="btn-primary">＋ Nueva denuncia</button>
      </div>
      <div class="stats-grid">
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-triangle-exclamation"></i></div><span class="stat-trend t-dn">↑ 8%</span></div><div class="stat-value">342</div><div class="stat-label">Denuncias activas</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-hourglass-half"></i></div><span class="stat-trend t-nu">12</span></div><div class="stat-value">12</div><div class="stat-label">Sin revisar</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-magnifying-glass"></i></div><span class="stat-trend t-nu">=</span></div><div class="stat-value">89</div><div class="stat-label">En revisión</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div><span class="stat-trend t-up">↑ 23%</span></div><div class="stat-value">218</div><div class="stat-label">Resueltas</div></div>
      </div>
      <div class="card">
        <div class="card-header"><div><div class="card-title">Todas las Denuncias</div><div class="card-subtitle">342 denuncias en total</div></div>
          <div style="display:flex;gap:8px">
            <select class="form-select" style="width:auto;font-size:12px;padding:6px 28px 6px 10px">
              <option>Todos los estados</option><option>Pendiente</option><option>En revisión</option><option>Resuelto</option>
            </select>
            <select class="form-select" style="width:auto;font-size:12px;padding:6px 28px 6px 10px">
              <option>Todos los tipos</option><option>Física</option><option>Psicológica</option><option>Sexual</option><option>Económica</option><option>Digital</option>
            </select>
          </div>
        </div>
        <table>
          <thead><tr><th>#</th><th>Usuaria</th><th>Tipo de Violencia</th><th>Estado</th><th>Ubicación</th><th>Fecha</th></tr></thead>
          <tbody>
            <tr><td style="color:var(--text-secondary)">#DEN-001</td><td><div class="user-row"><div class="u-av">MG</div>María G.</div></td><td>🤜 Física</td><td><span class="badge b-pen">Pendiente</span></td><td>Chihuahua, Chih.</td><td>Hoy, 09:14</td></tr>
            <tr><td style="color:var(--text-secondary)">#DEN-002</td><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#a855d4,#6b2fa0)">AR</div>Ana R.</div></td><td>🧠 Psicológica</td><td><span class="badge b-rev">En Revisión</span></td><td>Cd. Juárez, Chih.</td><td>Hoy, 08:52</td></tr>
            <tr><td style="color:var(--text-secondary)">#DEN-003</td><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#059669,#10b981)">LM</div>Laura M.</div></td><td>🚫 Sexual</td><td><span class="badge b-res">Resuelto</span></td><td>Delicias, Chih.</td><td>Ayer, 21:30</td></tr>
            <tr><td style="color:var(--text-secondary)">#DEN-004</td><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#f0c060,#e87d1e)">SL</div>Sofía L.</div></td><td>💰 Económica</td><td><span class="badge b-pen">Pendiente</span></td><td>Hidalgo del Parral</td><td>Ayer, 18:05</td></tr>
            <tr><td style="color:var(--text-secondary)">#DEN-005</td><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#e879a0,#c084e8)">VH</div>Valentina H.</div></td><td>📱 Digital</td><td><span class="badge b-rev">En Revisión</span></td><td>Chihuahua, Chih.</td><td>Ayer, 14:22</td></tr>
            <tr><td style="color:var(--text-secondary)">#DEN-006</td><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#2563eb,#1a1f71)">CF</div>Carmen F.</div></td><td>🤜 Física</td><td><span class="badge b-res">Resuelto</span></td><td>Cuauhtémoc, Chih.</td><td>13 Mar, 10:00</td></tr>
          </tbody>
        </table>
      </div>
    </div>

@endsection