@extends('back.main')
@section('contenido')

<div class="page-header-row">
  <div class="page-header"><h2><i class="fa-solid fa-users"></i> Usuarias</h2><p>Gestión de usuarias registradas en la plataforma</p></div>
</div>

@if(session('success'))
  <div style="background:#d1fae5;border:1px solid #10b981;color:#065f46;border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
  </div>
@endif

<div class="stats-grid">
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-users"></i></div></div><div class="stat-value">{{ $users->count() }}</div><div class="stat-label">Total registradas</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div></div><div class="stat-value">{{ $users->where('verificated', 1)->count() }}</div><div class="stat-label">Verificadas</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-user-plus"></i></div></div><div class="stat-value">{{ $users->where('created_at', '>=', now()->startOfMonth())->count() }}</div><div class="stat-label">Nuevas este mes</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-hourglass-half"></i></div></div><div class="stat-value">{{ $users->where('verificated', 0)->count() }}</div><div class="stat-label">Pendientes verificar</div></div>
</div>

<div class="card">
  <div class="card-header"><div><div class="card-title">Listado de Usuarias</div><div class="card-subtitle">{{ $users->count() }} usuarias registradas</div></div></div>
  <table>
    <thead><tr><th>Usuaria</th><th>Rol</th><th>Teléfono</th><th>Estado</th><th>Registro</th><th>Acciones</th></tr></thead>
    <tbody>
      @forelse($users as $user)
      <tr>
        <td>
          <div class="user-row">
            <div class="u-av">{{ strtoupper(substr($user->name,0,1)) }}{{ strtoupper(substr($user->lastname,0,1)) }}</div>
            <div>
              <div style="font-weight:500">{{ $user->name }} {{ $user->lastname }}</div>
              <div style="font-size:11px;color:var(--text-secondary)">{{ $user->email }}</div>
            </div>
          </div>
        </td>
        <td>{{ ucfirst($user->rol) }}</td>
        <td>{{ $user->phone_number }}</td>
        <td>
          @if($user->verificated)
            <span class="badge b-res">Verificada</span>
          @else
            <span class="badge b-pen">Sin verificar</span>
          @endif
        </td>
        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
        <td>
          @if($user->id !== auth()->id())
          <form method="POST" action="/users/{{ $user->id }}" onsubmit="return confirm('¿Eliminar esta usuaria?')">
            @csrf
            @method('DELETE')
            <button type="submit" style="padding:4px 10px;font-size:12px;background:var(--rose-light);color:var(--rose-accent);border:1px solid var(--rose-accent);border-radius:8px;cursor:pointer">
              <i class="fa-solid fa-trash"></i>
            </button>
          </form>
          @endif
        </td>
      </tr>
      @empty
      <tr><td colspan="6" style="text-align:center;color:var(--text-secondary)">No hay usuarias registradas</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection