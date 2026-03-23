@extends('layouts.app')

@section('content')
<div class="login-body">
  <div class="login-wrap">
    <div class="login-card">
      <div class="login-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Equoria">
        <h1>Equoria</h1>
        <p>Plataforma de apoyo</p>
      </div>
      <p class="login-title">Acceso para administradoras</p>

      @if ($errors->any())
        <div class="login-alert-danger">
          <i class="fa-solid fa-circle-exclamation"></i>
          Correo o contraseña incorrectos.
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-form-group">
          <label for="email">Correo electrónico</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-envelope"></i>
            <input id="email" type="email" name="email"
              value="{{ old('email') }}" required autocomplete="email" autofocus
              class="@error('email') is-invalid @enderror">
          </div>
          @error('email')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-form-group">
          <label for="password">Contraseña</label>
          <div class="login-input-wrap">
            <i class="fa-solid fa-lock"></i>
            <input id="password" type="password" name="password"
              required autocomplete="current-password"
              class="@error('password') is-invalid @enderror">
          </div>
          @error('password')
            <span class="login-invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-remember-row">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label for="remember">Recordar sesión</label>
        </div>

        <button type="submit" class="btn-login">
          <i class="fa-solid fa-right-to-bracket"></i> Iniciar sesión
        </button>
      </form>

      @if (Route::has('password.request'))
        <div class="login-footer">
          <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
          <br><br>
          <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection