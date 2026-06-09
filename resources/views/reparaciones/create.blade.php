@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="mb-3">
            <a href="{{ route('reparaciones.index') }}" class="back-link">
                <i class="bi bi-arrow-left me-1"></i> Volver al listado
            </a>
        </div>

        <div class="glass">
            <div class="glass-header" style="background: linear-gradient(135deg, rgba(79,195,247,0.2), rgba(2,136,209,0.15))">
                <h5 class="mb-0" style="color:#fff; font-weight:700">
                    <i class="bi bi-plus-circle me-2" style="color:#4fc3f7"></i>
                    Nueva Reparación
                </h5>
            </div>
            <div class="glass-body">
                <form action="{{ route('reparaciones.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Nombre del Cliente</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="nombre_cliente"
                                   class="form-control @error('nombre_cliente') is-invalid @enderror"
                                   value="{{ old('nombre_cliente') }}" placeholder="Ej: Juan Pérez">
                            @error('nombre_cliente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Marca</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                <input type="text" name="marca"
                                       class="form-control @error('marca') is-invalid @enderror"
                                       value="{{ old('marca') }}" placeholder="Ej: Samsung">
                                @error('marca')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Modelo</label>
                            <input type="text" name="modelo"
                                   class="form-control @error('modelo') is-invalid @enderror"
                                   value="{{ old('modelo') }}" placeholder="Ej: Galaxy A54">
                            @error('modelo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Descripción de la Falla</label>
                        <textarea name="descripcion_falla" rows="3"
                                  class="form-control @error('descripcion_falla') is-invalid @enderror"
                                  placeholder="Describí el problema del equipo...">{{ old('descripcion_falla') }}</textarea>
                        @error('descripcion_falla')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Fecha de Ingreso</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                <input type="date" name="fecha_ingreso"
                                       class="form-control @error('fecha_ingreso') is-invalid @enderror"
                                       value="{{ old('fecha_ingreso', date('Y-m-d')) }}">
                                @error('fecha_ingreso')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                                <option value="">-- Seleccioná un estado --</option>
                                @foreach($estados as $estado)
                                    <option value="{{ $estado }}" {{ old('estado') == $estado ? 'selected' : '' }}>
                                        {{ $estado }}
                                    </option>
                                @endforeach
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-3" style="border-top: 1px solid rgba(255,255,255,0.08)">
                        <button type="submit" class="btn btn-nav-new px-4">
                            <i class="bi bi-save me-1"></i> Guardar
                        </button>
                        <a href="{{ route('reparaciones.index') }}" class="btn btn-accion px-4" style="width:auto">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
