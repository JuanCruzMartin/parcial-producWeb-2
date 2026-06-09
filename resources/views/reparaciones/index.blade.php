@extends('layouts.app')

@section('content')

@php
    $total      = \App\Models\Reparacion::count();
    $ingresados = \App\Models\Reparacion::where('estado','Ingresado')->count();
    $enRep      = \App\Models\Reparacion::where('estado','En reparación')->count();
    $reparados  = \App\Models\Reparacion::where('estado','Reparado')->count();
    $entregados = \App\Models\Reparacion::where('estado','Entregado')->count();
@endphp

{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#1565c0,#1e88e5); box-shadow: 0 8px 25px rgba(21,101,192,0.4)">
            <div class="stat-num">{{ $ingresados }}</div>
            <div class="stat-label"><i class="bi bi-inbox me-1"></i>Ingresados</div>
            <i class="bi bi-inbox stat-icon"></i>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#e65100,#fb8c00); box-shadow: 0 8px 25px rgba(230,81,0,0.4)">
            <div class="stat-num">{{ $enRep }}</div>
            <div class="stat-label"><i class="bi bi-wrench me-1"></i>En reparación</div>
            <i class="bi bi-wrench stat-icon"></i>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#2e7d32,#43a047); box-shadow: 0 8px 25px rgba(46,125,50,0.4)">
            <div class="stat-num">{{ $reparados }}</div>
            <div class="stat-label"><i class="bi bi-check2-circle me-1"></i>Reparados</div>
            <i class="bi bi-check2-circle stat-icon"></i>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#6a1b9a,#9c27b0); box-shadow: 0 8px 25px rgba(106,27,154,0.4)">
            <div class="stat-num">{{ $entregados }}</div>
            <div class="stat-label"><i class="bi bi-bag-check me-1"></i>Entregados</div>
            <i class="bi bi-bag-check stat-icon"></i>
        </div>
    </div>
</div>

{{-- Header + Filtro --}}
<div class="glass mb-3">
    <div class="glass-body py-3">
        <div class="row align-items-center g-2">
            <div class="col">
                <h4 class="page-title mb-0">Reparaciones</h4>
                <div class="page-subtitle">{{ $reparaciones->count() }} registro(s) encontrado(s)</div>
            </div>
            <div class="col-auto">
                <form method="GET" action="{{ route('reparaciones.index') }}" class="d-flex gap-2">
                    <select name="estado" class="form-select form-select-sm" style="min-width:170px">
                        <option value="">Todos los estados</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado }}" {{ request('estado') == $estado ? 'selected' : '' }}>
                                {{ $estado }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-sm btn-nav-new px-3">
                        <i class="bi bi-funnel"></i>
                    </button>
                    @if(request('estado'))
                        <a href="{{ route('reparaciones.index') }}" class="btn btn-sm btn-accion">
                            <i class="bi bi-x-lg"></i>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Tabla --}}
<div class="glass">
    @if($reparaciones->isEmpty())
        <div class="text-center py-5 empty-state">
            <i class="bi bi-inbox d-block mb-3"></i>
            <p>No hay reparaciones registradas.</p>
            <a href="{{ route('reparaciones.create') }}" class="btn btn-nav-new mt-1">
                <i class="bi bi-plus-circle me-1"></i> Registrar la primera
            </a>
        </div>
    @else
    <div class="table-responsive">
        <table class="table glass-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Marca / Modelo</th>
                    <th>Fecha Ingreso</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reparaciones as $rep)
                @php
                    $clases = [
                        'Ingresado'     => 'estado-ingresado',
                        'En reparación' => 'estado-reparacion',
                        'Reparado'      => 'estado-reparado',
                        'Entregado'     => 'estado-entregado',
                    ];
                    $clase = $clases[$rep->estado] ?? 'estado-ingresado';
                @endphp
                <tr>
                    <td><span style="color:rgba(255,255,255,0.3);font-weight:700">#{{ $rep->id }}</span></td>
                    <td><span class="fw-semibold" style="color:#fff">{{ $rep->nombre_cliente }}</span></td>
                    <td>
                        <span class="fw-semibold" style="color:#fff">{{ $rep->marca }}</span>
                        <span style="color:rgba(255,255,255,0.4)"> · {{ $rep->modelo }}</span>
                    </td>
                    <td>
                        <i class="bi bi-calendar3 me-1" style="color:rgba(255,255,255,0.3)"></i>
                        {{ \Carbon\Carbon::parse($rep->fecha_ingreso)->format('d/m/Y') }}
                    </td>
                    <td><span class="badge-estado {{ $clase }}">{{ $rep->estado }}</span></td>
                    <td class="text-center">
                        <a href="{{ route('reparaciones.show', $rep) }}" class="btn btn-accion me-1" title="Ver detalle">
                            <i class="bi bi-eye" style="color:#4fc3f7"></i>
                        </a>
                        <a href="{{ route('reparaciones.edit', $rep) }}" class="btn btn-accion me-1" title="Editar">
                            <i class="bi bi-pencil" style="color:#ffb74d"></i>
                        </a>
                        <form action="{{ route('reparaciones.destroy', $rep) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('¿Eliminar esta reparación?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-accion" title="Eliminar">
                                <i class="bi bi-trash" style="color:#ef5350"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

@endsection
