
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dulcería</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .navbar { background: #333; color: white; padding: 15px 0; }
        .navbar .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 24px; }
        .navbar nav a { color: white; text-decoration: none; margin-left: 20px; }
        .navbar nav a:hover { text-decoration: underline; }
        .container { max-width: 1200px; margin: 30px auto; padding: 0 20px; }
        .welcome { background: white; padding: 30px; border-radius: 8px; margin-bottom: 30px; }
        .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .card { background: white; padding: 30px; border-radius: 8px; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card h3 { margin-bottom: 15px; color: #333; }
        .card a { display: inline-block; margin-top: 15px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; }
        .card a:hover { background: #0056b3; }
        .logout-form { display: inline; }
        .btn-logout { background: #dc3545; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; }
        .btn-logout:hover { background: #c82333; }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="container">
            <h1> Sistema de Dulcería</h1>
            <nav>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('productos.index') }}">Productos</a>
                <a href="{{ route('tipos-producto.index') }}">Tipos</a>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="btn-logout">Cerrar Sesión</button>
                </form>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="welcome">
            <h2>Bienvenido, {{ Auth::user()->name }}</h2>
            <p>Gestiona tu inventario de dulces y snacks desde este panel</p>
        </div>

        <div class="cards">
            <div class="card">
                <h3>📦 Productos</h3>
                <p>Administra el inventario de productos</p>
                <a href="{{ route('productos.index') }}">Ver Productos</a>
            </div>
            
            <div class="card">
                <h3>🏷️ Tipos de Producto</h3>
                <p>Gestiona las categorías de productos</p>
                <a href="{{ route('tipos-producto.index') }}">Ver Tipos</a>
            </div>
        </div>
    </div>
</body>
</html>