<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Producto - Dulcería</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .navbar { background: #333; color: white; padding: 15px 0; }
        .navbar .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 24px; }
        .navbar nav a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 800px; margin: 30px auto; padding: 0 20px; }
        .detail-container { background: white; padding: 30px; border-radius: 8px; }
        .detail-container h2 { margin-bottom: 20px; color: #333; }
        .detail-row { display: flex; padding: 15px 0; border-bottom: 1px solid #eee; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { font-weight: bold; color: #555; width: 200px; }
        .detail-value { flex: 1; color: #333; }
        .badge { display: inline-block; padding: 5px 10px; border-radius: 4px; font-size: 14px; }
        .badge-success { background: #d4edda; color: #155724; }
        .badge-warning { background: #fff3cd; color: #856404; }
        .badge-danger { background: #f8d7da; color: #721c24; }
        .actions { margin-top: 30px; display: flex; gap: 10px; }
        .btn { padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; display: inline-block; }
        .btn:hover { background: #0056b3; }
        .btn-warning { background: #ffc107; color: #333; }
        .btn-warning:hover { background: #e0a800; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #c82333; }
        .btn-secondary { background: #6c757d; }
        .btn-secondary:hover { background: #5a6268; }
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
            <h2>Detalle del Producto</h2>
            
            <div class="detail-row">
                <div class="detail-label">ID:</div>
                <div class="detail-value">{{ $producto->id }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Nombre:</div>
                <div class="detail-value"><strong>{{ $producto->nombre }}</strong></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Tipo de Producto:</div>
                <div class="detail-value">{{ $producto->tipoProducto->nombre }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Descripción:</div>
                <div class="detail-value">{{ $producto->descripcion ?? 'Sin descripción' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Precio:</div>
                <div class="detail-value"><strong>${{ number_format($producto->precio, 2) }}</strong></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Stock:</div>
                <div class="detail-value">
                    {{ $producto->stock }} unidades
                    @if($producto->stock > 50)
                        <span class="badge badge-success">Stock Alto</span>
                    @elseif($producto->stock > 20)
                        <span class="badge badge-warning">Stock Medio</span>
                    @else
                        <span class="badge badge-danger">Stock Bajo</span>
                    @endif
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Código de Barras:</div>
                <div class="detail-value">{{ $producto->codigo_barras ?? 'N/A' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Fecha de Creación:</div>
                <div class="detail-value">{{ $producto->created_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Última Actualización:</div>
                <div class="detail-value">{{ $producto->updated_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="actions">
                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">Editar</a>
                <form method="POST" action="{{ route('productos.destroy', $producto) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este producto?')">Eliminar</button>
                </form>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>