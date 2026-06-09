<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    public function index(Request $request)
    {
        $query = Reparacion::orderBy('created_at', 'desc');

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        $reparaciones = $query->get();
        $estados = ['Ingresado', 'En reparación', 'Reparado', 'Entregado'];

        return view('reparaciones.index', compact('reparaciones', 'estados'));
    }

    public function create()
    {
        $estados = ['Ingresado', 'En reparación', 'Reparado', 'Entregado'];
        return view('reparaciones.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente'   => 'required|string|max:255',
            'marca'            => 'required|string|max:255',
            'modelo'           => 'required|string|max:255',
            'descripcion_falla'=> 'required|string',
            'fecha_ingreso'    => 'required|date',
            'estado'           => 'required|in:Ingresado,En reparación,Reparado,Entregado',
        ]);

        Reparacion::create($request->all());

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación registrada correctamente.');
    }

    public function show(Reparacion $reparacion)
    {
        return view('reparaciones.show', compact('reparacion'));
    }

    public function edit(Reparacion $reparacion)
    {
        $estados = ['Ingresado', 'En reparación', 'Reparado', 'Entregado'];
        return view('reparaciones.edit', compact('reparacion', 'estados'));
    }

    public function update(Request $request, Reparacion $reparacion)
    {
        $request->validate([
            'nombre_cliente'   => 'required|string|max:255',
            'marca'            => 'required|string|max:255',
            'modelo'           => 'required|string|max:255',
            'descripcion_falla'=> 'required|string',
            'fecha_ingreso'    => 'required|date',
            'estado'           => 'required|in:Ingresado,En reparación,Reparado,Entregado',
        ]);

        $reparacion->update($request->all());

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación actualizada correctamente.');
    }

    public function destroy(Reparacion $reparacion)
    {
        $reparacion->delete();

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación eliminada correctamente.');
    }
}
