<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 50px auto; background: white; padding: 30px; border-radius: 15px; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 2px solid #ddd; border-radius: 8px; }
        button { background: #667eea; color: white; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; }
        .back { display: inline-block; margin-top: 20px; color: #667eea; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>✏️ Editar Usuario</h2>
        <form action="{{ route('admin.update', $usuario->id) }}" method="POST">
            @csrf
            <input type="text" name="nombre" value="{{ $usuario->nombre }}" required>
            <input type="text" name="usuario" value="{{ $usuario->usuario }}" required>
            <input type="password" name="password" placeholder="Nueva contraseña (opcional)">
            <select name="rol">
                <option value="Usuario" {{ $usuario->rol == 'Usuario' ? 'selected' : '' }}>Usuario</option>
                <option value="Administrador" {{ $usuario->rol == 'Administrador' ? 'selected' : '' }}>Administrador</option>
            </select>
            <button type="submit">Actualizar</button>
        </form>
        <a href="{{ route('admin.index') }}" class="back">← Volver al listado</a>
    </div>
</body>
</html>