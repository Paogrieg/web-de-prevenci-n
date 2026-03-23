@extends('back.main')
@section('contenido')

<div class="page-header-row">
  <div class="page-header"><h2><i class="fa-solid fa-credit-card"></i> Pagos</h2><p>Control financiero y métodos de pago del sistema</p></div>
  <button class="btn-primary" onclick="document.getElementById('modal-crear').style.display='flex'">＋ Nuevo pago</button>
</div>

@if(session('success'))
  <div style="background:#d1fae5;border:1px solid #10b981;color:#065f46;border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px">
    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
  </div>
@endif

{{-- TARJETA Y BOXES --}}
<div class="pagos-hero">
  <div class="credit-card">
    <div><div class="cc-chip"><i class="fa-solid fa-credit-card" style="color:rgb(255,255,255)"></i></div><div class="cc-number">4562 &nbsp;1122 &nbsp;4594 &nbsp;7852</div></div>
    <div class="cc-footer">
      <div><div class="cc-label">Titular</div><div class="cc-val">Admin</div></div>
      <div style="text-align:right"><div class="cc-label">Vence</div><div class="cc-val">03/28</div></div>
      <div class="cc-brand"><i class="fa-solid fa-circle" style="color:rgb(48,113,230)"></i><i class="fa-solid fa-circle" style="color:rgb(255,0,0)"></i></div>
    </div>
  </div>
  <div class="pago-box"><div class="pago-icon"><i class="fa-solid fa-building-columns"></i></div><div class="pago-lbl">Ingresos del mes</div><div class="pago-name">Transferencias</div><div class="pago-amount">+${{ number_format($payments->where('status','completed')->sum('cost'), 2) }}</div><div class="pago-sub">Fondos recibidos</div></div>
  <div class="pago-box"><div class="pago-icon sec"><i class="fa-solid fa-money-bill-transfer"></i></div><div class="pago-lbl">Pagos procesados</div><div class="pago-name">Verificaciones</div><div class="pago-amount">${{ number_format($payments->sum('cost'), 2) }}</div><div class="pago-sub">{{ $payments->count() }} pagos en total</div></div>
</div>

<div class="stats-grid">
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-credit-card"></i></div></div><div class="stat-value">{{ $payments->count() }}</div><div class="stat-label">Total pagos</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-circle-check"></i></div></div><div class="stat-value">{{ $payments->where('status','completed')->count() }}</div><div class="stat-label">Completados</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-hourglass-half"></i></div></div><div class="stat-value">{{ $payments->where('status','in_process')->count() }}</div><div class="stat-label">En proceso</div></div>
  <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-circle-xmark"></i></div></div><div class="stat-value">{{ $payments->where('status','canceled')->count() }}</div><div class="stat-label">Cancelados</div></div>
</div>

<div class="card">
  <div class="card-header"><div><div class="card-title">Historial de Pagos</div><div class="card-subtitle">{{ $payments->count() }} pagos registrados</div></div></div>
  <table>
    <thead><tr><th>#</th><th>Costo</th><th>Método</th><th>Referencia</th><th>Estado</th><th>Fecha</th><th>Acciones</th></tr></thead>
    <tbody>
      @forelse($payments as $payment)
      <tr>
        <td style="color:var(--text-secondary)">#{{ $payment->id }}</td>
        <td style="font-weight:600">${{ number_format($payment->cost, 2) }}</td>
        <td>{{ $payment->payment_method }}</td>
        <td style="font-size:12px;color:var(--text-secondary)">{{ $payment->payment_reference }}</td>
        <td>
          @if($payment->status=='completed') <span class="badge b-res">Completado</span>
          @elseif($payment->status=='in_process') <span class="badge b-rev">En proceso</span>
          @else <span class="badge b-pen">Cancelado</span>
          @endif
        </td>
        <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}</td>
        <td>
          <div style="display:flex;gap:6px">
            <button class="btn-outline" style="padding:4px 10px;font-size:12px"
              onclick="abrirEditar({{ $payment->id }},'{{ $payment->cost }}','{{ addslashes($payment->payment_method) }}','{{ addslashes($payment->payment_reference) }}','{{ $payment->status }}','{{ $payment->payment_date }}')">
              <i class="fa-solid fa-pen"></i>
            </button>
            <form method="POST" action="/pagos/{{ $payment->id }}" onsubmit="return confirm('¿Eliminar este pago?')">
              @csrf @method('DELETE')
              <button type="submit" style="padding:4px 10px;font-size:12px;background:var(--rose-light);color:var(--rose-accent);border:1px solid var(--rose-accent);border-radius:8px;cursor:pointer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="7" style="text-align:center;color:var(--text-secondary)">No hay pagos registrados</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- MODAL CREAR --}}
<div id="modal-crear" style="display:none;position:fixed;inset:0;background:rgba(26,10,46,0.5);z-index:999;align-items:center;justify-content:center">
  <div style="background:white;border-radius:20px;padding:36px;width:100%;max-width:500px;box-shadow:var(--shadow-lg)">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Nuevo Pago</h3>
      <button onclick="document.getElementById('modal-crear').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" action="/pagos">
      @csrf
      <div class="login-form-group"><label>Costo</label><div class="login-input-wrap"><i class="fa-solid fa-dollar-sign"></i><input type="number" step="0.01" name="cost" required placeholder="0.00"></div></div>
      <div class="login-form-group"><label>Método de pago</label>
        <div class="login-input-wrap"><i class="fa-solid fa-credit-card"></i>
          <select name="payment_method" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="">Selecciona...</option>
            <option value="Tarjeta de crédito">Tarjeta de crédito</option>
            <option value="Tarjeta de débito">Tarjeta de débito</option>
            <option value="Transferencia">Transferencia</option>
            <option value="OXXO Pay">OXXO Pay</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Referencia</label><div class="login-input-wrap"><i class="fa-solid fa-hashtag"></i><input type="text" name="payment_reference" required placeholder="Ej: REF-001"></div></div>
      <div class="login-form-group"><label>Estado</label>
        <div class="login-input-wrap"><i class="fa-solid fa-circle-half-stroke"></i>
          <select name="status" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="in_process">En proceso</option>
            <option value="completed">Completado</option>
            <option value="canceled">Cancelado</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Fecha de pago</label><div class="login-input-wrap"><i class="fa-solid fa-calendar"></i><input type="date" name="payment_date" required></div></div>
      <div class="login-form-group"><label>ID de verificación</label><div class="login-input-wrap"><i class="fa-solid fa-link"></i><input type="number" name="verification_id" required placeholder="ID de la verificación"></div></div>
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
      <h3 style="font-family:'Playfair Display',serif;color:var(--plum-800)">Editar Pago</h3>
      <button onclick="document.getElementById('modal-editar').style.display='none'" style="background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-secondary)">✕</button>
    </div>
    <form method="POST" id="form-editar">
      @csrf @method('PUT')
      <div class="login-form-group"><label>Costo</label><div class="login-input-wrap"><i class="fa-solid fa-dollar-sign"></i><input type="number" step="0.01" name="cost" id="edit-cost" required></div></div>
      <div class="login-form-group"><label>Método de pago</label>
        <div class="login-input-wrap"><i class="fa-solid fa-credit-card"></i>
          <select name="payment_method" id="edit-method" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="Tarjeta de crédito">Tarjeta de crédito</option>
            <option value="Tarjeta de débito">Tarjeta de débito</option>
            <option value="Transferencia">Transferencia</option>
            <option value="OXXO Pay">OXXO Pay</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Referencia</label><div class="login-input-wrap"><i class="fa-solid fa-hashtag"></i><input type="text" name="payment_reference" id="edit-ref" required></div></div>
      <div class="login-form-group"><label>Estado</label>
        <div class="login-input-wrap"><i class="fa-solid fa-circle-half-stroke"></i>
          <select name="status" id="edit-status" required style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background:var(--surface)">
            <option value="in_process">En proceso</option>
            <option value="completed">Completado</option>
            <option value="canceled">Cancelado</option>
          </select>
        </div>
      </div>
      <div class="login-form-group"><label>Fecha de pago</label><div class="login-input-wrap"><i class="fa-solid fa-calendar"></i><input type="date" name="payment_date" id="edit-date" required></div></div>
      <div style="display:flex;gap:10px;justify-content:flex-end">
        <button type="button" onclick="document.getElementById('modal-editar').style.display='none'" class="btn-outline" style="padding:10px 20px">Cancelar</button>
        <button type="submit" class="btn-login" style="width:auto;padding:10px 24px">Actualizar</button>
      </div>
    </form>
  </div>
</div>

<script>
function abrirEditar(id, cost, method, ref, status, date) {
  document.getElementById('form-editar').action = '/pagos/' + id;
  document.getElementById('edit-cost').value = cost;
  document.getElementById('edit-method').value = method;
  document.getElementById('edit-ref').value = ref;
  document.getElementById('edit-status').value = status;
  document.getElementById('edit-date').value = date;
  document.getElementById('modal-editar').style.display = 'flex';
}
</script>

@endsection