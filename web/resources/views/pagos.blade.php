@extends('back.main')
@section('content')

<div class="view" id="view-pagos">
      <div class="page-header"><h2><i class="fa-solid fa-credit-card"></i> Pagos y Verificaciones</h2><p>Control financiero y métodos de pago del sistema</p></div>
      <div class="pagos-hero">
        <div class="credit-card">
          <div><div class="cc-chip"><i class="fa-solid fa-credit-card" style="color: rgb(255, 255, 255);"></i></div><div class="cc-number">4562 &nbsp;1122 &nbsp;4594 &nbsp;7852</div></div>
          <div class="cc-footer">
            <div><div class="cc-label">Titular</div><div class="cc-val">Admin ALAS</div></div>
            <div style="text-align:right"><div class="cc-label">Vence</div><div class="cc-val">03/28</div></div>
            <div class="cc-brand"><i class="fa-solid fa-circle" style="color: rgb(48, 113, 230);"></i><i class="fa-solid fa-circle" style="color: rgb(255, 0, 0);"></i></div>
          </div>
        </div>
        <div class="pago-box"><div class="pago-icon"><i class="fa-solid fa-building-columns"></i></div><div class="pago-lbl">Ingresos del mes</div><div class="pago-name">Transferencias</div><div class="pago-amount">+$24,500</div><div class="pago-sub">Fondos recibidos</div></div>
        <div class="pago-box"><div class="pago-icon sec"><i class="fa-solid fa-money-bill-transfer"></i></div><div class="pago-lbl">Pagos procesados</div><div class="pago-name">Verificaciones</div><div class="pago-amount">$8,730</div><div class="pago-sub">38 pagos este mes</div></div>
      </div>
      <div class="pagos-bottom-grid">
        <div class="card">
          <div class="card-header"><div><div class="card-title">Métodos de Pago</div><div class="card-subtitle">Guardados en el sistema</div></div></div>
          <div class="metodo-item"><div class="m-logo m-mc">MC</div><div class="m-num">•••• •••• •••• <strong>7852</strong><br><span>Mastercard · Activa</span></div><div class="m-edit"><i class="fa-solid fa-pen"></i></div></div>
          <div class="metodo-item"><div class="m-logo m-visa">VISA</div><div class="m-num">•••• •••• •••• <strong>5248</strong><br><span>Visa · Activa</span></div><div class="m-edit"><i class="fa-solid fa-pen"></i></div></div>
          <div class="metodo-item"><div class="m-logo m-oxxo">OXXO</div><div class="m-num">Referencia <strong>#OX-8841</strong><br><span>OXXO Pay · Pendiente</span></div><div class="m-edit"><i class="fa-solid fa-pen"></i></div></div>
          <button class="add-btn"><i class="fa-solid fa-plus"></i> Agregar nuevo método</button>
        </div>
        <div class="card">
          <div class="card-header"><div><div class="card-title">Facturas</div><div class="card-subtitle">Historial de pagos</div></div><button class="card-action">Ver todo</button></div>
          <div class="fac-item"><div><div class="fac-fecha">Marzo 01, 2026</div><div class="fac-ref">#VER-415646 &nbsp;<span class="badge b-pag" style="font-size:10px;padding:2px 7px">Pagado</span></div></div><div class="fac-right"><div class="fac-monto">$1,800</div><div class="fac-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</div></div></div>
          <div class="fac-item"><div><div class="fac-fecha">Febrero 10, 2026</div><div class="fac-ref">#VER-126749 &nbsp;<span class="badge b-pag" style="font-size:10px;padding:2px 7px">Pagado</span></div></div><div class="fac-right"><div class="fac-monto">$2,500</div><div class="fac-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</div></div></div>
          <div class="fac-item"><div><div class="fac-fecha">Enero 05, 2026</div><div class="fac-ref">#VER-103578 &nbsp;<span class="badge b-pag" style="font-size:10px;padding:2px 7px">Pagado</span></div></div><div class="fac-right"><div class="fac-monto">$1,200</div><div class="fac-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</div></div></div>
          <div class="fac-item"><div><div class="fac-fecha">Diciembre 25, 2025</div><div class="fac-ref">#VER-415646 &nbsp;<span class="badge b-pen" style="font-size:10px;padding:2px 7px">Pendiente</span></div></div><div class="fac-right"><div class="fac-monto">$1,800</div><div class="fac-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</div></div></div>
          <div class="fac-item"><div><div class="fac-fecha">Noviembre 01, 2025</div><div class="fac-ref">#VER-803481 &nbsp;<span class="badge b-can" style="font-size:10px;padding:2px 7px">Cancelado</span></div></div><div class="fac-right"><div class="fac-monto">$3,000</div><div class="fac-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</div></div></div>
        </div>
        <div class="card">
          <div class="card-header"><div><div class="card-title">Transacciones</div><div class="card-subtitle">1 – 13 Marzo 2026</div></div><div style="font-size:18px;cursor:pointer"><i class="fa-solid fa-gear"></i></div></div>
          <div class="trans-item"><div class="t-icon ti-e"><i class="fa-solid fa-money-bill-wave"></i></div><div style="flex:1"><div class="t-name">Fondos INMUJERES</div><div class="t-date">13 Mar · Transferencia</div></div><div class="t-amt ta-pos">+$12,000</div></div>
          <div class="trans-item"><div class="t-icon ti-s"><i class="fa-solid fa-file-invoice"></i></div><div style="flex:1"><div class="t-name">Pago verificación #VER-416</div><div class="t-date">12 Mar · Mastercard</div></div><div class="t-amt ta-neg">-$1,800</div></div>
          <div class="trans-item"><div class="t-icon ti-e"><i class="fa-solid fa-hand-holding-dollar"></i></div><div style="flex:1"><div class="t-name">Donación anónima</div><div class="t-date">10 Mar · OXXO Pay</div></div><div class="t-amt ta-pos">+$500</div></div>
          <div class="trans-item"><div class="t-icon ti-s"><i class="fa-solid fa-house-medical"></i></div><div style="flex:1"><div class="t-name">Servicios psicológicos</div><div class="t-date">08 Mar · Visa</div></div><div class="t-amt ta-neg">-$4,200</div></div>
          <div class="trans-item"><div class="t-icon ti-n"><i class="fa-solid fa-building-columns"></i></div><div style="flex:1"><div class="t-name">Fondo Sec. Bienestar</div><div class="t-date">05 Mar · Transferencia</div></div><div class="t-amt ta-pos">+$8,000</div></div>
        </div>
      </div>
    </div>


@endsection