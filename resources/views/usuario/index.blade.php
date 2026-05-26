<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Usuario</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f5f5f5; }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 8px 20px;
            border-radius: 10px;
            text-decoration: none;
        }
        .container { max-width: 800px; margin: 30px auto; padding: 0 20px; }
        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .perfil-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .perfil-info p { margin: 10px 0; font-size: 16px; }
        .perfil-info strong { color: #667eea; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 2px solid #ddd; border-radius: 8px; }
        button { background: #667eea; color: white; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>Panel Usuario</h2>
        <div>
            <span>Bienvenido, {{ session('nombre') }}</span>
            <a href="{{ route('logout') }}" class="logout-btn" style="margin-left: 15px;">Cerrar Sesión</a>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <h2>👤 Mi Perfil</h2>
            <div class="perfil-info">
                <p><strong>ID:</strong> {{ $usuario->id }}</p>
                <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
                <p><strong>Usuario:</strong> {{ $usuario->usuario }}</p>
                <p><strong>Rol:</strong> <span style="background: #28a745; color: white; padding: 3px 10px; border-radius: 15px;">{{ $usuario->rol }}</span></p>
            </div>

            <h3>✏️ Actualizar mis datos</h3>
            <form action="{{ route('usuario.updatePerfil') }}" method="POST">
                @csrf
                <input type="text" name="nombre" value="{{ $usuario->nombre }}" required>
                <input type="text" name="usuario" value="{{ $usuario->usuario }}" required>
                <input type="password" name="password" placeholder="Nueva contraseña (opcional)">
                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña">
                <button type="submit">Actualizar Perfil</button>
            </form>
        </div>
    </div>
</body>
</html>