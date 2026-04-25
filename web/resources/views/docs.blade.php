<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>API | Documentación Oficial</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
<style>
:root {--primary-color:#6366f1;--primary-hover:#4f46e5;--sidebar-bg:#ffffff;--content-bg:#f8fafc;--text-main:#1e293b;--text-muted:#64748b;--border-color:#e2e8f0;--code-bg:#1e293b;}
body {font-family:'Inter',sans-serif;background-color:var(--content-bg);color:var(--text-main);overflow-x:hidden;}
.sidebar {position:fixed;top:0;bottom:0;left:0;z-index:100;width:300px;padding:0;background-color:var(--sidebar-bg);border-right:1px solid var(--border-color);overflow-y:auto;}
.sidebar-header {padding:2rem 1.5rem;border-bottom:1px solid var(--border-color);}
.brand-logo {font-weight:700;font-size:1.25rem;color:var(--primary-color);display:flex;align-items:center;gap:.5rem;text-decoration:none;}
.nav-links {padding:1rem 0 2rem;}
.nav-link {padding:.7rem 1.5rem;color:var(--text-muted);font-weight:500;display:flex;align-items:center;gap:.75rem;transition:all .2s;border-left:3px solid transparent;}
.nav-link:hover {color:var(--primary-color);background-color:#f1f5f9;}
.nav-link.active {color:var(--primary-color);background-color:#eef2ff;border-left-color:var(--primary-color);}
main {margin-left:300px;padding:2rem 3rem;min-height:100vh;}
.doc-section {padding-top:4rem;margin-top:-2rem;margin-bottom:4rem;}
.section-title {font-weight:700;margin-bottom:1.5rem;display:flex;align-items:center;gap:.75rem;}
.badge-method {padding:.4rem .8rem;font-weight:700;font-size:.75rem;border-radius:6px;text-transform:uppercase;min-width:70px;text-align:center;}
.badge-get {background-color:#dcfce7;color:#166534;}
.badge-post {background-color:#dbeafe;color:#1e40af;}
.badge-put {background-color:#fef9c3;color:#854d0e;}
.badge-delete {background-color:#fee2e2;color:#991b1b;}
.api-card {background:#fff;border-radius:12px;border:1px solid var(--border-color);overflow:hidden;box-shadow:0 4px 6px -1px rgba(0,0,0,.05);margin-bottom:2rem;}
.api-header {padding:1.25rem 1.5rem;background-color:#fff;border-bottom:1px solid var(--border-color);display:flex;align-items:center;gap:1rem;}
.api-endpoint {font-family:'JetBrains Mono','Courier New',monospace;font-weight:600;color:var(--text-main);font-size:.95rem;}
.api-body {padding:1.5rem;}
.code-block-header {display:flex;justify-content:space-between;align-items:center;background:#2d2d2d;padding:.5rem 1rem;border-radius:8px 8px 0 0;color:#ccc;font-size:.8rem;font-weight:500;}
pre[class*="language-"] {margin-top:0!important;border-radius:0 0 8px 8px!important;font-size:.85rem!important;}
.glass {background:rgba(255,255,255,.7);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);}
@media (max-width:992px) {.sidebar{width:80px;overflow:hidden;}.sidebar:hover{width:300px;overflow-y:auto;}main{margin-left:80px;padding:2rem 1.5rem;}.nav-link span,.sidebar .small-title{display:none;}.sidebar:hover .nav-link span,.sidebar:hover .small-title{display:inline;}}
</style>
</head>
<body>
<nav class="sidebar">
<div class="sidebar-header"><a href="#" class="brand-logo"><i class="bi bi-code-slash"></i><span>API Docs</span></a></div>
<div class="nav-links">
<a href="#intro" class="nav-link active"><i class="bi bi-house-door"></i><span>Introducción</span></a>
<div class="px-4 py-2 small text-uppercase text-muted fw-bold small-title" style="font-size:.65rem;letter-spacing:.05rem;">Autenticación</div>
<a href="#auth" class="nav-link"><i class="bi bi-shield-lock"></i><span>Autenticación</span></a>
<a href="#users" class="nav-link"><i class="bi-people"></i><span>Usuarios</span></a>
<a href="#advertising" class="nav-link"><i class="bi-badge-ad"></i><span>Publicidad</span></a>
<a href="#advisor" class="nav-link"><i class="bi-person-vcard"></i><span>Advisor</span></a>
<a href="#adviser" class="nav-link"><i class="bi-person-vcard-fill"></i><span>Adviser</span></a>
<a href="#avatar" class="nav-link"><i class="bi-person-circle"></i><span>Avatares</span></a>
<a href="#collaboration" class="nav-link"><i class="bi-handshake"></i><span>Colaboraciones</span></a>
<a href="#companies" class="nav-link"><i class="bi-buildings"></i><span>Compañías</span></a>
<a href="#complaint" class="nav-link"><i class="bi-chat-left-text"></i><span>Quejas</span></a>
<a href="#contact" class="nav-link"><i class="bi-envelope"></i><span>Contacto</span></a>
<a href="#emergencycontact" class="nav-link"><i class="bi-telephone-plus"></i><span>Contactos de emergencia</span></a>
<a href="#evidence" class="nav-link"><i class="bi-folder-check"></i><span>Evidencias</span></a>
<a href="#evidencefile" class="nav-link"><i class="bi-file-earmark-arrow-up"></i><span>Archivos de evidencia</span></a>
<a href="#genderverification" class="nav-link"><i class="bi-shield-check"></i><span>Verificación de género</span></a>
<a href="#laws" class="nav-link"><i class="bi-journal-text"></i><span>Leyes</span></a>
<a href="#new" class="nav-link"><i class="bi-newspaper"></i><span>Noticias</span></a>
<a href="#payment" class="nav-link"><i class="bi-credit-card"></i><span>Pagos</span></a>
<a href="#record" class="nav-link"><i class="bi-clipboard-data"></i><span>Registros</span></a>
<a href="#seguimientocaso" class="nav-link"><i class="bi-kanban"></i><span>Seguimiento de casos</span></a>
<a href="#testimonials" class="nav-link"><i class="bi-chat-quote"></i><span>Testimonios</span></a>
<a href="#verification" class="nav-link"><i class="bi-patch-check"></i><span>Verificaciones</span></a>
<div class="px-4 py-2 mt-3 small text-uppercase text-muted fw-bold small-title" style="font-size:.65rem;letter-spacing:.05rem;">Errores</div>
<a href="#errors" class="nav-link"><i class="bi bi-exclamation-triangle"></i><span>Formatos de error</span></a>
</div>
</nav>
<main>
<div class="container-fluid">
<section id="intro" class="doc-section">
<div class="row"><div class="col-lg-9">
<h1 class="display-6 fw-bold mb-4">Documentación de la API</h1>
<p class="lead text-muted">Esta documentación describe los endpoints disponibles en la API desarrollada en Laravel. La API utiliza respuestas en formato JSON y autenticación JWT para proteger la mayoría de las rutas.</p>
<div class="alert alert-info border-0 shadow-sm glass"><i class="bi bi-info-circle-fill me-2"></i>Todas las peticiones deben incluir el header <code>Accept: application/json</code>. Para rutas protegidas, incluir <code>Authorization: Bearer TOKEN</code>.</div>
<div class="alert alert-warning border-0 shadow-sm glass"><i class="bi bi-lock-fill me-2"></i>Las rutas <code>/api/register</code> y <code>/api/login</code> son públicas. Las demás rutas principales se encuentran protegidas por middleware JWT.</div>
</div></div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="auth" class="doc-section">
<h2 class="section-title"><i class="bi bi-shield-lock-fill text-primary"></i>Autenticación</h2>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/register</span>
</div>
<div class="api-body">
<p>Registra un usuario nuevo y devuelve un token JWT.</p>

<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Dayana",
  "email": "daya@example.com",
  "password": "123456",
  "password_confirmation": "123456"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "token": "jwt_token",
  "user": {
    "id": 1,
    "name": "Dayana",
    "lastname": "Perez",
    "email": "daya@example.com"
  }
}</code></pre>
</div>
</div>
</div>
</div><div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/login</span>
</div>
<div class="api-body">
<p>Inicia sesión y genera un token JWT para consumir rutas protegidas.</p>

<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "email": "daya@example.com",
  "password": "123456"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "token": "jwt_token",
  "user": {
    "id": 1,
    "name": "Dayana",
    "lastname": "Perez",
    "email": "daya@example.com"
  },
  "expires_in": 3600
}</code></pre>
</div>
</div>
</div>
</div><div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/user</span>
</div>
<div class="api-body">
<p>Obtiene la información del usuario autenticado.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "id": 1,
  "name": "Dayana",
  "lastname": "Perez",
  "phone_number": "6521049466",
  "email": "daya@example.com",
  "dateBirth": "2005-09-20",
  "avatar_id": 4,
  "rol": 1,
  "verificated": true
}</code></pre>
</div>
</div>
</div>
</div><div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/user</span>
</div>
<div class="api-body">
<p>Actualiza los datos principales del usuario autenticado.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Dayana Actualizada",
  "email": "daya.actualizada@example.com"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "id": 1,
  "name": "Dayana Actualizada",
  "email": "daya.actualizada@example.com"
}</code></pre>
</div>
</div>
</div>
</div><div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/logout</span>
</div>
<div class="api-body">
<p>Cierra sesión invalidando el token JWT actual.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "message": "Successfully logged out"
}</code></pre>
</div>
</div>
</div>
</div></section>
<hr class="my-5 border-secondary-subtle">
<section id="users" class="doc-section">
<h2 class="section-title"><i class="bi-people text-primary"></i>Usuarios</h2>
<p class="text-muted">Gestión de usuarios registrados en el sistema.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/users</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Usuarios.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/users</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Usuarios.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Dayana",
  "lastname": "Perez",
  "phone_number": "6521049466",
  "email": "daya@example.com",
  "password": "123456",
  "dateBirth": "2005-09-20",
  "avatar_id": 4,
  "rol": 1,
  "verificated": true
}</code></pre>

<h6 class="fw-bold mb-3 mt-4">Ejemplo alternativo</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Yuritsy",
  "lastname": "Andazola",
  "phone_number": "6521064015",
  "email": "yuri@example.com",
  "password": "123456",
  "dateBirth": "2005-09-05",
  "avatar_id": 5,
  "rol": 1,
  "verificated": true
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/users/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Usuarios por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/users/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Usuarios.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Dayana Actualizada",
  "email": "daya.actualizada@example.com",
  "password": "123456"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/users/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Usuarios.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="advertising" class="doc-section">
<h2 class="section-title"><i class="bi-badge-ad text-primary"></i>Publicidad</h2>
<p class="text-muted">Administración de anuncios publicitarios.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/advertising</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Publicidad.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/advertising</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Publicidad.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "title": "Campaña principal",
  "image": "banner.jpg",
  "link": "https://example.com",
  "start_date": "2026-04-01",
  "end_date": "2026-04-30",
  "active": true,
  "company_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/advertising/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Publicidad por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/advertising/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Publicidad.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "image": "banner_actualizado.jpg",
  "start_date": "2026-04-01",
  "end_date": "2026-05-01",
  "active": true
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/advertising/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Publicidad.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="advisor" class="doc-section">
<h2 class="section-title"><i class="bi-person-vcard text-primary"></i>Advisor</h2>
<p class="text-muted">Gestión de asesores mediante el controlador AdvisorController.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/advisor</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Advisor.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/advisor</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Advisor.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Ana",
  "lastname": "López",
  "email": "ana@example.com",
  "phone_number": "6361234567",
  "specialty": "Legal",
  "institution": "Institución A"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/advisor/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Advisor por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/advisor/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Advisor.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "email": "ana.actualizada@example.com",
  "phone_number": "6367654321"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/advisor/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Advisor.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="adviser" class="doc-section">
<h2 class="section-title"><i class="bi-person-vcard-fill text-primary"></i>Adviser</h2>
<p class="text-muted">Gestión de asesores mediante el controlador AdviserController.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/adviser</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Adviser.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/adviser</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Adviser.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Laura",
  "lastname": "Pérez",
  "email": "laura@example.com",
  "phone_number": "6362223344",
  "specialty": "Psicología",
  "institution": "Institución B"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/adviser/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Adviser por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/adviser/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Adviser.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "email": "laura.actualizada@example.com",
  "phone_number": "6369998877"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/adviser/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Adviser.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="avatar" class="doc-section">
<h2 class="section-title"><i class="bi-person-circle text-primary"></i>Avatares</h2>
<p class="text-muted">Administración de avatares disponibles para los usuarios.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/avatar</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Avatares.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/avatar</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Avatares.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Avatar 1",
  "image": "avatar1.png"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/avatar/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Avatares por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/avatar/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Avatares.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "rute": "avatars/avatar1.png"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/avatar/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Avatares.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="collaboration" class="doc-section">
<h2 class="section-title"><i class="bi-handshake text-primary"></i>Colaboraciones</h2>
<p class="text-muted">Gestión de colaboraciones registradas en la plataforma.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/collaboration</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Colaboraciones.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/collaboration</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Colaboraciones.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Colaboración Norte",
  "description": "Apoyo institucional"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/collaboration/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Colaboraciones por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/collaboration/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Colaboraciones.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "description": "Descripción actualizada de la colaboración"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/collaboration/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Colaboraciones.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="companies" class="doc-section">
<h2 class="section-title"><i class="bi-buildings text-primary"></i>Compañías</h2>
<p class="text-muted">Administración de compañías o instituciones relacionadas.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/companies</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Compañías.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/companies</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Compañías.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Empresa Ejemplo",
  "description": "Empresa colaboradora"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/companies/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Compañías por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/companies/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Compañías.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "description": "Nueva descripción",
  "phone_number": "6361234567"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/companies/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Compañías.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="complaint" class="doc-section">
<h2 class="section-title"><i class="bi-chat-left-text text-primary"></i>Quejas</h2>
<p class="text-muted">Registro y seguimiento de quejas o reportes.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/complaint</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Quejas.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/complaint</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Quejas.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "title": "Queja de prueba",
  "description": "Descripción de la queja"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/complaint/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Quejas por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/complaint/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Quejas.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "description": "Queja revisada",
  "status": "revision",
  "date": "2026-04-24"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/complaint/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Quejas.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="contact" class="doc-section">
<h2 class="section-title"><i class="bi-envelope text-primary"></i>Contacto</h2>
<p class="text-muted">Mensajes enviados por usuarios desde el formulario de contacto.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/contact</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Contacto.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/contact</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Contacto.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "María",
  "email": "maria@example.com",
  "message": "Necesito información"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/contact/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Contacto por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/contact/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Contacto.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "message": "Mensaje respondido",
  "status": "answered"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/contact/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Contacto.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="emergencycontact" class="doc-section">
<h2 class="section-title"><i class="bi-telephone-plus text-primary"></i>Contactos de emergencia</h2>
<p class="text-muted">Administración de contactos de emergencia.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/emergencyContact</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Contactos de emergencia.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/emergencyContact</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Contactos de emergencia.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Carlos",
  "phone": "6361234567"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/emergencyContact/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Contactos de emergencia por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/emergencyContact/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Contactos de emergencia.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Carlos Ruiz",
  "phone_number": "6361234567",
  "relationship": "Hermano"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/emergencyContact/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Contactos de emergencia.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="evidence" class="doc-section">
<h2 class="section-title"><i class="bi-folder-check text-primary"></i>Evidencias</h2>
<p class="text-muted">Registro de evidencias asociadas a casos o reportes.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/evidence</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Evidencias.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/evidence</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Evidencias.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "title": "Evidencia 1",
  "description": "Descripción de evidencia"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/evidence/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Evidencias por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/evidence/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Evidencias.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "title": "Evidencia actualizada",
  "description": "Descripción actualizada"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/evidence/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Evidencias.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="evidencefile" class="doc-section">
<h2 class="section-title"><i class="bi-file-earmark-arrow-up text-primary"></i>Archivos de evidencia</h2>
<p class="text-muted">Gestión de archivos relacionados con evidencias.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/evidenceFile</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Archivos de evidencia.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/evidenceFile</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Archivos de evidencia.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "title": "Archivo evidencia",
  "file_path": "evidencias/archivo.pdf"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/evidenceFile/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Archivos de evidencia por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/evidenceFile/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Archivos de evidencia.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "rute": "evidencias/archivo_actualizado.pdf",
  "description": "Archivo actualizado"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/evidenceFile/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Archivos de evidencia.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="genderverification" class="doc-section">
<h2 class="section-title"><i class="bi-shield-check text-primary"></i>Verificación de género</h2>
<p class="text-muted">Gestión de verificaciones de género.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/genderVerification</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Verificación de género.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/genderVerification</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Verificación de género.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "name": "Solicitud 1",
  "result": "pendiente"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/genderVerification/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Verificación de género por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/genderVerification/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Verificación de género.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "state": "aprobada",
  "notes": "Verificación aprobada"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/genderVerification/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Verificación de género.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="laws" class="doc-section">
<h2 class="section-title"><i class="bi-journal-text text-primary"></i>Leyes</h2>
<p class="text-muted">Administración de leyes o información legal.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/laws</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Leyes.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/laws</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Leyes.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "title": "Ley de ejemplo",
  "description": "Descripción de la ley"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/laws/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Leyes por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/laws/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Leyes.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "description": "Descripción actualizada",
  "state": "Chihuahua"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/laws/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Leyes.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="new" class="doc-section">
<h2 class="section-title"><i class="bi-newspaper text-primary"></i>Noticias</h2>
<p class="text-muted">Gestión de noticias publicadas en la plataforma.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/new</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Noticias.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/new</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Noticias.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "title": "Nueva noticia",
  "content": "Contenido de la noticia"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/new/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Noticias por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/new/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Noticias.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "img": "noticia.jpg"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/new/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Noticias.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="payment" class="doc-section">
<h2 class="section-title"><i class="bi-credit-card text-primary"></i>Pagos</h2>
<p class="text-muted">Administración de pagos registrados.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/payment</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Pagos.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/payment</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Pagos.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "amount": 250.00,
  "method": "tarjeta"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/payment/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Pagos por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/payment/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Pagos.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "cost": 250.00,
  "payment_method": "tarjeta",
  "status": "completed"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/payment/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Pagos.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="record" class="doc-section">
<h2 class="section-title"><i class="bi-clipboard-data text-primary"></i>Registros</h2>
<p class="text-muted">Gestión de registros o historial de acciones.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/record</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Registros.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/record</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Registros.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "title": "Registro inicial",
  "description": "Descripción del registro"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/record/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Registros por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/record/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Registros.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "action": "Actualización",
  "description": "Descripción actualizada del registro"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/record/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Registros.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="seguimientocaso" class="doc-section">
<h2 class="section-title"><i class="bi-kanban text-primary"></i>Seguimiento de casos</h2>
<p class="text-muted">Control del seguimiento de casos registrados.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/seguimientoCaso</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Seguimiento de casos.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/seguimientoCaso</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Seguimiento de casos.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "case_id": 1,
  "status": "in_process",
  "notes": "Caso en revisión"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/seguimientoCaso/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Seguimiento de casos por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/seguimientoCaso/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Seguimiento de casos.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "status": "resolved",
  "comments": "Caso resuelto correctamente"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/seguimientoCaso/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Seguimiento de casos.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="testimonials" class="doc-section">
<h2 class="section-title"><i class="bi-chat-quote text-primary"></i>Testimonios</h2>
<p class="text-muted">Administración de testimonios de usuarios.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/testimonials</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Testimonios.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/testimonials</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Testimonios.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "author": "Sofía",
  "content": "Excelente servicio"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/testimonials/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Testimonios por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/testimonials/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Testimonios.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "content": "Testimonio actualizado"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/testimonials/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Testimonios.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="verification" class="doc-section">
<h2 class="section-title"><i class="bi-patch-check text-primary"></i>Verificaciones</h2>
<p class="text-muted">Gestión de verificaciones de usuarios.</p>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/verification</span>
</div>
<div class="api-body">
<p>Lista todos los registros del recurso Verificaciones.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": [
    {
      "id": 1
    }
  ],
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-post">POST</span>
<span class="api-endpoint">/api/verification</span>
</div>
<div class="api-body">
<p>Crea un nuevo registro en Verificaciones.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "user_id": 1,
  "status": "pendiente"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-get">GET</span>
<span class="api-endpoint">/api/verification/{id}</span>
</div>
<div class="api-body">
<p>Obtiene un registro específico de Verificaciones por su ID.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-put">PUT</span>
<span class="api-endpoint">/api/verification/{id}</span>
</div>
<div class="api-body">
<p>Actualiza un registro existente de Verificaciones.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">
<div class="col-md-6">
<h6 class="fw-bold mb-3">Request Body</h6>
<div class="code-block-header">JSON Payload</div>
<pre><code class="language-json">{
  "state": "aprobada",
  "date_verification": "2026-04-24"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1
  },
  "status": "success"
}</code></pre>
</div>
</div>
</div>
</div>
<div class="api-card">
<div class="api-header">
<span class="badge-method badge-delete">DELETE</span>
<span class="api-endpoint">/api/verification/{id}</span>
</div>
<div class="api-body">
<p>Elimina un registro existente de Verificaciones.</p>
<p class="small text-muted"><i class="bi bi-lock-fill"></i> Requiere: <code>Bearer Token</code></p>
<div class="row mt-4">

<div class="col-md-12">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "status": "success",
  "message": "Registro eliminado correctamente"
}</code></pre>
</div>
</div>
</div>
</div>
</section>
<hr class="my-5 border-secondary-subtle">
<section id="errors" class="doc-section">
<h2 class="section-title"><i class="bi bi-exclamation-triangle-fill text-secondary"></i>Formatos de Error</h2>
<div class="api-card"><div class="api-header"><span class="fw-bold">Errores comunes</span></div><div class="api-body">
<p>Cuando ocurre un error de validación, Laravel responde con código <strong>422 Unprocessable Entity</strong>.</p>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "message": "The given data was invalid.",
  "errors": {
    "email": [
      "The email field is required."
    ]
  }
}</code></pre>
<p class="mt-4">Cuando un registro no existe, los controladores devuelven normalmente un código <strong>404 Not Found</strong>.</p>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "message": "Registro no encontrado",
  "status": "error"
}</code></pre>
</div></div>
</section>
<footer class="mt-5 py-4 border-top text-center text-muted small">&copy; {{ date('Y') }} API System. Todos los derechos reservados.</footer>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded',function(){const sections=document.querySelectorAll('.doc-section');const navLinks=document.querySelectorAll('.nav-link');window.addEventListener('scroll',()=>{let current='';sections.forEach(section=>{const sectionTop=section.offsetTop;if(pageYOffset>=sectionTop-120){current=section.getAttribute('id');}});navLinks.forEach(link=>{link.classList.remove('active');if(link.getAttribute('href').includes(current)){link.classList.add('active');}});});});
</script>
</body>
</html>
