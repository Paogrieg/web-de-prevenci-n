@extends('back.main')
@section('content')

<div class="view" id="view-configuracion">
      <div class="page-header"><h2><i class="fa-solid fa-gear"></i> Configuración</h2><p>Ajustes del sistema y preferencias de la plataforma</p></div>

      <!-- Profile hero -->
      <div class="profile-hero" style="margin-bottom:24px">
        <div class="profile-avatar-lg">AD</div>
        <div class="profile-info">
          <h3>Administrador ALAS</h3>
          <p>admin@alas.org.mx · Chihuahua, México</p>
          <div class="profile-badge"><i class="fa-solid fa-star"></i> Administrador del sistema</div>
        </div>
        <button class="btn-outline" style="margin-left:auto;color:white;border-color:rgba(255,255,255,0.3)"><i class="fa-solid fa-pen"></i> Editar perfil</button>
      </div>

      <div class="two-col" style="align-items:start">
        <!-- Datos del perfil -->
        <div class="card">
          <div class="card-header"><div><div class="card-title">Datos del Perfil</div></div><button class="card-action">Guardar</button></div>
          <div class="form-grid">
            <div class="form-group"><label class="form-label">Nombre</label><input class="form-input" type="text" value="Administrador"></div>
            <div class="form-group"><label class="form-label">Apellido</label><input class="form-input" type="text" value="ALAS"></div>
            <div class="form-group"><label class="form-label">Email</label><input class="form-input" type="email" value="admin@alas.org.mx"></div>
            <div class="form-group"><label class="form-label">Teléfono</label><input class="form-input" type="tel" value="614-000-0000"></div>
            <div class="form-group full"><label class="form-label">Cambiar contraseña</label><input class="form-input" type="password" placeholder="Nueva contraseña"></div>
          </div>
        </div>

        <!-- Preferencias del sistema -->
        <div class="card">
          <div class="card-header"><div><div class="card-title">Preferencias del Sistema</div></div></div>
          <div class="config-section">
            <div class="config-section-title">Notificaciones</div>
            <div class="config-row">
              <div><div class="config-label">Nuevas denuncias</div><div class="config-desc">Recibir alerta cuando llegue una denuncia nueva</div></div>
              <button class="toggle on" onclick="toggleSwitch(this)"></button>
            </div>
            <div class="config-row">
              <div><div class="config-label">Testimonios pendientes</div><div class="config-desc">Notificar al llegar un testimonio para moderar</div></div>
              <button class="toggle on" onclick="toggleSwitch(this)"></button>
            </div>
            <div class="config-row">
              <div><div class="config-label">Pagos y transacciones</div><div class="config-desc">Alertas de movimientos financieros</div></div>
              <button class="toggle" onclick="toggleSwitch(this)"></button>
            </div>
          </div>
          <div class="config-section">
            <div class="config-section-title">Privacidad</div>
            <div class="config-row">
              <div><div class="config-label">Modo anónimo por defecto</div><div class="config-desc">Proteger identidad de usuarias en reportes</div></div>
              <button class="toggle on" onclick="toggleSwitch(this)"></button>
            </div>
            <div class="config-row">
              <div><div class="config-label">Autenticación de dos factores</div><div class="config-desc">Mayor seguridad en inicio de sesión</div></div>
              <button class="toggle on" onclick="toggleSwitch(this)"></button>
            </div>
            <div class="config-row">
              <div><div class="config-label">Registros de acceso</div><div class="config-desc">Guardar historial de sesiones del sistema</div></div>
              <button class="toggle" onclick="toggleSwitch(this)"></button>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection