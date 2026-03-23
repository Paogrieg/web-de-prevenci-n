@extends('layouts.app')

@section('body_class', 'login-body')

@section('content')
<div class="login-body">
  <div class="login-wrap" style="max-width:480px">
    <div class="login-card">
      <div class="login-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Equoria">
        <h1>Equoria</h1>
        <p>Plataforma de apoyo</p>
      </div>
      <p class="login-title">Crear cuenta</p>

      @if ($errors->any())
        <div class="login-alert-danger">
          <i class="fa-solid fa-circle-exclamation"></i>
          Por favor corrige los errores del formulario.
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="login-form-group">
          <label for="name">Nombre</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-user"></i>
            <input id="name" type="text" name="name"
              value="{{ old('name') }}" required autocomplete="name" autofocus
              class="@error('name') is-invalid @enderror">
          </div>
          @error('name')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-form-group">
          <label for="lastname">Apellido</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-user"></i>
            <input id="lastname" type="text" name="lastname"
              value="{{ old('lastname') }}" required autocomplete="family-name"
              class="@error('lastname') is-invalid @enderror">
          </div>
          @error('lastname')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-form-group">
          <label for="email">Correo electrónico</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-envelope"></i>
            <input id="email" type="email" name="email"
              value="{{ old('email') }}" required autocomplete="email"
              class="@error('email') is-invalid @enderror">
          </div>
          @error('email')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-form-group">
          <label for="phone_number">Teléfono</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-phone"></i>
            <input id="phone_number" type="tel" name="phone_number"
              value="{{ old('phone_number') }}" required maxlength="10"
              placeholder="10 dígitos"
              class="@error('phone_number') is-invalid @enderror">
          </div>
          @error('phone_number')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-form-group">
          <label for="dateBirth">Fecha de nacimiento</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-calendar"></i>
            <input id="dateBirth" type="date" name="dateBirth"
              value="{{ old('dateBirth') }}" required
              class="@error('dateBirth') is-invalid @enderror">
          </div>
          @error('dateBirth')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-form-group">
          <label for="document_type">Tipo de documento</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-id-card"></i>
            <select id="document_type" name="document_type"
              style="width:100%;padding:12px 14px 12px 40px;border:1.5px solid var(--plum-200);border-radius:10px;font-size:14px;font-family:'DM Sans',sans-serif;color:var(--text-primary);background:var(--surface);outline:none;appearance:none">
              <option value="">Selecciona un documento...</option>
              <option value="ine" {{ old('document_type') == 'ine' ? 'selected' : '' }}>INE / Credencial de elector</option>
              <option value="pasaporte" {{ old('document_type') == 'pasaporte' ? 'selected' : '' }}>Pasaporte</option>
              <option value="acta_nacimiento" {{ old('document_type') == 'acta_nacimiento' ? 'selected' : '' }}>Acta de nacimiento</option>
              <option value="curp" {{ old('document_type') == 'curp' ? 'selected' : '' }}>CURP</option>
            </select>
          </div>
          @error('document_type')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-form-group">
          <label for="document">Documento de verificación</label>
          <div style="border:1.5px dashed var(--plum-300);border-radius:10px;padding:20px;text-align:center;background:var(--plum-100);cursor:pointer"
            onclick="document.getElementById('document').click()">
            <i class="fa-solid fa-cloud-arrow-up" style="font-size:24px;color:var(--plum-500);margin-bottom:8px;display:block"></i>
            <div style="font-size:13px;color:var(--text-secondary)">Sube tu documento aquí</div>
            <div style="font-size:11px;color:var(--plum-400);margin-top:4px">JPG, PNG o PDF · Máx. 5MB</div>
            <div id="file-name" style="font-size:12px;color:var(--plum-600);margin-top:8px;font-weight:600"></div>
          </div>
          <input id="document" type="file" name="document"
            accept=".jpg,.jpeg,.png,.pdf" style="display:none"
            onchange="document.getElementById('file-name').textContent = this.files[0]?.name ?? ''"
            class="@error('document') is-invalid @enderror">
          @error('document')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-form-group">
          <label for="password">Contraseña</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-lock"></i>
            <input id="password" type="password" name="password"
              required autocomplete="new-password"
              class="@error('password') is-invalid @enderror">
          </div>
          @error('password')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-form-group">
          <label for="password-confirm">Confirmar contraseña</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-lock"></i>
            <input id="password-confirm" type="password"
              name="password_confirmation" required autocomplete="new-password">
          </div>
        </div>

        <button type="submit" class="btn-login">
          <i class="fa-solid fa-user-plus"></i> Registrarse
        </button>
      </form>

      <div class="login-footer">
        <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
      </div>
    </div>
  </div>
</div>
@endsection