<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Producto - Dulcería</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .navbar { background: #333; color: white; padding: 15px 0; }
        .navbar .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 24px; }
        .navbar nav a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 1200px; margin: 30px auto; padding: 0 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn { padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .btn-success { background: #28a745; }
        .btn-success:hover { background: #218838; }
        .btn-warning { background: #ffc107; color: #333; }
        .btn-warning:hover { background: #e0a800; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #c82333; }
        .btn-sm { padding: 5px 10px; font-size: 14px; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        table { width: 100%; background: white; border-collapse: collapse; border-radius: 8px; overflow: hidden; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #007bff; color: white; }
        tr:hover { background: #f5f5f5; }
        .actions { display: flex; gap: 5px; }
        .empty-state { background: white; padding: 40px; text-align: center; border-radius: 8px; }
        .empty-state h3 { color: #555; margin-bottom: 10px; }
        .empty-state p { color: #777; }
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
        <div class="header">
            <h2>Tipos de Producto</h2>
            <a href="{{ route('tipos-producto.create') }}" class="btn btn-success">+ Nuevo Tipo</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($tipos->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Productos</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipos as $tipo)
                    <tr>
                        <td>{{ $tipo->id }}</td>
                        <td><strong>{{ $tipo->nombre }}</strong></td>
                        <td>{{ Str::limit($tipo->descripcion, 50) ?? 'Sin descripción' }}</td>
                        <td>{{ $tipo->productos->count() }} productos</td>
                        <td>{{ $tipo->created_at->format('d/m/Y') }}</td>
                        <td class="actions">
                            <a href="{{ route('tipos-producto.show', $tipo) }}" class="btn btn-sm">Ver</a>
                            <a href="{{ route('tipos-producto.edit', $tipo) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form method="POST" action="{{ route('tipos-producto.destroy', $tipo) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este tipo? Se eliminarán también sus productos.')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <h3>No hay tipos de producto registrados</h3>
                <p>Comienza creando un nuevo tipo de producto</p>
            </div>
        @endif
    </div>
</body>
</html>