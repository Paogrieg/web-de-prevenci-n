<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Equoria — En construcción</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <style>
    .construccion-body {
      display:flex; align-items:center; justify-content:center;
      min-height:100vh;
      background:linear-gradient(135deg, var(--plum-900) 0%, var(--plum-800) 50%, var(--plum-700) 100%);
    }
    .construccion-card {
      background:var(--white); border-radius:24px; padding:56px 48px;
      box-shadow:var(--shadow-lg); text-align:center; max-width:460px; width:100%;
    }
    .construccion-logo { margin-bottom:32px; }
    .construccion-logo img { width:64px; height:64px; border-radius:14px; margin-bottom:12px; }
    .construccion-logo h1 {
      font-family:'Playfair Display',serif; font-size:28px;
      font-weight:700; color:var(--plum-800); margin:0;
    }
    .construccion-icon {
      font-size:56px; margin-bottom:24px;
      background:linear-gradient(135deg, var(--plum-600), var(--rose-accent));
      -webkit-background-clip:text; -webkit-text-fill-color:transparent;
    }
    .construccion-title {
      font-family:'Playfair Display',serif; font-size:26px;
      font-weight:700; color:var(--plum-800); margin-bottom:12px;
    }
    .construccion-sub {
      font-size:14px; color:var(--text-secondary);
      line-height:1.7; margin-bottom:32px;
    }
    .construccion-badge {
      display:inline-flex; align-items:center; gap:8px;
      background:var(--plum-100); color:var(--plum-600);
      font-size:12px; font-weight:600; padding:8px 18px;
      border-radius:20px; margin-bottom:32px;
      text-transform:uppercase; letter-spacing:1px;
    }
    .construccion-badge i { color:var(--rose-accent); }
    .btn-logout {
      display:inline-flex; align-items:center; gap:8px;
      padding:12px 28px;
      background:linear-gradient(90deg, var(--plum-700), var(--plum-500));
      color:white; font-size:14px; font-weight:600;
      font-family:'DM Sans',sans-serif; border:none;
      border-radius:10px; cursor:pointer; text-decoration:none;
      transition:opacity .2s;
    }
    .btn-logout:hover { opacity:.9; color:white; }
  </style>
</head>
<body class="construccion-body">
  <div style="padding:20px; width:100%; display:flex; justify-content:center;">
    <div class="construccion-card">

      <div class="construccion-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Equoria">
        <h1>Equoria</h1>
      </div>

      <div class="construccion-icon">
        <i class="fa-solid fa-helmet-safety"></i>
      </div>

      <div class="construccion-title">En construcción</div>

      <p class="construccion-sub">
        Estamos trabajando para ofrecerte la mejor experiencia.<br>
        Pronto tendrás acceso a todas las funciones de la plataforma.
      </p>

      <div class="construccion-badge">
        <i class="fa-solid fa-circle-dot fa-beat"></i>
        Próximamente disponible
      </div>

      <br>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-logout">
          <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
        </button>
      </form>

    </div>
  </div>
</body>
</html>