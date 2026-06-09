@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="mb-3">
            <a href="{{ route('reparaciones.index') }}" class="text-decoration-none text-muted">
                <i class="bi bi-arrow-left me-1"></i> Volver al listado
            </a>
        </div>

        @php
            $clases = [
                'Ingresado'     => ['css' => 'estado-ingresado',  'icon' => 'bi-inbox',        'header' => '1565c0,1e88e5'],
                'En reparación' => ['css' => 'estado-reparacion', 'icon' => 'bi-wrench',       'header' => 'e65100,fb8c00'],
                'Reparado'      => ['css' => 'estado-reparado',   'icon' => 'bi-check2-circle','header' => '2e7d32,43a047'],
                'Entregado'     => ['css' => 'estado-entregado',  'icon' => 'bi-bag-check',    'header' => '6a1b9a,9c27b0'],
            ];
            $info = $clases[$reparacion->estado] ?? $clases['Ingresado'];
        @endphp

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center"
                 style="background: linear-gradient(135deg,#{{ $info['header'] }})">
                <div>
                    <h5 class="mb-0 text-white">
                        <i class="bi bi-phone-fill me-2"></i>
                        Reparación <span style="opacity:.8">#{{ $reparacion->id }}</span>
                    </h5>
                    <small class="text-white" style="opacity:.75">
                        Registrada el {{ $reparacion->created_at ? $reparacion->created_at->format('d/m/Y \a \l\a\s H:i') : $reparacion->fecha_ingreso }}
                    </small>
                </div>
                <span class="badge-estado {{ $info['css'] }} fs-6">
                    <i class="bi {{ $info['icon'] }} me-1"></i>{{ $reparacion->estado }}
                </span>
            </div>

            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background:#f8f9fa">
                            <div class="text-muted small mb-1"><i class="bi bi-person me-1"></i>CLIENTE</div>
                            <div class="fw-semibold fs-5">{{ $reparacion->nombre_cliente }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 rounded-3" style="background:#f8f9fa">
                            <div class="text-muted small mb-1"><i class="bi bi-phone me-1"></i>MARCA</div>
                            <div class="fw-semibold fs-5">{{ $reparacion->marca }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 rounded-3" style="background:#f8f9fa">
                            <div class="text-muted small mb-1"><i class="bi bi-cpu me-1"></i>MODELO</div>
                            <div class="fw-semibold fs-5">{{ $reparacion->modelo }}</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 rounded-3" style="background:#f8f9fa">
                            <div class="text-muted small mb-1"><i class="bi bi-exclamation-triangle me-1"></i>DESCRIPCIÓN DE LA FALLA</div>
                            <div>{{ $reparacion->descripcion_falla }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded-3" style="background:#f8f9fa">
                            <div class="text-muted small mb-1"><i class="bi bi-calendar3 me-1"></i>FECHA DE INGRESO</div>
                            <div class="fw-semibold fs-5">
                                {{ \Carbon\Carbon::parse($reparacion->fecha_ingreso)->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex gap-2">
                <a href="{{ route('reparaciones.edit', $reparacion) }}" class="btn btn-warning fw-semibold">
                    <i class="bi bi-pencil me-1"></i> Editar
                </a>
                <form action="{{ route('reparaciones.destroy', $reparacion) }}" method="POST"
                      onsubmit="return confirm('¿Eliminar esta reparación?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger fw-semibold">
                        <i class="bi bi-trash me-1"></i> Eliminar
                    </button>
                </form>
                <a href="{{ route('reparaciones.index') }}" class="btn btn-outline-secondary ms-auto">
                    <i class="bi bi-arrow-left me-1"></i> Volver
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
