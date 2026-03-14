@extends('back.main')
@section('contenido')

      <div class="page-header-row">
        <div class="page-header"><h2><i class="fa-solid fa-circle-check"></i> Verificaciones</h2><p>Revisión y aprobación de contenido pendiente</p></div>
        <span style="font-size:13px;color:var(--rose-accent);font-weight:600">5 pendientes de revisión</span>
      </div>
      <div class="stats-grid">
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-hourglass-half"></i></div><span class="stat-trend t-dn">5</span></div><div class="stat-value">5</div><div class="stat-label">Pendientes</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div><span class="stat-trend t-up">↑ 12</span></div><div class="stat-value">128</div><div class="stat-label">Aprobadas</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-circle-xmark"></i></div><span class="stat-trend t-nu">=</span></div><div class="stat-value">23</div><div class="stat-label">Rechazadas</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-chart-simple"></i></div><span class="stat-trend t-up">85%</span></div><div class="stat-value">85%</div><div class="stat-label">Tasa aprobación</div></div>
      </div>
      <div class="card">
        <div class="card-header"><div><div class="card-title">Cola de Verificación</div><div class="card-subtitle">Contenido pendiente de moderación</div></div></div>
        <table>
          <thead><tr><th>Contenido</th><th>Tipo</th><th>Enviado por</th><th>Estado</th><th>Fecha</th><th>Acciones</th></tr></thead>
          <tbody>
            <tr>
              <td style="font-weight:500;max-width:200px">Nuevos refugios en Parral disponibles para víctimas</td>
              <td><i class="fa-solid fa-newspaper"></i> Noticia</td>
              <td><div class="user-row"><div class="u-av">MG</div>María G.</div></td>
              <td><span class="badge b-rev">Pendiente</span></td>
              <td>Hoy, 10:30</td>
              <td><div style="display:flex;gap:6px"><button class="btn-outline" style="padding:4px 10px;font-size:11px;color:#059669;border-color:#059669"><i class="fa-solid fa-check"></i> Aprobar</button><button class="btn-outline" style="padding:4px 10px;font-size:11px;color:#dc2626;border-color:#dc2626"><i class="fa-solid fa-xmark"></i> Rechazar</button></div></td>
            </tr>
            <tr>
              <td style="font-weight:500;max-width:200px">Testimonio sobre acoso laboral</td>
              <td><i class="fa-solid fa-book-open"></i> Testimonio</td>
              <td><span class="badge b-anon">Anónima</span></td>
              <td><span class="badge b-rev">Pendiente</span></td>
              <td>Hoy, 09:15</td>
              <td><div style="display:flex;gap:6px"><button class="btn-outline" style="padding:4px 10px;font-size:11px;color:#059669;border-color:#059669"><i class="fa-solid fa-check"></i> Aprobar</button><button class="btn-outline" style="padding:4px 10px;font-size:11px;color:#dc2626;border-color:#dc2626"><i class="fa-solid fa-xmark"></i> Rechazar</button></div></td>
            </tr>
            <tr>
              <td style="font-weight:500;max-width:200px">Reforma al reglamento municipal de Delicias</td>
              <td><i class="fa-solid fa-scale-balanced"></i> Ley</td>
              <td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#a855d4,#6b2fa0)">AR</div>Ana R.</div></td>
              <td><span class="badge b-rev">Pendiente</span></td>
              <td>Ayer, 17:40</td>
              <td><div style="display:flex;gap:6px"><button class="btn-outline" style="padding:4px 10px;font-size:11px;color:#059669;border-color:#059669"><i class="fa-solid fa-check"></i> Aprobar</button><button class="btn-outline" style="padding:4px 10px;font-size:11px;color:#dc2626;border-color:#dc2626"><i class="fa-solid fa-xmark"></i> Rechazar</button></div></td>
            </tr>
          </tbody>
        </table>
      </div>

@endsection