@extends('back.main')
@section('contenido')

<div class="page-header-row">
  <div class="page-header"><h2><i class="fa-solid fa-triangle-exclamation"></i> Denuncias</h2><p>Gestión y seguimiento de reportes de violencia</p></div>
  <button class="btn-primary" onclick="document.getElementById('modal-crear').style.display='flex'">＋ Nueva denuncia</button>
</div>

@if(session('success'))
  <div style="background:#d1fae5;border:1px solid #10b981;color:#065f46;border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
  </div>
@endif

<div class="stats-grid">
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-triangle-exclamation"></i></div></div><div class="stat-value">{{ $complaints->count() }}</div><div class="stat-label">Total denuncias</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-hourglass-half"></i></div></div><div class="stat-value">{{ $complaints->where('status','pendiente')->count() }}</div><div class="stat-label">Sin revisar</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-magnifying-glass"></i></div></div><div class="stat-value">{{ $complaints->where('status','revision')->count() }}</div><div class="stat-label">En revisión</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div></div><div class="stat-value">{{ $complaints->where('status','resuelto')->count() }}</div><div class="stat-label">Resueltas</div></div>
</div>

<div class="card">
  <div class="card-header"><div><div class="card-title">Todas las Denuncias</div><div class="card-subtitle">{{ $complaints->count() }} denuncias en total</div></div></div>
  <table>
    <thead><tr><th>#</th><th>Usuaria</th><th>Tipo</th><th>Estado</th><th>Fecha</th><th>Acciones</th></tr></thead>
    <tbody>
      @forelse($complaints as $complaint)
      <tr>
        <td style="color:var(--text-secondary)">#DEN-{{ str_pad($complaint->id,3,'0',STR_PAD_LEFT) }}</td>
        <td>
          <div class="user-row">
            <div class="u-av">{{ strtoupper(substr($complaint->user->name ?? 'U',0,1)) }}</div>
            {{ $complaint->user->name ?? 'Desconocida' }}
          </div>
        </td>
        <td>{{ $complaint->type }}</td>
        <td>
          @if($complaint->status=='pendiente') <span class="badge b-pen">Pendiente</span>
          @elseif($complaint->status=='revision') <span class="badge b-rev">En Revisión</span>
          @else <span class="badge b-res">Resuelto</span>
          @endif
        </td>
        <td>{{ \Carbon\Carbon::parse($complaint->date)->format('d M Y') }}</td>
        <td>
          <div style="display:flex;gap:6px">
            <button class="btn-outline" style="padding:4px 10px;font-size:12px"
              onclick="abrirEditar({{ $complaint->id }},'{{ addslashes($complaint->title) }}','{{ addslashes($complaint->description) }}','{{ $complaint->type }}','{{ $complaint->status }}','{{ $complaint->date }}')">
              <i class="fa-solid fa-pen"></i>
            </button>
            <form method="POST" action="/denuncias/{{ $complaint->id }}" onsubmit="return confirm('¿Eliminar esta denuncia?')">
              @csrf @method('DELETE')
              <button type="submit" style="padding:4px 10px;font-size:12px;background:var(--rose-light);color:var(--rose-accent);border:1px solid var(--rose-accent);border-radius:8px;cursor:pointer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="6" style="text-align:center;color:var(--text-secondary)">No hay denuncias registradas</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- MODAL CREAR --}}
<div id="modal-crear" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg);max-height:90vh;overflow-y:auto">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Nueva Denuncia</h3>
      <button onclick="document.getElementById('modal-crear').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" action="/denuncias">
      @csrf
      <div class="login-form-group"><label>Título</label><div class="login-input-wrap"><i class="fa-solid fa-file-lines"></i><input type="text" name="title" required></div></div>
      <div class="login-form-group"><label>Tipo de violencia</label>
        <div class="login-input-wrap"><i class="fa-solid fa-tag"></i>
          <select name="type" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="">Selecciona...</option>
            <option value="Física">Física</option>
            <option value="Psicológica">Psicológica</option>
            <option value="Sexual">Sexual</option>
            <option value="Económica">Económica</option>
            <option value="Digital">Digital</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Estado</label>
        <div class="login-input-wrap"><i class="fa-solid fa-circle-half-stroke"></i>
          <select name="status" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="pendiente">Pendiente</option>
            <option value="revision">En revisión</option>
            <option value="resuelto">Resuelto</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Fecha</label><div class="login-input-wrap"><i class="fa-solid fa-calendar"></i><input type="date" name="date" required></div></div>
      <div class="login-form-group"><label>Latitud</label><div class="login-input-wrap"><i class="fa-solid fa-map-pin"></i><input type="number" step="any" name="lat" required placeholder="Ej: 28.6353"></div></div>
      <div class="login-form-group"><label>Longitud</label><div class="login-input-wrap"><i class="fa-solid fa-map-pin"></i><input type="number" step="any" name="lng" required placeholder="Ej: -106.0889"></div></div>
      <div class="login-form-group"><label>Descripción</label>
        <textarea name="description" required rows="3" style="width:100%;padding:12px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;resize:vertical;outline:none"></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-crear').style.display='none'" class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Guardar</button>
      </div>
    </form>
  </div>
</div>

{{-- MODAL EDITAR --}}
<div id="modal-editar" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg);max-height:90vh;overflow-y:auto">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Editar Denuncia</h3>
      <button onclick="document.getElementById('modal-editar').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" id="form-editar">
      @csrf @method('PUT')
      <div class="login-form-group"><label>Título</label><div class="login-input-wrap"><i class="fa-solid fa-file-lines"></i><input type="text" name="title" id="edit-title" required></div></div>
      <div class="login-form-group"><label>Tipo de violencia</label>
        <div class="login-input-wrap"><i class="fa-solid fa-tag"></i>
          <select name="type" id="edit-type" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="Física">Física</option>
            <option value="Psicológica">Psicológica</option>
            <option value="Sexual">Sexual</option>
            <option value="Económica">Económica</option>
            <option value="Digital">Digital</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Estado</label>
        <div class="login-input-wrap"><i class="fa-solid fa-circle-half-stroke"></i>
          <select name="status" id="edit-status" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="pendiente">Pendiente</option>
            <option value="revision">En revisión</option>
            <option value="resuelto">Resuelto</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Fecha</label><div class="login-input-wrap"><i class="fa-solid fa-calendar"></i><input type="date" name="date" id="edit-date" required></div></div>
      <div class="login-form-group"><label>Descripción</label>
        <textarea name="description" id="edit-description" required rows="3" style="width:100%;padding:12px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;resize:vertical;outline:none"></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-editar').style.display='none'" class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Actualizar</button>
      </div>
    </form>
  </div>
</div>

<script>
function abrirEditar(id, title, description, type, status, date) {
  document.getElementById('form-editar').action = '/denuncias/' + id;
  document.getElementById('edit-title').value = title;
  document.getElementById('edit-description').value = description;
  document.getElementById('edit-type').value = type;
  document.getElementById('edit-status').value = status;
  document.getElementById('edit-date').value = date;
  document.getElementById('modal-editar').style.display = 'flex';
}
</script>

@endsection