@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="mb-3">
            <a href="{{ route('reparaciones.index') }}" class="text-decoration-none text-muted">
                <i class="bi bi-arrow-left me-1"></i> Volver al listado
            </a>
        </div>

        <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg,#e65100,#fb8c00)">
                <h5 class="mb-0 text-white">
                    <i class="bi bi-pencil me-2"></i>
                    Editar Reparación <span style="opacity:.8">#{{ $reparacion->id }}</span>
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('reparaciones.update', $reparacion) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label">Nombre del Cliente</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-person text-muted"></i>
                            </span>
                            <input type="text" name="nombre_cliente"
                                   class="form-control border-start-0 @error('nombre_cliente') is-invalid @enderror"
                                   value="{{ old('nombre_cliente', $reparacion->nombre_cliente) }}">
                            @error('nombre_cliente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Marca</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-phone text-muted"></i>
                                </span>
                                <input type="text" name="marca"
                                       class="form-control border-start-0 @error('marca') is-invalid @enderror"
                                       value="{{ old('marca', $reparacion->marca) }}">
                                @error('marca')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Modelo</label>
                            <input type="text" name="modelo"
                                   class="form-control @error('modelo') is-invalid @enderror"
                                   value="{{ old('modelo', $reparacion->modelo) }}">
                            @error('modelo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Descripción de la Falla</label>
                        <textarea name="descripcion_falla" rows="3"
                                  class="form-control @error('descripcion_falla') is-invalid @enderror">{{ old('descripcion_falla', $reparacion->descripcion_falla) }}</textarea>
                        @error('descripcion_falla')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Fecha de Ingreso</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-calendar3 text-muted"></i>
                                </span>
                                <input type="date" name="fecha_ingreso"
                                       class="form-control border-start-0 @error('fecha_ingreso') is-invalid @enderror"
                                       value="{{ old('fecha_ingreso', $reparacion->fecha_ingreso) }}">
                                @error('fecha_ingreso')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                                @foreach($estados as $estado)
                                    <option value="{{ $estado }}"
                                        {{ old('estado', $reparacion->estado) == $estado ? 'selected' : '' }}>
                                        {{ $estado }}
                                    </option>
                                @endforeach
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-2 border-top mt-2">
                        <button type="submit" class="btn btn-warning px-4 fw-semibold">
                            <i class="bi bi-save me-1"></i> Actualizar
                        </button>
                        <a href="{{ route('reparaciones.index') }}" class="btn btn-outline-secondary px-4">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
