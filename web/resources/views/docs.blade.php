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
      "id": 1,
      "name": "Paola",
      "lastname": "Griego",
      "email": "paola.griego@gmail.com",
      "email_verified_at": null,
      "phone_number": "6361346901",
      "dateBirth": "2005-08-17",
      "avatar_id": 1,
      "rol": "user",
      "verificated": 0,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": null
    },
    {
      "id": 2,
      "name": "Mittsy",
      "lastname": "Andazola",
      "email": "mittsyyy@gmail.com",
      "email_verified_at": null,
      "phone_number": "6521048807",
      "dateBirth": "2005-09-05",
      "avatar_id": 2,
      "rol": "admin",
      "verificated": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "name": "Dayana",
      "lastname": "Olivas",
      "email": "daya@gmail.com",
      "email_verified_at": null,
      "phone_number": "6361234567",
      "dateBirth": "2005-01-01",
      "avatar_id": 1,
      "rol": "user",
      "verificated": 0,
      "created_at": "2026-04-26T19:57:47.000000Z",
      "updated_at": "2026-04-26T19:57:47.000000Z"
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
  "rol": "user",
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
    "name": "Dayana",
    "lastname": "Perez",
    "phone_number": "6521049466",
    "email": "dayaaa@gmail.com",
    "dateBirth": "2005-09-20",
    "avatar_id": 4,
    "rol": "user",
    "verificated": true,
    "updated_at": "2026-04-26T20:11:35.000000Z",
    "created_at": "2026-04-26T20:11:35.000000Z",
    "id": 5
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
    "id": 1,
    "name": "Paola",
    "lastname": "Griego",
    "email": "paola.griego@gmail.com",
    "email_verified_at": null,
    "phone_number": "6361346901",
    "dateBirth": "2005-08-17",
    "avatar_id": 1,
    "rol": "user",
    "verificated": 0,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": null
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
    "id": 3,
    "name": "Dayana Actualizada",
    "lastname": "Olivas",
    "email": "daya.actualizada@example.com",
    "email_verified_at": null,
    "phone_number": "6361234567",
    "dateBirth": "2005-01-01",
    "avatar_id": 1,
    "rol": "user",
    "verificated": 0,
    "created_at": "2026-04-26T19:57:47.000000Z",
    "updated_at": "2026-04-26T20:15:18.000000Z"
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
      "id": 1,
      "title": "Campaña Contra la Violencia",
      "image": "default2.jpg",
      "link": "default",
      "start_date": "2026-03-01",
      "end_date": "2026-04-01",
      "active": 1,
      "company_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "title": "Apoyo para Mujeres",
      "image": "default3.jpg",
      "link": "default",
      "start_date": "2026-03-10",
      "end_date": "2026-05-10",
      "active": 1,
      "company_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "title": "Campaña Contra la Violencia",
      "image": "default2.jpg",
      "link": "default",
      "start_date": "2026-03-01",
      "end_date": "2026-04-01",
      "active": 1,
      "company_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "title": "Apoyo para Mujeres",
      "image": "default3.jpg",
      "link": "default",
      "start_date": "2026-03-10",
      "end_date": "2026-05-10",
      "active": 1,
      "company_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "title": "Campaña principal",
    "image": "banner.jpg",
    "link": "https://example.com",
    "start_date": "2026-04-01",
    "end_date": "2026-04-30",
    "active": true,
    "company_id": 1,
    "updated_at": "2026-04-26T20:17:29.000000Z",
    "created_at": "2026-04-26T20:17:29.000000Z",
    "id": 5
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
    "id": 1,
    "title": "Campaña Contra la Violencia",
    "image": "default2.jpg",
    "link": "default",
    "start_date": "2026-03-01",
    "end_date": "2026-04-01",
    "active": 1,
    "company_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "id": 1,
    "title": "Campaña Contra la Violencia",
    "image": "banner_actualizado.jpg",
    "link": "default",
    "start_date": "2026-04-01",
    "end_date": "2026-05-01",
    "active": true,
    "company_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T20:19:39.000000Z"
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
      "id": 1,
      "name": "Laura",
      "lastname": "Martínez",
      "email": "laura.martinez@gmail.com",
      "phone_number": "6361234567",
      "specialty": "Psicología",
      "institution": "Centro de Atención a la Mujer",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 2,
      "name": "Daniela",
      "lastname": "Ramírez",
      "email": "daniela.ramirez@gmail.com",
      "phone_number": "6369876543",
      "specialty": "Trabajo Social",
      "institution": "Instituto Chihuahuense de la Mujer",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 3,
      "name": "Laura",
      "lastname": "Gonzalez",
      "email": "laura@gmail.com",
      "phone_number": "6561234567",
      "specialty": "Psicologia",
      "institution": "Centro de Apoyo a la Mujer",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 4,
      "name": "Mariana",
      "lastname": "Lopez",
      "email": "mariana@gmail.com",
      "phone_number": "6569876543",
      "specialty": "Derecho Familiar",
      "institution": "Instituto de la Mujer",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
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
    "name": "Ana",
    "lastname": "López",
    "email": "ana@example.com",
    "phone_number": "6361234567",
    "specialty": "Legal",
    "institution": "Institución A",
    "updated_at": "2026-04-26T20:24:14.000000Z",
    "created_at": "2026-04-26T20:24:14.000000Z",
    "id": 5
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
    "id": 1,
    "name": "Laura",
    "lastname": "Martínez",
    "email": "laura.martinez@gmail.com",
    "phone_number": "6361234567",
    "specialty": "Psicología",
    "institution": "Centro de Atención a la Mujer",
    "created_at": "2026-04-26T19:45:00.000000Z",
    "updated_at": "2026-04-26T19:45:00.000000Z"
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
    "id": 3,
    "name": "Laura",
    "lastname": "Gonzalez",
    "email": "ana.actualizada@example.com",
    "phone_number": "6367654321",
    "specialty": "Psicologia",
    "institution": "Centro de Apoyo a la Mujer",
    "created_at": "2026-04-26T19:45:00.000000Z",
    "updated_at": "2026-04-26T20:25:22.000000Z"
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
      "id": 1,
      "name": "Laura",
      "lastname": "Martínez",
      "email": "laura.martinez@gmail.com",
      "phone_number": "6361234567",
      "specialty": "Psicología",
      "institution": "Centro de Atención a la Mujer",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 2,
      "name": "Daniela",
      "lastname": "Ramírez",
      "email": "daniela.ramirez@gmail.com",
      "phone_number": "6369876543",
      "specialty": "Trabajo Social",
      "institution": "Instituto Chihuahuense de la Mujer",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 3,
      "name": "Laura",
      "lastname": "Gonzalez",
      "email": "ana.actualizada@example.com",
      "phone_number": "6367654321",
      "specialty": "Psicologia",
      "institution": "Centro de Apoyo a la Mujer",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T20:25:22.000000Z"
    },
    {
      "id": 4,
      "name": "Mariana",
      "lastname": "Lopez",
      "email": "mariana@gmail.com",
      "phone_number": "6569876543",
      "specialty": "Derecho Familiar",
      "institution": "Instituto de la Mujer",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 5,
      "name": "Ana",
      "lastname": "López",
      "email": "ana@example.com",
      "phone_number": "6361234567",
      "specialty": "Legal",
      "institution": "Institución A",
      "created_at": "2026-04-26T20:24:14.000000Z",
      "updated_at": "2026-04-26T20:24:14.000000Z"
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
    "name": "Laura",
    "lastname": "Pérez",
    "email": "laura@example.com",
    "phone_number": "6362223344",
    "specialty": "Psicología",
    "institution": "Institución B",
    "updated_at": "2026-04-26T20:26:35.000000Z",
    "created_at": "2026-04-26T20:26:35.000000Z",
    "id": 6
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
    "id": 6,
    "name": "Laura",
    "lastname": "Pérez",
    "email": "laura@example.com",
    "phone_number": "6362223344",
    "specialty": "Psicología",
    "institution": "Institución B",
    "created_at": "2026-04-26T20:26:35.000000Z",
    "updated_at": "2026-04-26T20:26:35.000000Z"
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
    "id": 6,
    "name": "Laura",
    "lastname": "Pérez",
    "email": "laura.actualizada@example.com",
    "phone_number": "6369998877",
    "specialty": "Psicología",
    "institution": "Institución B",
    "created_at": "2026-04-26T20:26:35.000000Z",
    "updated_at": "2026-04-26T20:27:21.000000Z"
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
      "id": 1,
      "rute": "default.png",
      "created_at": null,
      "updated_at": null
    },
    {
      "id": 2,
      "rute": "default1.png",
      "created_at": null,
      "updated_at": null
    },
    {
      "id": 3,
      "rute": "default.png",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 4,
      "rute": "default3.png",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 5,
      "rute": "default4.png",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
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
   "rute": "default.png"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "rute": "default.png",
    "updated_at": "2026-04-26T20:32:07.000000Z",
    "created_at": "2026-04-26T20:32:07.000000Z",
    "id": 6
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
    "id": 1,
    "rute": "default.png",
    "created_at": null,
    "updated_at": null
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
  "rute": "avataractualizado.png"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
   "data": {
    "id": 1,
    "rute": "avataractualizado.png",
    "created_at": null,
    "updated_at": "2026-04-26T20:33:50.000000Z"
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
      "id": 1,
      "type": "Voluntariado",
      "description": "Apoyo en talleres de prevención de violencia de género y acompañamiento a mujeres en situación de riesgo.",
      "user_id": 1,
      "company_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "type": "Donación",
      "description": "Donación de recursos para programas de apoyo psicológico y asesoría legal para mujeres.",
      "user_id": 2,
      "company_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "type": "Legal",
      "description": "Apoyo juridico a victimas",
      "user_id": 1,
      "company_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "type": "Psicologico",
      "description": "Terapia emocional",
      "user_id": 1,
      "company_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
   "type": "Donación",
  "description": "Donación de recursos para programas de apoyo psicológico y asesoría legal para mujeres.",
  "user_id": 2,
  "company_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "type": "Donación",
    "description": "Donación de recursos para programas de apoyo psicológico y asesoría legal para mujeres.",
    "user_id": 2,
    "company_id": 1,
    "updated_at": "2026-04-26T20:38:05.000000Z",
    "created_at": "2026-04-26T20:38:05.000000Z",
    "id": 5
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
    "id": 2,
    "type": "Donación",
    "description": "Donación de recursos para programas de apoyo psicológico y asesoría legal para mujeres.",
    "user_id": 2,
    "company_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "id": 2,
    "type": "Donación",
    "description": "Descripción actualizada de la colaboración",
    "user_id": 2,
    "company_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T20:39:24.000000Z"
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
      "id": 1,
      "name": "Equoria",
      "description": "Organización dedicada a la prevención de la violencia contra las mujeres y a brindar apoyo psicológico y legal.",
      "logo": "equoria_logo.png",
      "email": "contacto@equoria.org",
      "phone_number": "6361234589",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 2,
      "name": "Centro de Apoyo Mujer Segura",
      "description": "Institución enfocada en ofrecer refugio, orientación legal y atención psicológica a mujeres en situación de violencia.",
      "logo": "mujer_segura_logo.png",
      "email": "info@mujersegura.org",
      "phone_number": "6369874521",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 3,
      "name": "Instituto de la Mujer",
      "description": "Apoyo legal y psicologico",
      "logo": "logos/imujer.png",
      "email": "contacto@imujer.com",
      "phone_number": "6561111111",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 4,
      "name": "Fiscalia de la Mujer",
      "description": "Atencion a victimas",
      "logo": "logos/fiscalia.png",
      "email": "fiscalia@gmail.com",
      "phone_number": "6562222222",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
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
 "name": "Equoria",
  "description": "Organización dedicada a la prevención de la violencia contra las mujeres y a brindar apoyo psicológico y legal.",
  "logo": "equoria_logo.png",
  "email": "contact@equoria.org",
  "phone_number": "6361234589"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "name": "Equoria",
    "description": "Organización dedicada a la prevención de la violencia contra las mujeres y a brindar apoyo psicológico y legal.",
    "logo": "equoria_logo.png",
    "email": "contact@equoria.org",
    "phone_number": "6361234589",
    "updated_at": "2026-04-26T20:44:38.000000Z",
    "created_at": "2026-04-26T20:44:38.000000Z",
    "id": 5
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
    "id": 1,
    "name": "Equoria",
    "description": "Organización dedicada a la prevención de la violencia contra las mujeres y a brindar apoyo psicológico y legal.",
    "logo": "equoria_logo.png",
    "email": "contacto@equoria.org",
    "phone_number": "6361234589",
    "created_at": "2026-04-26T19:45:00.000000Z",
    "updated_at": "2026-04-26T19:45:00.000000Z"
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
    "id": 1,
    "name": "Equoria",
    "description": "Nueva descripción",
    "logo": "equoria_logo.png",
    "email": "contacto@equoria.org",
    "phone_number": "6361234567",
    "created_at": "2026-04-26T19:45:00.000000Z",
    "updated_at": "2026-04-26T20:46:44.000000Z"
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
      "id": 1,
      "title": "Agresión física en vía pública",
      "description": "Se reporta una agresión física hacia una mujer ocurrida cerca de una parada de autobús. Vecinos del lugar solicitaron apoyo.",
      "type": "Física",
      "status": "pendiente",
      "lat": "28.64",
      "lng": "-106.09",
      "date": "2026-03-12",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "title": "Acoso digital en redes sociales",
      "description": "La víctima reporta recibir mensajes ofensivos y amenazas a través de redes sociales por parte de su expareja.",
      "type": "Digital",
      "status": "revision",
      "lat": "31.69",
      "lng": "-106.42",
      "date": "2026-03-11",
      "user_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "title": "Violencia familiar",
      "description": "Problemas en casa",
      "type": "violencia",
      "status": "pendiente",
      "lat": "31.69",
      "lng": "-106.42",
      "date": "2026-03-01",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "title": "Acoso laboral",
      "description": "Problemas en el trabajo",
      "type": "acoso",
      "status": "revision",
      "lat": "31.70",
      "lng": "-106.42",
      "date": "2026-03-02",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
 "title": "Agresión física en vía pública",
  "description": "Se reporta una agresión física hacia una mujer ocurrida cerca de una parada de autobús. Vecinos del lugar solicitaron apoyo.",
  "type": "Física",
  "status": "pendiente",
  "lat": 28.6353,
  "lng": -106.0889,
  "date": "2026-03-12",
  "user_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
   "data": {
    "title": "Agresión física en vía pública",
    "description": "Se reporta una agresión física hacia una mujer ocurrida cerca de una parada de autobús. Vecinos del lugar solicitaron apoyo.",
    "type": "Física",
    "status": "pendiente",
    "lat": 28.6353,
    "lng": -106.0889,
    "date": "2026-03-12",
    "user_id": 1,
    "updated_at": "2026-04-26T20:50:16.000000Z",
    "created_at": "2026-04-26T20:50:16.000000Z",
    "id": 6
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
    "id": 1,
    "title": "Agresión física en vía pública",
    "description": "Se reporta una agresión física hacia una mujer ocurrida cerca de una parada de autobús. Vecinos del lugar solicitaron apoyo.",
    "type": "Física",
    "status": "pendiente",
    "lat": "28.64",
    "lng": "-106.09",
    "date": "2026-03-12",
    "user_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "id": 1,
    "title": "Agresión física en vía pública",
    "description": "Queja revisada",
    "type": "Física",
    "status": "revision",
    "lat": "28.64",
    "lng": "-106.09",
    "date": "2026-04-24",
    "user_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T20:54:23.000000Z"
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
      "id": 1,
      "name": "María López",
      "email": "marialopez@gmail.com",
      "message": "Quisiera recibir información sobre los talleres de apoyo para mujeres que ofrecen en su organización.",
      "status": "new",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 2,
      "name": "Ana Rodríguez",
      "email": "anarodriguez@gmail.com",
      "message": "Necesito orientación sobre cómo denunciar un caso de violencia psicológica. ¿Podrían ayudarme?",
      "status": "answered",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 3,
      "name": "Ana",
      "email": "ana@gmail.com",
      "message": "Necesito ayuda",
      "status": "new",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 4,
      "name": "Luisa",
      "email": "luisa@gmail.com",
      "message": "Informacion legal",
      "status": "answered",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
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
    "name": "María",
    "email": "maria@example.com",
    "message": "Necesito información",
    "updated_at": "2026-04-26T20:55:47.000000Z",
    "created_at": "2026-04-26T20:55:47.000000Z",
    "id": 5
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
    "id": 1,
    "name": "María López",
    "email": "marialopez@gmail.com",
    "message": "Quisiera recibir información sobre los talleres de apoyo para mujeres que ofrecen en su organización.",
    "status": "new",
    "created_at": "2026-04-26T19:45:00.000000Z",
    "updated_at": "2026-04-26T19:45:00.000000Z"
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
    "id": 1,
    "name": "María López",
    "email": "marialopez@gmail.com",
    "message": "Mensaje respondido",
    "status": "answered",
    "created_at": "2026-04-26T19:45:00.000000Z",
    "updated_at": "2026-04-26T20:57:16.000000Z"
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
      "id": 1,
      "name": "Rosa",
      "lastname": "Martínez",
      "phone_number": "6365551234",
      "relation": "Madre",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "name": "Carlos",
      "lastname": "Hernández",
      "phone_number": "6365559876",
      "relation": "Hermano",
      "user_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "name": "Maria",
      "lastname": "Lopez",
      "phone_number": "6563333333",
      "relation": "Madre",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "name": "Jose",
      "lastname": "Perez",
      "phone_number": "6564444444",
      "relation": "Hermano",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "name": "Rosa",
  "lastname": "Martínez",
  "phone_number": "6365551234",
  "relation": "Madre",
  "user_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
   "data": {
    "name": "Rosa",
    "lastname": "Martínez",
    "phone_number": "6365551234",
    "relation": "Madre",
    "user_id": 1,
    "updated_at": "2026-04-26T21:02:45.000000Z",
    "created_at": "2026-04-26T21:02:45.000000Z",
    "id": 5
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
    "id": 1,
    "name": "Rosa",
    "lastname": "Martínez",
    "phone_number": "6365551234",
    "relation": "Madre",
    "user_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "relation": "Hermano"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1,
    "name": "Carlos Ruiz",
    "lastname": "Martínez",
    "phone_number": "6361234567",
    "relation": "Hermano",
    "user_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T21:44:30.000000Z"
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
      "id": 1,
      "file_type": "img",
      "complaint_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "file_type": "document",
      "complaint_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "file_type": "img",
      "complaint_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "file_type": "record",
      "complaint_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "file_type": "img",
  "complaint_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
"data": {
    "file_type": "img",
    "complaint_id": 1,
    "updated_at": "2026-04-26T21:48:27.000000Z",
    "created_at": "2026-04-26T21:48:27.000000Z",
    "id": 5
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
    "id": 1,
    "file_type": "img",
    "complaint_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
      "id": 1,
      "rute": "default4.jpg",
      "description": "Fotografía tomada en el lugar de los hechos donde se observa el daño causado.",
      "evidences_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "rute": "default5.png",
      "description": "Captura de pantalla de mensajes enviados por el agresor a través de redes sociales.",
      "evidences_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "rute": "img1.jpg",
      "description": "Foto evidencia",
      "evidences_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "rute": "img2.jpg",
      "description": "Foto evidencia",
      "evidences_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "rute": "default4.jpg",
  "description": "Fotografía tomada en el lugar de los hechos donde se observa el daño causado.",
  "evidences_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "rute": "default4.jpg",
    "description": "Fotografía tomada en el lugar de los hechos donde se observa el daño causado.",
    "evidences_id": 1,
    "updated_at": "2026-04-26T21:53:17.000000Z",
    "created_at": "2026-04-26T21:53:17.000000Z",
    "id": 5
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
    "id": 1,
    "rute": "default4.jpg",
    "description": "Fotografía tomada en el lugar de los hechos donde se observa el daño causado.",
    "evidences_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "id": 1,
    "rute": "evidencias/archivo_actualizado.pdf",
    "description": "Archivo actualizado",
    "evidences_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T21:54:35.000000Z"
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
  "user_id": 1,
  "document_path": "archivos/ine_frente_01.jpg",
  "document_type": "INE"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
   "data": {
    "user_id": 1,
    "document_path": "archivos/ine_frente_01.jpg",
    "document_type": "INE",
    "updated_at": "2026-04-26T22:02:59.000000Z",
    "created_at": "2026-04-26T22:02:59.000000Z",
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
    "id": 1,
    "user_id": 1,
    "document_path": "archivos/ine_frente_01.jpg",
    "document_type": "INE",
    "state": "pendiente",
    "notes": null,
    "created_at": "2026-04-26T22:02:59.000000Z",
    "updated_at": "2026-04-26T22:02:59.000000Z"
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
    "id": 1,
    "user_id": 1,
    "document_path": "archivos/ine_frente_01.jpg",
    "document_type": "INE",
    "state": "aprobada",
    "notes": "Verificación aprobada",
    "created_at": "2026-04-26T22:02:59.000000Z",
    "updated_at": "2026-04-26T22:04:19.000000Z"
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
      "id": 1,
      "title": "Ley General de Acceso de las Mujeres a una Vida Libre de Violencia",
      "description": "Ley que establece los mecanismos para prevenir, sancionar y erradicar la violencia contra las mujeres en México.",
      "state": "Federal",
      "url": "https://www.diputados.gob.mx/LeyesBiblio/pdf/LGAMVLV.pdf",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 2,
      "title": "Ley Estatal del Derecho de las Mujeres a una Vida Libre de Violencia",
      "description": "Normativa del estado de Chihuahua que protege a las mujeres contra cualquier tipo de violencia y promueve la igualdad.",
      "state": "Chihuahua",
      "url": "https://www.congresochihuahua2.gob.mx/biblioteca/leyes/archivosLeyes/1050.pdf",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 3,
      "title": "NOM-046-SSA2-2005: Violencia Familiar, Sexual y Género",
      "description": "Norma Oficial Mexicana que establece los criterios para la detección, prevención, atención médica y la orientación a las personas que se encuentren involucradas en situaciones de violencia familiar o sexual.",
      "state": "Federal",
      "url": "https://www.dof.gob.mx/normasOficiales/3623/salud16_C/salud16_C.htm",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
    },
    {
      "id": 4,
      "title": "Código Penal Federal — Art. 325 (Feminicidio)",
      "description": "Artículo del Código Penal Federal que tipifica el feminicidio como delito y establece las sanciones correspondientes.",
      "state": "Federal",
      "url": "https://www.diputados.gob.mx/LeyesBiblio/pdf/CPF.pdf",
      "created_at": "2026-04-26T19:45:00.000000Z",
      "updated_at": "2026-04-26T19:45:00.000000Z"
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
  "title": "Ley Olimpia",
  "description": "Conjunto de reformas legislativas encaminadas a reconocer la violencia digital y sancionar los delitos que violen la intimidad sexual de las personas a través de medios digitales.",
  "state": "Nacional",
  "url": "https://www.gob.mx/sep/articulos/ley-olimpia"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
    "data": {
    "title": "Ley Olimpia",
    "description": "Conjunto de reformas legislativas encaminadas a reconocer la violencia digital y sancionar los delitos que violen la intimidad sexual de las personas a través de medios digitales.",
    "state": "Nacional",
    "url": "https://www.gob.mx/sep/articulos/ley-olimpia",
    "updated_at": "2026-04-26T22:07:38.000000Z",
    "created_at": "2026-04-26T22:07:38.000000Z",
    "id": 5
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
    "id": 1,
    "title": "Ley General de Acceso de las Mujeres a una Vida Libre de Violencia",
    "description": "Ley que establece los mecanismos para prevenir, sancionar y erradicar la violencia contra las mujeres en México.",
    "state": "Federal",
    "url": "https://www.diputados.gob.mx/LeyesBiblio/pdf/LGAMVLV.pdf",
    "created_at": "2026-04-26T19:45:00.000000Z",
    "updated_at": "2026-04-26T19:45:00.000000Z"
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
    "id": 1,
    "title": "Ley General de Acceso de las Mujeres a una Vida Libre de Violencia",
    "description": "Descripción actualizada",
    "state": "Chihuahua",
    "url": "https://www.diputados.gob.mx/LeyesBiblio/pdf/LGAMVLV.pdf",
    "created_at": "2026-04-26T19:45:00.000000Z",
    "updated_at": "2026-04-26T22:12:21.000000Z"
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
      "id": 1,
      "title": "Chihuahua refuerza protocolo de atención a víctimas",
      "content": "Autoridades estatales anunciaron nuevas medidas para mejorar la atención a mujeres víctimas de violencia, incluyendo mayor capacitación para personal de seguridad y apoyo psicológico gratuito.",
      "img": "default6.jpg",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "title": "Campaña #NoEstasSola impulsa apoyo a mujeres",
      "content": "Organizaciones civiles lanzaron la campaña #NoEstasSola para fomentar la denuncia y brindar acompañamiento a mujeres que enfrentan situaciones de violencia en diferentes estados del país.",
      "img": "default.jpg",
      "user_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "title": "Nueva campaña",
      "content": "Apoyo a mujeres",
      "img": "default.jpg",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "title": "Nuevo refugio",
      "content": "Refugio abierto",
      "img": "default.jpg",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "title": "Nueva ley de protección",
  "content": "Se ha aprobado una nueva ley para la protección de datos.",
  "img": "imagen.jpg",
  "user_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
    "data": {
    "title": "Nueva ley de protección",
    "content": "Se ha aprobado una nueva ley para la protección de datos.",
    "img": "imagen.jpg",
    "user_id": 1,
    "updated_at": "2026-04-26T22:16:05.000000Z",
    "created_at": "2026-04-26T22:16:05.000000Z",
    "id": 5
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
    "id": 4,
    "title": "Nuevo refugio",
    "content": "Refugio abierto",
    "img": "default.jpg",
    "user_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "id": 4,
    "title": "Nuevo refugio",
    "content": "Refugio abierto",
    "img": "noticia.jpg",
    "user_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T22:16:55.000000Z"
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
      "id": 1,
      "cost": "1800.00",
      "payment_method": "Mastercard",
      "payment_reference": "VER-415646",
      "status": "completed",
      "payment_date": "2026-03-01",
      "verification_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "cost": "2500.00",
      "payment_method": "Transferencia",
      "payment_reference": "VER-126749",
      "status": "in_process",
      "payment_date": "2026-03-10",
      "verification_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "cost": "100.00",
      "payment_method": "card",
      "payment_reference": "ABC123",
      "status": "completed",
      "payment_date": "2026-03-07",
      "verification_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "cost": "200.00",
      "payment_method": "cash",
      "payment_reference": "XYZ456",
      "status": "in_process",
      "payment_date": "2026-03-08",
      "verification_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "cost": 199.99,
  "payment_method": "tarjeta",
  "payment_reference": "ABC123456",
  "status": "in_process",
  "payment_date": "2026-04-26",
  "verification_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
"data": {
    "cost": 199.99,
    "payment_method": "tarjeta",
    "payment_reference": "ABC123456",
    "status": "in_process",
    "payment_date": "2026-04-26",
    "verification_id": 1,
    "updated_at": "2026-04-26T22:20:21.000000Z",
    "created_at": "2026-04-26T22:20:21.000000Z",
    "id": 5
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
    "id": 3,
    "cost": "100.00",
    "payment_method": "card",
    "payment_reference": "ABC123",
    "status": "completed",
    "payment_date": "2026-03-07",
    "verification_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "payment_method": "card",
  "status": "completed"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 3,
    "cost": 250,
    "payment_method": "card",
    "payment_reference": "ABC123",
    "status": "completed",
    "payment_date": "2026-03-07",
    "verification_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T22:21:55.000000Z"
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
      "id": 1,
      "action": "Creación de denuncia",
      "description": "La usuaria registró una nueva denuncia por violencia psicológica en la plataforma.",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "action": "Actualización de perfil",
      "description": "La usuaria actualizó su información personal y agregó un contacto de emergencia.",
      "user_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "action": "login",
      "description": "Usuario entro",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "action": "create",
      "description": "Creo denuncia",
      "user_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
 "action": "Creación de usuario",
  "description": "Se registró un nuevo usuario en el sistema",
  "user_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
   "data": {
    "action": "Creación de usuario",
    "description": "Se registró un nuevo usuario en el sistema",
    "user_id": 1,
    "updated_at": "2026-04-26T22:24:38.000000Z",
    "created_at": "2026-04-26T22:24:38.000000Z",
    "id": 5
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
    "id": 2,
    "action": "Actualización de perfil",
    "description": "La usuaria actualizó su información personal y agregó un contacto de emergencia.",
    "user_id": 2,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "id": 2,
    "action": "Actualización",
    "description": "Descripción actualizada del registro",
    "user_id": 2,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T22:25:30.000000Z"
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
      "id": 1,
      "status": "in_process",
      "coments": "El caso se está revisando, se contactará al usuario pronto.",
      "complaint_id": 1,
      "testimonial_id": 1,
      "advisor_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "status": "open",
      "coments": "Se ha abierto el caso y se asignó un asesor para seguimiento.",
      "complaint_id": 2,
      "testimonial_id": 2,
      "advisor_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "status": "open",
      "coments": "En proceso",
      "complaint_id": 1,
      "testimonial_id": 1,
      "advisor_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "status": "in_process",
      "coments": "Revisando",
      "complaint_id": 2,
      "testimonial_id": 2,
      "advisor_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "status": "in_process",
  "coments": "El caso sigue en revisión",
  "complaint_id": 1,
  "testimonial_id": 2,
  "advisor_id": 3
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
   "data": {
    "status": "in_process",
    "coments": "El caso sigue en revisión",
    "complaint_id": 1,
    "testimonial_id": 2,
    "advisor_id": 3,
    "updated_at": "2026-04-26T22:34:41.000000Z",
    "created_at": "2026-04-26T22:34:41.000000Z",
    "id": 5
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
    "id": 2,
    "status": "open",
    "coments": "Se ha abierto el caso y se asignó un asesor para seguimiento.",
    "complaint_id": 2,
    "testimonial_id": 2,
    "advisor_id": 2,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "status": "close",
  "coments": "Caso resuelto correctamente"
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1,
    "status": "close",
    "coments": "Caso resuelto correctamente",
    "complaint_id": 1,
    "testimonial_id": 1,
    "advisor_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T22:39:00.000000Z"
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
      "id": 1,
      "content": "Me siento satisfecho con la atención brindada.",
      "anonymous": 0,
      "user_id": 1,
      "complaint_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "content": "El seguimiento fue rápido y profesional.",
      "anonymous": 1,
      "user_id": 2,
      "complaint_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "content": "Gracias por ayudarme",
      "anonymous": 1,
      "user_id": 1,
      "complaint_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "content": "Me apoyaron mucho",
      "anonymous": 0,
      "user_id": 1,
      "complaint_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "content": "El servicio fue excelente y me ayudaron mucho.",
  "anonymous": true,
  "user_id": 1,
  "complaint_id": 2
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
  "data": {
    "id": 1,
    "content": "El servicio fue excelente y me ayudaron mucho.",
    "anonymous": true,
    "user_id": 1,
    "complaint_id": 2,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "id": 1,
    "content": "Me siento satisfecho con la atención brindada.",
    "anonymous": 0,
    "user_id": 1,
    "complaint_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "id": 1,
    "content": "Testimonio actualizado",
    "anonymous": 0,
    "user_id": 1,
    "complaint_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T22:45:06.000000Z"
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
      "id": 1,
      "state": "pendiente",
      "date_verification": "2026-03-13",
      "new_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 2,
      "state": "aprobada",
      "date_verification": "2026-03-12",
      "new_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 3,
      "state": "pendiente",
      "date_verification": "2026-03-05",
      "new_id": 1,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
    },
    {
      "id": 4,
      "state": "aprobada",
      "date_verification": "2026-03-06",
      "new_id": 2,
      "created_at": "2026-04-26T19:45:01.000000Z",
      "updated_at": "2026-04-26T19:45:01.000000Z"
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
  "state": "pendiente",
  "date_verification": "2026-04-26",
  "new_id": 1
}</code></pre>
</div>
<div class="col-md-6">
<h6 class="fw-bold mb-3">Response</h6>
<div class="code-block-header">JSON Response</div>
<pre><code class="language-json">{
   "data": {
    "state": "pendiente",
    "date_verification": "2026-04-26",
    "new_id": 1,
    "updated_at": "2026-04-26T22:47:39.000000Z",
    "created_at": "2026-04-26T22:47:39.000000Z",
    "id": 5
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
    "id": 1,
    "state": "pendiente",
    "date_verification": "2026-03-13",
    "new_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T19:45:01.000000Z"
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
    "id": 1,
    "state": "aprobada",
    "date_verification": "2026-04-24",
    "new_id": 1,
    "created_at": "2026-04-26T19:45:01.000000Z",
    "updated_at": "2026-04-26T22:48:44.000000Z"
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
