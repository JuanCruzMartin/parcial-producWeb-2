@extends('layouts.app')

@section('content')

@php
    $total      = $reparaciones->count();
    $ingresados = \App\Models\Reparacion::where('estado','Ingresado')->count();
    $enRep      = \App\Models\Reparacion::where('estado','En reparación')->count();
    $reparados  = \App\Models\Reparacion::where('estado','Reparado')->count();
    $entregados = \App\Models\Reparacion::where('estado','Entregado')->count();
@endphp

{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#1565c0,#1e88e5)">
            <div class="stat-num">{{ $ingresados }}</div>
            <div class="stat-label"><i class="bi bi-inbox me-1"></i>Ingresados</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#e65100,#fb8c00)">
            <div class="stat-num">{{ $enRep }}</div>
            <div class="stat-label"><i class="bi bi-wrench me-1"></i>En reparación</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#2e7d32,#43a047)">
            <div class="stat-num">{{ $reparados }}</div>
            <div class="stat-label"><i class="bi bi-check2-circle me-1"></i>Reparados</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#6a1b9a,#9c27b0)">
            <div class="stat-num">{{ $entregados }}</div>
            <div class="stat-label"><i class="bi bi-bag-check me-1"></i>Entregados</div>
        </div>
    </div>
</div>

{{-- Header + Filtro --}}
<div class="card mb-4">
    <div class="card-body py-3 px-4">
        <div class="row align-items-center g-2">
            <div class="col">
                <h4 class="page-title mb-0">Reparaciones</h4>
                <div class="page-subtitle">{{ $total }} registro(s) encontrado(s)</div>
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
                    <button type="submit" class="btn btn-sm btn-dark px-3">
                        <i class="bi bi-funnel"></i>
                    </button>
                    @if(request('estado'))
                        <a href="{{ route('reparaciones.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-x-lg"></i>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Tabla --}}
<div class="card">
    <div class="card-body p-0">
        @if($reparaciones->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size:3rem;color:#ccc"></i>
                <p class="text-muted mt-2">No hay reparaciones registradas.</p>
                <a href="{{ route('reparaciones.create') }}" class="btn btn-primary mt-1">
                    <i class="bi bi-plus-circle"></i> Registrar la primera
                </a>
            </div>
        @else
        <div class="table-responsive">
            <table class="table mb-0">
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
                        <td class="text-muted fw-bold">#{{ $rep->id }}</td>
                        <td>
                            <div class="fw-600">{{ $rep->nombre_cliente }}</div>
                        </td>
                        <td>
                            <span class="fw-semibold">{{ $rep->marca }}</span>
                            <span class="text-muted"> · {{ $rep->modelo }}</span>
                        </td>
                        <td>
                            <i class="bi bi-calendar3 me-1 text-muted"></i>
                            {{ \Carbon\Carbon::parse($rep->fecha_ingreso)->format('d/m/Y') }}
                        </td>
                        <td>
                            <span class="badge-estado {{ $clase }}">{{ $rep->estado }}</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('reparaciones.show', $rep) }}"
                               class="btn btn-accion btn-light border me-1" title="Ver detalle">
                                <i class="bi bi-eye text-info"></i>
                            </a>
                            <a href="{{ route('reparaciones.edit', $rep) }}"
                               class="btn btn-accion btn-light border me-1" title="Editar">
                                <i class="bi bi-pencil text-warning"></i>
                            </a>
                            <form action="{{ route('reparaciones.destroy', $rep) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Eliminar esta reparación?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-accion btn-light border" title="Eliminar">
                                    <i class="bi bi-trash text-danger"></i>
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
</div>

@endsection
