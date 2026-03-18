<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Equoria</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Sidebar -->
        @include('back.sidebar') 
    <!--fin sidebar-->
<div class="main">
  <header class="topbar">
    <div class="topbar-title"></div>
    <div class="topbar-actions">
      <div class="topbar-icon-btn"><i class="fa-solid fa-bell"></i><div class="notif-dot"></div></div>
      <div class="topbar-icon-btn"><i class="fa-regular fa-clipboard"></i></div>
      <div class="avatar-btn">AD</div>
    </div>
  </header>
    <main class="content">
         @yield('contenido')
    </main>
</div>
  <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>