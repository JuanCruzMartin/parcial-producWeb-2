@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="mb-3">
            <a href="{{ route('reparaciones.index') }}" class="back-link">
                <i class="bi bi-arrow-left me-1"></i> Volver al listado
            </a>
        </div>

        @php
            $info = [
                'Ingresado'     => ['css'=>'estado-ingresado',  'icon'=>'bi-inbox',         'glow'=>'33,150,243',  'grad'=>'rgba(21,101,192,0.3),rgba(13,71,161,0.2)'],
                'En reparación' => ['css'=>'estado-reparacion', 'icon'=>'bi-wrench',        'glow'=>'255,152,0',   'grad'=>'rgba(230,81,0,0.3),rgba(191,54,12,0.2)'],
                'Reparado'      => ['css'=>'estado-reparado',   'icon'=>'bi-check2-circle', 'glow'=>'76,175,80',   'grad'=>'rgba(46,125,50,0.3),rgba(27,94,32,0.2)'],
                'Entregado'     => ['css'=>'estado-entregado',  'icon'=>'bi-bag-check',     'glow'=>'156,39,176',  'grad'=>'rgba(106,27,154,0.3),rgba(74,20,140,0.2)'],
            ];
            $i = $info[$reparacion->estado] ?? $info['Ingresado'];
        @endphp

        <div class="glass">
            {{-- Header --}}
            <div class="glass-header d-flex justify-content-between align-items-center"
                 style="background: linear-gradient(135deg, {{ $i['grad'] }}); box-shadow: 0 4px 20px rgba({{ $i['glow'] }},0.2)">
                <div>
                    <h5 class="mb-1" style="color:#fff; font-weight:700">
                        <i class="bi bi-phone-fill me-2" style="color:rgba(255,255,255,0.7)"></i>
                        Reparación <span style="opacity:.5">#{{ $reparacion->id }}</span>
                    </h5>
                    <small style="color:rgba(255,255,255,0.45)">
                        <i class="bi bi-clock me-1"></i>
                        Registrada el {{ $reparacion->created_at ? $reparacion->created_at->format('d/m/Y \a \l\a\s H:i') : $reparacion->fecha_ingreso }}
                    </small>
                </div>
                <span class="badge-estado {{ $i['css'] }}" style="font-size:.85rem; box-shadow: 0 0 15px rgba({{ $i['glow'] }},0.4)">
                    <i class="bi {{ $i['icon'] }} me-1"></i>{{ $reparacion->estado }}
                </span>
            </div>

            {{-- Body --}}
            <div class="glass-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="detail-label"><i class="bi bi-person me-1"></i>Cliente</div>
                            <div class="detail-value">{{ $reparacion->nombre_cliente }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="detail-box">
                            <div class="detail-label"><i class="bi bi-phone me-1"></i>Marca</div>
                            <div class="detail-value">{{ $reparacion->marca }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="detail-box">
                            <div class="detail-label"><i class="bi bi-cpu me-1"></i>Modelo</div>
                            <div class="detail-value">{{ $reparacion->modelo }}</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="detail-box">
                            <div class="detail-label"><i class="bi bi-exclamation-triangle me-1"></i>Descripción de la Falla</div>
                            <div class="detail-value" style="font-size:.95rem; line-height:1.6">{{ $reparacion->descripcion_falla }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="detail-box">
                            <div class="detail-label"><i class="bi bi-calendar3 me-1"></i>Fecha de Ingreso</div>
                            <div class="detail-value">{{ \Carbon\Carbon::parse($reparacion->fecha_ingreso)->format('d/m/Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="glass-footer d-flex gap-2">
                <a href="{{ route('reparaciones.edit', $reparacion) }}"
                   class="btn btn-nav-new"
                   style="background: linear-gradient(135deg,#ffb74d,#fb8c00); box-shadow: 0 4px 15px rgba(255,152,0,0.3)">
                    <i class="bi bi-pencil me-1"></i> Editar
                </a>
                <form action="{{ route('reparaciones.destroy', $reparacion) }}" method="POST"
                      onsubmit="return confirm('¿Eliminar esta reparación?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-nav-new"
                            style="background: linear-gradient(135deg,#ef5350,#c62828); box-shadow: 0 4px 15px rgba(239,83,80,0.3)">
                        <i class="bi bi-trash me-1"></i> Eliminar
                    </button>
                </form>
                <a href="{{ route('reparaciones.index') }}" class="btn btn-accion ms-auto px-4" style="width:auto">
                    <i class="bi bi-arrow-left me-1"></i> Volver
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
