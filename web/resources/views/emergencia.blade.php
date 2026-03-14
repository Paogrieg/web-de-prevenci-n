@extends('back.main')
@section('contenido')

        <div class="page-header-row">
        <div class="page-header"><h2><i class="fa-solid fa-phone"></i> Contactos de Emergencia</h2><p>Red de apoyo y contactos de confianza registrados</p></div>
        <button class="btn-primary"><i class="fa-solid fa-plus"></i> Nuevo contacto</button>
        </div>

        <div class="stats-grid">
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-v"><i class="fa-solid fa-phone"></i></div><span class="stat-trend t-up">↑ 7%</span></div><div class="stat-value">284</div><div class="stat-label">Total contactos</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-r"><i class="fa-solid fa-house-medical"></i></div><span class="stat-trend t-nu">=</span></div><div class="stat-value">12</div><div class="stat-label">Refugios activos</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-g"><i class="fa-solid fa-shield-halved"></i></div><span class="stat-trend t-nu">=</span></div><div class="stat-value">8</div><div class="stat-label">Dependencias policiales</div></div>
        <div class="stat-card"><div class="stat-header"><div class="stat-icon si-t"><i class="fa-solid fa-scale-balanced"></i></div><span class="stat-trend t-up">↑ 2</span></div><div class="stat-value">24</div><div class="stat-label">Abogadas de apoyo</div></div>
        </div>

        <div class="contact-grid">
        <div class="contact-card"><div class="contact-card-icon" style="background:#fce4ef"><i class="fa-solid fa-triangle-exclamation"></i></div><div class="contact-card-name">Línea de Emergencias</div><div class="contact-card-rel">Atención 24/7</div><div class="contact-card-phone"><i class="fa-solid fa-mobile-screen"></i> 800-900-1000</div></div>
        <div class="contact-card"><div class="contact-card-icon" style="background:#e8f9f5"><i class="fa-solid fa-house-medical"></i></div><div class="contact-card-name">Refugio Casa Amiga</div><div class="contact-card-rel">Refugio temporal · Cd. Juárez</div><div class="contact-card-phone"><i class="fa-solid fa-mobile-screen"></i> 656-123-4567</div></div>
        <div class="contact-card"><div class="contact-card-icon" style="background:var(--plum-100)"><i class="fa-solid fa-shield-halved"></i></div><div class="contact-card-name">UAVI Chihuahua</div><div class="contact-card-rel">Unidad de Atención a Víctimas</div><div class="contact-card-phone"><i class="fa-solid fa-mobile-screen"></i> 614-234-5678</div></div>
        <div class="contact-card"><div class="contact-card-icon" style="background:#fff8e6"><i class="fa-solid fa-scale-balanced"></i></div><div class="contact-card-name">Dra. Carmen Flores</div><div class="contact-card-rel">Abogada de apoyo gratuito</div><div class="contact-card-phone"><i class="fa-solid fa-mobile-screen"></i> 614-345-6789</div></div>
        <div class="contact-card"><div class="contact-card-icon" style="background:#fce4ef"><i class="fa-solid fa-brain"></i></div><div class="contact-card-name">Psic. Laura Méndez</div><div class="contact-card-rel">Psicóloga clínica</div><div class="contact-card-phone"><i class="fa-solid fa-mobile-screen"></i> 614-456-7890</div></div>
        <div class="contact-card"><div class="contact-card-icon" style="background:#e8f9f5"><i class="fa-solid fa-building-columns"></i></div><div class="contact-card-name">IMCHIMUJER</div><div class="contact-card-rel">Instituto Municipal</div><div class="contact-card-phone"><i class="fa-solid fa-mobile-screen"></i> 614-567-8901</div></div>
        </div>

        <div class="card">
        <div class="card-header"><div><div class="card-title">Agregar Nuevo Contacto</div><div class="card-subtitle">Registrar contacto de emergencia</div></div></div>
        <div class="form-grid">
        <div class="form-group"><label class="form-label">Nombre completo</label><input class="form-input" type="text" placeholder="Ej. Dra. Ana García"></div>
        <div class="form-group"><label class="form-label">Teléfono</label><input class="form-input" type="tel" placeholder="614-000-0000"></div>
        <div class="form-group"><label class="form-label">Tipo de relación</label><select class="form-select"><option>Refugio</option><option>Abogada</option><option>Psicóloga</option><option>Dependencia</option><option>Familiar</option></select></div>
        <div class="form-group"><label class="form-label">Usuaria relacionada</label><input class="form-input" type="text" placeholder="Buscar usuaria…"></div>
        </div>
        <button class="btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar contacto</button>
        </div>
    
@endsection