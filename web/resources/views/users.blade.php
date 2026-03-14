@extends('back.main')
@section('contenido')


      <div class="page-header-row">
        <div class="page-header"><h2><i class="fa-solid fa-users"></i> Usuarias</h2><p>Gestión de usuarias registradas en la plataforma</p></div>
        <button class="btn-primary">＋ Nueva usuaria</button>
      </div>
     <div class="stats-grid">
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-users"></i></div><span class="stat-trend t-up">↑ 12%</span></div><div class="stat-value">1,284</div><div class="stat-label">Total registradas</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div><span class="stat-trend t-up">↑ 5%</span></div><div class="stat-value">1,091</div><div class="stat-label">Verificadas</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-user-plus"></i></div><span class="stat-trend t-up">↑ 18%</span></div><div class="stat-value">47</div><div class="stat-label">Nuevas este mes</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-hourglass-half"></i></div><span class="stat-trend t-nu">= 4%</span></div><div class="stat-value">52</div><div class="stat-label">Pendientes verificar</div></div>
    </div>
      <div class="card">
        <div class="card-header"><div><div class="card-title">Listado de Usuarias</div><div class="card-subtitle">1,284 usuarias registradas</div></div>
          <div style="display:flex;gap:8px">
            <select class="form-select" style="width:auto;font-size:12px;padding:6px 28px 6px 10px">
              <option>Todas</option><option>Verificadas</option><option>Sin verificar</option><option>Admins</option>
            </select>
            <button class="btn-outline" style="padding:6px 14px;font-size:12px"><i class="fa-solid fa-download"></i> Exportar</button>
          </div>
        </div>
        <table>
          <thead><tr><th>Usuaria</th><th>Rol</th><th>Teléfono</th><th>Género</th><th>Estado</th><th>Registro</th></tr></thead>
          <tbody>
            <tr><td><div class="user-row"><div class="u-av">MG</div><div><div style="font-weight:500">María García</div><div style="font-size:11px;color:var(--text-secondary)">maria@email.com</div></div></div></td><td>Usuario</td><td>614-123-4567</td><td>Femenino</td><td><span class="badge b-res">Verificada</span></td><td>12 Mar 2026</td></tr>
            <tr><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#a855d4,#6b2fa0)">AR</div><div><div style="font-weight:500">Ana Ramírez</div><div style="font-size:11px;color:var(--text-secondary)">ana.r@email.com</div></div></div></td><td>Moderadora</td><td>614-234-5678</td><td>Femenino</td><td><span class="badge b-res">Verificada</span></td><td>08 Mar 2026</td></tr>
            <tr><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#059669,#10b981)">LM</div><div><div style="font-weight:500">Laura Méndez</div><div style="font-size:11px;color:var(--text-secondary)">laura.m@email.com</div></div></div></td><td>Usuario</td><td>614-345-6789</td><td>Femenino</td><td><span class="badge b-res">Verificada</span></td><td>05 Mar 2026</td></tr>
            <tr><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#f0c060,#e87d1e)">SL</div><div><div style="font-weight:500">Sofía López</div><div style="font-size:11px;color:var(--text-secondary)">sofia.l@email.com</div></div></div></td><td>Usuario</td><td>614-456-7890</td><td>Femenino</td><td><span class="badge b-pen">Sin verificar</span></td><td>01 Mar 2026</td></tr>
            <tr><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#e879a0,#c084e8)">VH</div><div><div style="font-weight:500">Valentina Herrera</div><div style="font-size:11px;color:var(--text-secondary)">val.h@email.com</div></div></div></td><td>Admin</td><td>614-567-8901</td><td>Femenino</td><td><span class="badge b-res">Verificada</span></td><td>22 Feb 2026</td></tr>
            <tr><td><div class="user-row"><div class="u-av" style="background:linear-gradient(135deg,#2563eb,#1a1f71)">CF</div><div><div style="font-weight:500">Carmen Flores</div><div style="font-size:11px;color:var(--text-secondary)">carmen.f@email.com</div></div></div></td><td>Usuario</td><td>614-678-9012</td><td>Femenino</td><td><span class="badge b-pen">Sin verificar</span></td><td>18 Feb 2026</td></tr>
          </tbody>
        </table>
      </div>
    
@endsection