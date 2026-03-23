@extends('back.main')
@section('contenido')

<div class="page-header-row">
  <div class="page-header"><h2><i class="fa-solid fa-comment"></i> Testimonios</h2><p>Relatos y experiencias compartidas por las usuarias</p></div>
  <button class="btn-primary" onclick="document.getElementById('modal-crear').style.display='flex'">＋ Nuevo testimonio</button>
</div>

@if(session('success'))
  <div style="background:#d1fae5;border:1px solid #10b981;color:#065f46;border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
  </div>
@endif

<div class="stats-grid">
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-book-open"></i></div></div><div class="stat-value">{{ $testimonials->count() }}</div><div class="stat-label">Total testimonios</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-user-secret"></i></div></div><div class="stat-value">{{ $testimonials->where('anonymous',1)->count() }}</div><div class="stat-label">Anónimos</div></div>
</div>

<div class="card">
  <div class="card-header"><div><div class="card-title">Todos los Testimonios</div></div></div>
  <table>
    <thead><tr><th>Contenido</th><th>Usuaria</th><th>Anónimo</th><th>Fecha</th><th>Acciones</th></tr></thead>
    <tbody>
      @forelse($testimonials as $testimony)
      <tr>
        <td style="max-width:300px;font-size:13px">{{ Str::limit($testimony->content,100) }}</td>
        <td>
          @if($testimony->anonymous)
            <span style="color:var(--text-secondary)">Anónima</span>
          @else
            {{ $testimony->user->name ?? 'Desconocida' }}
          @endif
        </td>
        <td>
          @if($testimony->anonymous)
            <span class="badge b-anon">Anónimo</span>
          @else
            <span class="badge b-res">Público</span>
          @endif
        </td>
        <td>{{ \Carbon\Carbon::parse($testimony->created_at)->format('d M Y') }}</td>
        <td>
          <div style="display:flex;gap:6px">
            <button class="btn-outline" style="padding:4px 10px;font-size:12px"
              onclick="abrirEditar({{ $testimony->id }},'{{ addslashes($testimony->content) }}',{{ $testimony->anonymous }})">
              <i class="fa-solid fa-pen"></i>
            </button>
            <form method="POST" action="/testimonios/{{ $testimony->id }}" onsubmit="return confirm('¿Eliminar este testimonio?')">
              @csrf @method('DELETE')
              <button type="submit" style="padding:4px 10px;font-size:12px;background:var(--rose-light);color:var(--rose-accent);border:1px solid var(--rose-accent);border-radius:8px;cursor:pointer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="5" style="text-align:center;color:var(--text-secondary)">No hay testimonios registrados</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- MODAL CREAR --}}
<div id="modal-crear" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg)">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Nuevo Testimonio</h3>
      <button onclick="document.getElementById('modal-crear').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" action="/testimonios">
      @csrf
      <div class="login-form-group"><label>Contenido</label>
        <textarea name="content" required rows="5" style="width:100%;padding:12px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;resize:vertical;outline:none"></textarea>
      </div>
      <div class="login-form-group"><label>¿Es anónimo?</label>
        <div class="login-input-wrap"><i class="fa-solid fa-user-secret"></i>
          <select name="anonymous" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="1">Sí, anónimo</option>
            <option value="0">No, público</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>ID de denuncia relacionada</label>
        <div class="login-input-wrap"><i class="fa-solid fa-link"></i>
          <input type="number" name="complaint_id" required placeholder="ID de la denuncia">
        </div>
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
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg)">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Editar Testimonio</h3>
      <button onclick="document.getElementById('modal-editar').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" id="form-editar">
      @csrf @method('PUT')
      <div class="login-form-group"><label>Contenido</label>
        <textarea name="content" id="edit-content" required rows="5" style="width:100%;padding:12px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;resize:vertical;outline:none"></textarea>
      </div>
      <div class="login-form-group"><label>¿Es anónimo?</label>
        <div class="login-input-wrap"><i class="fa-solid fa-user-secret"></i>
          <select name="anonymous" id="edit-anonymous" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="1">Sí, anónimo</option>
            <option value="0">No, público</option>
          </select>
        </div>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-editar').style.display='none'" class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Actualizar</button>
      </div>
    </form>
  </div>
</div>

<script>
function abrirEditar(id, content, anonymous) {
  document.getElementById('form-editar').action = '/testimonios/' + id;
  document.getElementById('edit-content').value = content;
  document.getElementById('edit-anonymous').value = anonymous;
  document.getElementById('modal-editar').style.display = 'flex';
}
</script>

@endsection