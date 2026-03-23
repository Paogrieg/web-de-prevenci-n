@extends('back.main')
@section('contenido')

<div class="page-header-row">
  <div class="page-header"><h2><i class="fa-solid fa-circle-check"></i> Verificaciones</h2><p>Revisión y aprobación de contenido pendiente</p></div>
  <button class="btn-primary" onclick="document.getElementById('modal-crear').style.display='flex'">＋ Nueva verificación</button>
</div>

@if(session('success'))
  <div style="background:#d1fae5;border:1px solid #10b981;color:#065f46;border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
  </div>
@endif

<div class="stats-grid">
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-hourglass-half"></i></div></div><div class="stat-value">{{ $verifications->where('state','pendiente')->count() }}</div><div class="stat-label">Pendientes</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div></div><div class="stat-value">{{ $verifications->where('state','aprobada')->count() }}</div><div class="stat-label">Aprobadas</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-circle-xmark"></i></div></div><div class="stat-value">{{ $verifications->where('state','rechazada')->count() }}</div><div class="stat-label">Rechazadas</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-chart-simple"></i></div></div><div class="stat-value">{{ $verifications->count() > 0 ? round(($verifications->where('state','aprobada')->count() / $verifications->count()) * 100) : 0 }}%</div><div class="stat-label">Tasa aprobación</div></div>
</div>

<div class="card">
  <div class="card-header"><div><div class="card-title">Cola de Verificación</div></div></div>
  <table>
    <thead><tr><th>#</th><th>Noticia ID</th><th>Estado</th><th>Fecha verificación</th><th>Acciones</th></tr></thead>
    <tbody>
      @forelse($verifications as $verification)
      <tr>
        <td style="color:var(--text-secondary)">#{{ $verification->id }}</td>
        <td>#{{ $verification->new_id }}</td>
        <td>
          @if($verification->state=='pendiente') <span class="badge b-pen">Pendiente</span>
          @elseif($verification->state=='aprobada') <span class="badge b-apr">Aprobada</span>
          @else <span class="badge b-rec">Rechazada</span>
          @endif
        </td>
        <td>{{ \Carbon\Carbon::parse($verification->date_verification)->format('d M Y') }}</td>
        <td>
          <div style="display:flex;gap:6px">
            <button class="btn-outline" style="padding:4px 10px;font-size:12px"
              onclick="abrirEditar({{ $verification->id }},'{{ $verification->state }}','{{ $verification->date_verification }}')">
              <i class="fa-solid fa-pen"></i>
            </button>
            <form method="POST" action="/verificaciones/{{ $verification->id }}" onsubmit="return confirm('¿Eliminar esta verificación?')">
              @csrf @method('DELETE')
              <button type="submit" style="padding:4px 10px;font-size:12px;background:var(--rose-light);color:var(--rose-accent);border:1px solid var(--rose-accent);border-radius:8px;cursor:pointer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="5" style="text-align:center;color:var(--text-secondary)">No hay verificaciones registradas</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- MODAL CREAR --}}
<div id="modal-crear" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg)">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Nueva Verificación</h3>
      <button onclick="document.getElementById('modal-crear').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" action="/verificaciones">
      @csrf
      <div class="login-form-group"><label>ID de Noticia</label><div class="login-input-wrap"><i class="fa-solid fa-newspaper"></i><input type="number" name="new_id" required placeholder="ID de la noticia"></div></div>
      <div class="login-form-group"><label>Estado</label>
        <div class="login-input-wrap"><i class="fa-solid fa-circle-half-stroke"></i>
          <select name="state" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="pendiente">Pendiente</option>
            <option value="aprobada">Aprobada</option>
            <option value="rechazada">Rechazada</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Fecha de verificación</label><div class="login-input-wrap"><i class="fa-solid fa-calendar"></i><input type="date" name="date_verification" required></div></div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-crear').style.display='none'" class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Guardar</button>
      </div>
    </form>
  </div>
</div>

{{-- MODAL EDITAR --}}
<div id="modal-editar" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg)">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Editar Verificación</h3>
      <button onclick="document.getElementById('modal-editar').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" id="form-editar">
      @csrf @method('PUT')
      <div class="login-form-group"><label>Estado</label>
        <div class="login-input-wrap"><i class="fa-solid fa-circle-half-stroke"></i>
          <select name="state" id="edit-state" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="pendiente">Pendiente</option>
            <option value="aprobada">Aprobada</option>
            <option value="rechazada">Rechazada</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Fecha de verificación</label><div class="login-input-wrap"><i class="fa-solid fa-calendar"></i><input type="date" name="date_verification" id="edit-date" required></div></div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-editar').style.display='none'" class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Actualizar</button>
      </div>
    </form>
  </div>
</div>

<script>
function abrirEditar(id, state, date) {
  document.getElementById('form-editar').action = '/verificaciones/' + id;
  document.getElementById('edit-state').value = state;
  document.getElementById('edit-date').value = date;
  document.getElementById('modal-editar').style.display = 'flex';
}
</script>

@endsection