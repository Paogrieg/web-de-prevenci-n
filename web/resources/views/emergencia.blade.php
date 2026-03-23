@extends('back.main')
@section('contenido')

<div class="page-header-row">
  <div class="page-header"><h2><i class="fa-solid fa-phone"></i> Contactos de Emergencia</h2><p>Red de apoyo y contactos de confianza registrados</p></div>
  <button class="btn-primary" onclick="document.getElementById('modal-crear').style.display='flex'"><i class="fa-solid fa-plus"></i> Nuevo contacto</button>
</div>

@if(session('success'))
  <div style="background:#d1fae5;border:1px solid #10b981;color:#065f46;border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
  </div>
@endif

<div class="stats-grid">
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-phone"></i></div></div><div class="stat-value">{{ $contacts->count() }}</div><div class="stat-label">Total contactos</div></div>
</div>

<div class="card">
  <div class="card-header"><div><div class="card-title">Todos los Contactos</div><div class="card-subtitle">{{ $contacts->count() }} contactos registrados</div></div></div>
  <table>
    <thead><tr><th>Nombre</th><th>Teléfono</th><th>Relación</th><th>Acciones</th></tr></thead>
    <tbody>
      @forelse($contacts as $contact)
      <tr>
        <td style="font-weight:500">{{ $contact->name }} {{ $contact->lastname }}</td>
        <td>{{ $contact->phone_number }}</td>
        <td>{{ $contact->relation }}</td>
        <td>
          <div style="display:flex;gap:6px">
            <button class="btn-outline" style="padding:4px 10px;font-size:12px"
              onclick="abrirEditar({{ $contact->id }},'{{ addslashes($contact->name) }}','{{ addslashes($contact->lastname) }}','{{ $contact->phone_number }}','{{ addslashes($contact->relation) }}')">
              <i class="fa-solid fa-pen"></i>
            </button>
            <form method="POST" action="/emergencia/{{ $contact->id }}" onsubmit="return confirm('¿Eliminar este contacto?')">
              @csrf @method('DELETE')
              <button type="submit" style="padding:4px 10px;font-size:12px;background:var(--rose-light);color:var(--rose-accent);border:1px solid var(--rose-accent);border-radius:8px;cursor:pointer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="4" style="text-align:center;color:var(--text-secondary)">No hay contactos registrados</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- MODAL CREAR --}}
<div id="modal-crear" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg)">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Nuevo Contacto</h3>
      <button onclick="document.getElementById('modal-crear').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" action="/emergencia">
      @csrf
      <div class="login-form-group"><label>Nombre</label><div class="login-input-wrap"><i class="fa-solid fa-user"></i><input type="text" name="name" required></div></div>
      <div class="login-form-group"><label>Apellido</label><div class="login-input-wrap"><i class="fa-solid fa-user"></i><input type="text" name="lastname" required></div></div>
      <div class="login-form-group"><label>Teléfono</label><div class="login-input-wrap"><i class="fa-solid fa-phone"></i><input type="tel" name="phone_number" required maxlength="10" placeholder="10 dígitos"></div></div>
      <div class="login-form-group"><label>Tipo de relación</label>
        <div class="login-input-wrap"><i class="fa-solid fa-tag"></i>
          <select name="relation" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="">Selecciona...</option>
            <option value="Refugio">Refugio</option>
            <option value="Abogada">Abogada</option>
            <option value="Psicóloga">Psicóloga</option>
            <option value="Dependencia">Dependencia policial</option>
            <option value="Línea de crisis">Línea de crisis</option>
            <option value="Otro">Otro</option>
          </select>
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
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Editar Contacto</h3>
      <button onclick="document.getElementById('modal-editar').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" id="form-editar">
      @csrf @method('PUT')
      <div class="login-form-group"><label>Nombre</label><div class="login-input-wrap"><i class="fa-solid fa-user"></i><input type="text" name="name" id="edit-name" required></div></div>
      <div class="login-form-group"><label>Apellido</label><div class="login-input-wrap"><i class="fa-solid fa-user"></i><input type="text" name="lastname" id="edit-lastname" required></div></div>
      <div class="login-form-group"><label>Teléfono</label><div class="login-input-wrap"><i class="fa-solid fa-phone"></i><input type="tel" name="phone_number" id="edit-phone" required maxlength="10"></div></div>
      <div class="login-form-group"><label>Tipo de relación</label>
        <div class="login-input-wrap"><i class="fa-solid fa-tag"></i>
          <select name="relation" id="edit-relation" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="Refugio">Refugio</option>
            <option value="Abogada">Abogada</option>
            <option value="Psicóloga">Psicóloga</option>
            <option value="Dependencia">Dependencia policial</option>
            <option value="Línea de crisis">Línea de crisis</option>
            <option value="Otro">Otro</option>
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
function abrirEditar(id, name, lastname, phone, relation) {
  document.getElementById('form-editar').action = '/emergencia/' + id;
  document.getElementById('edit-name').value = name;
  document.getElementById('edit-lastname').value = lastname;
  document.getElementById('edit-phone').value = phone;
  document.getElementById('edit-relation').value = relation;
  document.getElementById('modal-editar').style.display = 'flex';
}
</script>

@endsection