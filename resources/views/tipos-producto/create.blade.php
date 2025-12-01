<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tipo de Producto - Dulcería</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .navbar { background: #333; color: white; padding: 15px 0; }
        .navbar .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 24px; }
        .navbar nav a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 800px; margin: 30px auto; padding: 0 20px; }
        .form-container { background: white; padding: 30px; border-radius: 8px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 5px; color: #555; font-weight: bold; }
        .form-group input, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        .form-group textarea { resize: vertical; min-height: 100px; }
        .error { color: #dc3545; font-size: 14px; margin-top: 5px; }
        .btn { padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; text-decoration: none; display: inline-block; }
        .btn:hover { background: #0056b3; }
        .btn-secondary { background: #6c757d; }
        .btn-secondary:hover { background: #5a6268; }
        .form-actions { display: flex; gap: 10px; margin-top: 30px; }
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
        <div class="form-container">
            <h2>Crear Nuevo Tipo de Producto</h2>
            
            <form method="POST" action="{{ route('tipos-producto.store') }}">
                @csrf
                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required placeholder="Ejemplo: Dulces, Snacks, Bebidas">
                    @error('nombre')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" placeholder="Describe este tipo de producto...">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Guardar</button>
                    <a href="{{ route('tipos-producto.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>