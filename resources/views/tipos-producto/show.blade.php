<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Tipo de Producto - Dulcería</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .navbar { background: #333; color: white; padding: 15px 0; }
        .navbar .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 24px; }
        .navbar nav a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 1000px; margin: 30px auto; padding: 0 20px; }
        .detail-container { background: white; padding: 30px; border-radius: 8px; margin-bottom: 20px; }
        .detail-container h2 { margin-bottom: 20px; color: #333; }
        .detail-row { display: flex; padding: 15px 0; border-bottom: 1px solid #eee; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { font-weight: bold; color: #555; width: 200px; }
        .detail-value { flex: 1; color: #333; }
        .actions { margin-top: 30px; display: flex; gap: 10px; }
        .btn { padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; display: inline-block; }
        .btn:hover { background: #0056b3; }
        .btn-warning { background: #ffc107; color: #333; }
        .btn-warning:hover { background: #e0a800; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #c82333; }
        .btn-secondary { background: #6c757d; }
        .btn-secondary:hover { background: #5a6268; }
        .productos-list { background: white; padding: 30px; border-radius: 8px; }
        .productos-list h3 { margin-bottom: 20px; color: #333; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f8f9fa; font-weight: bold; color: #555; }
        tr:hover { background: #f5f5f5; }
        .empty-state { text-align: center; padding: 40px; color: #777; }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="container">
            <h1>🍬 Sistema de Dulcería</h1>
            <nav>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('productos.index') }}">Productos</a>
                <a href="{{ route('tipos-producto.index') }}">Tipos</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="detail-container">
            <h2>Detalle del Tipo de Producto</h2>
            
            <div class="detail-row">
                <div class="detail-label">ID:</div>
                <div class="detail-value">{{ $tiposProducto->id }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Nombre:</div>
                <div class="detail-value"><strong>{{ $tiposProducto->nombre }}</strong></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Descripción:</div>
                <div class="detail-value">{{ $tiposProducto->descripcion ?? 'Sin descripción' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Total de Productos:</div>
                <div class="detail-value">{{ $tiposProducto->productos->count() }} productos</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Fecha de Creación:</div>
                <div class="detail-value">{{ $tiposProducto->created_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Última Actualización:</div>
                <div class="detail-value">{{ $tiposProducto->updated_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="actions">
                <a href="{{ route('tipos-producto.edit', $tiposProducto) }}" class="btn btn-warning">Editar</a>
                <form method="POST" action="{{ route('tipos-producto.destroy', $tiposProducto) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este tipo? Se eliminarán también sus productos.')">Eliminar</button>
                </form>
                <a href="{{ route('tipos-producto.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>

        <div class="productos-list">
            <h3>Productos de este tipo</h3>
            
            @if($tiposProducto->productos->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tiposProducto->productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>${{ number_format($producto->precio, 2) }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                                <a href="{{ route('productos.show', $producto) }}" class="btn btn-secondary" style="padding: 5px 10px; font-size: 14px;">Ver</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <p>No hay productos asociados a este tipo</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>