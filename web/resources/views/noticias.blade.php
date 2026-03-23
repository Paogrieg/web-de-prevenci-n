@extends('back.main')
@section('contenido')

<div class="page-header-row">
  <div class="page-header"><h2><i class="fa-solid fa-newspaper"></i> Noticias</h2><p>Publicaciones y comunicados de la plataforma</p></div>
  <button class="btn-primary" onclick="document.getElementById('modal-crear').style.display='flex'">＋ Nueva noticia</button>
</div>

@if(session('success'))
  <div style="background:#d1fae5;border:1px solid #10b981;color:#065f46;border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
  </div>
@endif

<div class="stats-grid">
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-newspaper"></i></div></div><div class="stat-value">{{ $news->count() }}</div><div class="stat-label">Total publicadas</div></div>
</div>

<div class="card">
  <div class="card-header"><div><div class="card-title">Todas las Noticias</div><div class="card-subtitle">{{ $news->count() }} noticias</div></div></div>
  <table>
    <thead><tr><th>Título</th><th>Autor</th><th>Publicación</th><th>Acciones</th></tr></thead>
    <tbody>
      @forelse($news as $noticia)
      <tr>
        <td style="font-weight:500">{{ $noticia->title }}</td>
        <td>
          <div class="user-row">
            <div class="u-av">{{ strtoupper(substr($noticia->user->name ?? 'U',0,1)) }}</div>
            {{ $noticia->user->name ?? 'Sin autor' }}
          </div>
        </td>
        <td>{{ \Carbon\Carbon::parse($noticia->created_at)->format('d M Y') }}</td>
        <td>
          <div style="display:flex;gap:6px">
            <button class="btn-outline" style="padding:4px 10px;font-size:12px"
              onclick="abrirEditar({{ $noticia->id }},'{{ addslashes($noticia->title) }}','{{ addslashes($noticia->content) }}')">
              <i class="fa-solid fa-pen"></i>
            </button>
            <form method="POST" action="/noticias/{{ $noticia->id }}" onsubmit="return confirm('¿Eliminar esta noticia?')">
              @csrf @method('DELETE')
              <button type="submit" style="padding:4px 10px;font-size:12px;background:var(--rose-light);color:var(--rose-accent);border:1px solid var(--rose-accent);border-radius:8px;cursor:pointer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="4" style="text-align:center;color:var(--text-secondary)">No hay noticias registradas</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- MODAL CREAR --}}
<div id="modal-crear" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg)">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Nueva Noticia</h3>
      <button onclick="document.getElementById('modal-crear').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" action="/noticias">
      @csrf
      <div class="login-form-group"><label>Título</label><div class="login-input-wrap"><i class="fa-solid fa-newspaper"></i><input type="text" name="title" required></div></div>
      <div class="login-form-group"><label>Contenido</label>
        <textarea name="content" required rows="5" style="width:100%;padding:12px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;resize:vertical;outline:none"></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-crear').style.display='none'" class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Publicar</button>
      </div>
    </form>
  </div>
</div>

{{-- MODAL EDITAR --}}
<div id="modal-editar" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg)">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Editar Noticia</h3>
      <button onclick="document.getElementById('modal-editar').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" id="form-editar">
      @csrf @method('PUT')
      <div class="login-form-group"><label>Título</label><div class="login-input-wrap"><i class="fa-solid fa-newspaper"></i><input type="text" name="title" id="edit-title" required></div></div>
      <div class="login-form-group"><label>Contenido</label>
        <textarea name="content" id="edit-content" required rows="5" style="width:100%;padding:12px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;resize:vertical;outline:none"></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-editar').style.display='none'" class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Actualizar</button>
      </div>
    </form>
  </div>
</div>

<script>
function abrirEditar(id, title, content) {
  document.getElementById('form-editar').action = '/noticias/' + id;
  document.getElementById('edit-title').value = title;
  document.getElementById('edit-content').value = content;
  document.getElementById('modal-editar').style.display = 'flex';
}
</script>

@endsection