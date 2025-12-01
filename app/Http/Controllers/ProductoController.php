<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Listar todos los productos
     */
    public function index()
    {
        $productos = Producto::with('tipoProducto')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $tipos = TipoProducto::all();
        return view('productos.create', compact('tipos'));
    }

    /**
     * Guardar nuevo producto
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_producto_id' => 'required|exists:tipo_producto,id',
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'codigo_barras' => 'nullable|unique:producto,codigo_barras|max:50'
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }

    /**
     * Mostrar un producto específico
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Producto $producto)
    {
        $tipos = TipoProducto::all();
        return view('productos.edit', compact('producto', 'tipos'));
    }

    /**
     * Actualizar producto
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'tipo_producto_id' => 'required|exists:tipo_producto,id',
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'codigo_barras' => 'nullable|max:50|unique:producto,codigo_barras,' . $producto->id
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Eliminar producto
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }
}