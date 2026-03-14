@extends('back.main')
@section('contenido')

      <div class="page-header-row">
        <div class="page-header"><h2><i class="fa-solid fa-scale-balanced"></i> Marco Legal</h2><p>Leyes y normativas de protección vigentes</p></div>
        <button class="btn-primary">＋ Agregar ley</button>
      </div>
      <div class="card">
        <div class="card-header"><div><div class="card-title">Leyes Vigentes</div><div class="card-subtitle">Marco legal de protección</div></div>
          <select class="form-select" style="width:auto;font-size:12px;padding:6px 28px 6px 10px">
            <option>Todas las regiones</option><option>Federal</option><option>Chihuahua</option>
          </select>
        </div>
        <table>
          <thead><tr><th>Título</th><th>Región</th><th>Estado</th><th>Última actualización</th><th>Fuente</th></tr></thead>
          <tbody>
            <tr><td style="font-weight:500">Ley General de Acceso de las Mujeres a una Vida Libre de Violencia</td><td><span class="ley-region">🇲🇽 Federal</span></td><td><span class="badge b-apr">Vigente</span></td><td>Ene 2026</td><td><a href="#" style="color:var(--plum-500);font-size:12px">Ver fuente →</a></td></tr>
            <tr><td style="font-weight:500">Ley de Acceso de las Mujeres a una Vida Libre de Violencia del Estado de Chihuahua</td><td><span class="ley-region">Chihuahua</span></td><td><span class="badge b-apr">Vigente</span></td><td>Mar 2025</td><td><a href="#" style="color:var(--plum-500);font-size:12px">Ver fuente →</a></td></tr>
            <tr><td style="font-weight:500">NOM-046-SSA2-2005: Violencia Familiar, Sexual y Género</td><td><span class="ley-region">🇲🇽 Federal</span></td><td><span class="badge b-apr">Vigente</span></td><td>Jun 2024</td><td><a href="#" style="color:var(--plum-500);font-size:12px">Ver fuente →</a></td></tr>
            <tr><td style="font-weight:500">Protocolo de Actuación para Casos de Feminicidio</td><td><span class="ley-region">🇲🇽 Federal</span></td><td><span class="badge b-apr">Vigente</span></td><td>Feb 2025</td><td><a href="#" style="color:var(--plum-500);font-size:12px">Ver fuente →</a></td></tr>
            <tr><td style="font-weight:500">Código Penal Federal — Art. 325 (Feminicidio)</td><td><span class="ley-region">🇲🇽 Federal</span></td><td><span class="badge b-rev">En revisión</span></td><td>Mar 2026</td><td><a href="#" style="color:var(--plum-500);font-size:12px">Ver fuente →</a></td></tr>
          </tbody>
        </table>
      </div>
    

@endsection