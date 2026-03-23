@extends('back.main')
@section('contenido')

<div class="page-header-row">
  <div class="page-header"><h2><i class="fa-solid fa-scale-balanced"></i> Marco Legal</h2><p>Leyes y normativas de protección vigentes</p></div>
  <button class="btn-primary" onclick="document.getElementById('modal-crear').style.display='flex'">＋ Agregar ley</button>
</div>

@if(session('success'))
  <div style="background:#d1fae5;border:1px solid #10b981;color:#065f46;border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
  </div>
@endif

@if($errors->any())
  <div style="background:var(--rose-light);border:1px solid var(--rose-accent);color:var(--plum-800);border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px">
    <i class="fa-solid fa-circle-exclamation"></i>
    <ul style="margin:8px 0 0 16px">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="card">
  <div class="card-header"><div><div class="card-title">Leyes Vigentes</div><div class="card-subtitle">Marco legal de protección</div></div></div>
  <table>
    <thead><tr><th>Título</th><th>Región</th><th>Descripción</th><th>Fuente</th><th>Acciones</th></tr></thead>
    <tbody>
      @forelse($laws as $law)
      <tr>
        <td style="font-weight:500">{{ $law->title }}</td>
        <td><span class="ley-region">{{ $law->state }}</span></td>
        <td style="font-size:13px;color:var(--text-secondary)">{{ Str::limit($law->description, 80) }}</td>
        <td>
          @if($law->url)
            <a href="{{ $law->url }}" target="_blank" style="color:var(--plum-500);font-size:12px">Ver fuente →</a>
          @else
            <span style="font-size:12px;color:var(--text-secondary)">Sin fuente</span>
          @endif
        </td>
        <td>
          <div style="display:flex;gap:6px">
            <button class="btn-outline" style="padding:4px 10px;font-size:12px"
              onclick="abrirEditar({{ $law->id }}, '{{ addslashes($law->title) }}', '{{ addslashes($law->description) }}', '{{ addslashes($law->state) }}', '{{ addslashes($law->url) }}')">
              <i class="fa-solid fa-pen"></i>
            </button>
            <form method="POST" action="/leyes/{{ $law->id }}" onsubmit="return confirm('¿Eliminar esta ley?')">
              @csrf
              @method('DELETE')
              <button type="submit" style="padding:4px 10px;font-size:12px;background:var(--rose-light);color:var(--rose-accent);border:1px solid var(--rose-accent);border-radius:8px;cursor:pointer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="5" style="text-align:center;color:var(--text-secondary)">No hay leyes registradas</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- MODAL CREAR --}}
<div id="modal-crear" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg);max-height:90vh;overflow-y:auto">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Agregar Ley</h3>
      <button onclick="document.getElementById('modal-crear').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" action="/leyes">
      @csrf
      <div class="login-form-group">
        <label>Título</label>
        <div class="login-input-wrap"><i class="fa-solid fa-scale-balanced"></i>
          <input type="text" name="title" required value="{{ old('title') }}">
        </div>
      </div>
      <div class="login-form-group">
        <label>Región / Estado</label>
        <div class="login-input-wrap"><i class="fa-solid fa-map-pin"></i>
          <input type="text" name="state" required placeholder="Ej: Federal, Chihuahua" value="{{ old('state') }}">
        </div>
      </div>
      <div class="login-form-group">
        <label>URL / Fuente <span style="color:var(--text-secondary);font-weight:400">(opcional)</span></label>
        <div class="login-input-wrap"><i class="fa-solid fa-link"></i>
          <input type="url" name="url" placeholder="https://..." value="{{ old('url') }}">
        </div>
      </div>
      <div class="login-form-group">
        <label>Descripción</label>
        <textarea name="description" required rows="3"
          style="width:100%;padding:12px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;resize:vertical;outline:none">{{ old('description') }}</textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-crear').style.display='none'"
          class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Guardar</button>
      </div>
    </form>
  </div>
</div>

{{-- MODAL EDITAR --}}
<div id="modal-editar" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg);max-height:90vh;overflow-y:auto">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Editar Ley</h3>
      <button onclick="document.getElementById('modal-editar').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" id="form-editar">
      @csrf
      @method('PUT')
      <div class="login-form-group">
        <label>Título</label>
        <div class="login-input-wrap"><i class="fa-solid fa-scale-balanced"></i>
          <input type="text" name="title" id="edit-title" required>
        </div>
      </div>
      <div class="login-form-group">
        <label>Región / Estado</label>
        <div class="login-input-wrap"><i class="fa-solid fa-map-pin"></i>
          <input type="text" name="state" id="edit-state" required>
        </div>
      </div>
      <div class="login-form-group">
        <label>URL / Fuente <span style="color:var(--text-secondary);font-weight:400">(opcional)</span></label>
        <div class="login-input-wrap"><i class="fa-solid fa-link"></i>
          <input type="url" name="url" id="edit-url" placeholder="https://...">
        </div>
      </div>
      <div class="login-form-group">
        <label>Descripción</label>
        <textarea name="description" id="edit-description" required rows="3"
          style="width:100%;padding:12px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;resize:vertical;outline:none"></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-editar').style.display='none'"
          class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Actualizar</button>
      </div>
    </form>
  </div>
</div>

<script>
function abrirEditar(id, title, description, state, url) {
  document.getElementById('form-editar').action = '/leyes/' + id;
  document.getElementById('edit-title').value = title;
  document.getElementById('edit-description').value = description;
  document.getElementById('edit-state').value = state;
  document.getElementById('edit-url').value = url;
  document.getElementById('modal-editar').style.display = 'flex';
}
</script>

@endsection