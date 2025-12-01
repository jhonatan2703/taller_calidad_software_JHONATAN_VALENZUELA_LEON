<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
    /**
     * Listar todos los tipos de producto
     */
    public function index()
    {
        $tipos = TipoProducto::all();
        return view('tipos-producto.index', compact('tipos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('tipos-producto.create');
    }

    /**
     * Guardar nuevo tipo de producto
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable'
        ]);

        TipoProducto::create($request->all());
        return redirect()->route('tipos-producto.index')->with('success', 'Tipo de producto creado exitosamente');
    }

    /**
     * Mostrar un tipo de producto específico
     */
    public function show(TipoProducto $tiposProducto)
    {
        return view('tipos-producto.show', compact('tiposProducto'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(TipoProducto $tiposProducto)
    {
        return view('tipos-producto.edit', compact('tiposProducto'));
    }

    /**
     * Actualizar tipo de producto
     */
    public function update(Request $request, TipoProducto $tiposProducto)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable'
        ]);

        $tiposProducto->update($request->all());
        return redirect()->route('tipos-producto.index')->with('success', 'Tipo de producto actualizado exitosamente');
    }

    /**
     * Eliminar tipo de producto
     */
    public function destroy(TipoProducto $tiposProducto)
    {
        $tiposProducto->delete();
        return redirect()->route('tipos-producto.index')->with('success', 'Tipo de producto eliminado exitosamente');
    }
}