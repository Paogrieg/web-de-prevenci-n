@extends('back.main')
@section('content')

<div class="view" id="view-noticias">
      <div class="page-header-row">
        <div class="page-header"><h2><i class="fa-solid fa-newspaper"></i> Noticias</h2><p>Publicaciones y comunicados de la plataforma</p></div>
        <button class="btn-primary">＋ Nueva noticia</button>
      </div>
      <div class="stats-grid">
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-newspaper"></i></div><span class="stat-trend t-nu">=</span></div><div class="stat-value">89</div><div class="stat-label">Total publicadas</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div><span class="stat-trend t-up">↑ 3</span></div><div class="stat-value">72</div><div class="stat-label">Verificadas</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-hourglass-half"></i></div><span class="stat-trend t-nu">5</span></div><div class="stat-value">5</div><div class="stat-label">En revisión</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-circle-xmark"></i></div><span class="stat-trend t-nu">=</span></div><div class="stat-value">12</div><div class="stat-label">Rechazadas</div></div>
     </div>
      <div class="card">
        <div class="card-header"><div><div class="card-title">Todas las Noticias</div></div>
          <select class="form-select" style="width:auto;font-size:12px;padding:6px 28px 6px 10px">
            <option>Todos los estados</option><option>Verificada</option><option>En revisión</option><option>Rechazada</option>
          </select>
        </div>
        <table>
          <thead><tr><th>Título</th><th>Autor</th><th>Estado</th><th>Publicación</th></tr></thead>
          <tbody>
            <tr><td style="font-weight:500">Chihuahua refuerza protocolo de atención a víctimas</td><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#a855d4,#6b2fa0)">AR</div>Ana R.</div></td><td><span class="badge b-apr">Verificada</span></td><td>13 Mar 2026</td></tr>
            <tr><td style="font-weight:500">Nuevos refugios disponibles en el norte del país</td><td><div class="user-row"><div class="u-av">MG</div>María G.</div></td><td><span class="badge b-rev">En revisión</span></td><td>13 Mar 2026</td></tr>
            <tr><td style="font-weight:500">Campaña #NoEstásSola alcanza 2M de personas</td><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#e879a0,#c084e8)">VH</div>Valentina H.</div></td><td><span class="badge b-apr">Verificada</span></td><td>12 Mar 2026</td></tr>
            <tr><td style="font-weight:500">Reforma al Art. 325 del Código Penal aprobada</td><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#059669,#10b981)">LM</div>Laura M.</div></td><td><span class="badge b-apr">Verificada</span></td><td>12 Mar 2026</td></tr>
            <tr><td style="font-weight:500">Taller de autodefensa gratuito en Cd. Juárez</td><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#f0c060,#e87d1e)">SL</div>Sofía L.</div></td><td><span class="badge b-rec">Rechazada</span></td><td>11 Mar 2026</td></tr>
          </tbody>
        </table>
      </div>
    </div>
@endsection