<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulcería - Sistema de Gestión</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        header { background: #333; color: white; padding: 20px 0; }
        header h1 { text-align: center; }
        .hero { text-align: center; padding: 60px 20px; background: #f4f4f4; }
        .hero h2 { margin-bottom: 20px; }
        .hero p { margin-bottom: 30px; font-size: 18px; }
        .btn { display: inline-block; padding: 12px 30px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #0056b3; }
        .features { display: flex; gap: 20px; margin: 40px 0; flex-wrap: wrap; }
        .feature { flex: 1; min-width: 250px; padding: 20px; background: white; border: 1px solid #ddd; border-radius: 5px; }
        .feature h3 { margin-bottom: 10px; }
        footer { background: #333; color: white; text-align: center; padding: 20px 0; margin-top: 40px; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Sistema de Gestión de Dulcería</h1>
        </div>
    </header>

    <div class="hero">
        <div class="container">
            <h2>Bienvenido al Sistema de Gestión</h2>
            <p>Administra tu inventario de productos de manera fácil y eficiente</p>
            <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
        </div>
    </div>

    <div class="container">
        <div class="features">
            <div class="feature">
                <h3>📦 Gestión de Productos</h3>
                <p>Administra tu inventario de dulces y snacks de forma sencilla</p>
            </div>
            <div class="feature">
                <h3>📊 Control de Stock</h3>
                <p>Mantén un control preciso de tus existencias</p>
            </div>
            <div class="feature">
                <h3>🏷️ Categorías</h3>
                <p>Organiza tus productos por tipo para una mejor gestión</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Sistema de Dulcería - Todos los derechos reservados</p>
    </footer>
</body>
</html>