<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
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
        .container { max-width: 1200px; margin: 30px auto; padding: 0 20px; }
        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .card h2 { margin-bottom: 20px; color: #333; }
        input, select {
            padding: 10px;
            margin: 5px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
        }
        button {
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th { background: #667eea; color: white; }
        .btn-edit {
            background: #ffc107;
            color: #333;
            padding: 5px 12px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 5px;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
            padding: 5px 12px;
            border-radius: 5px;
            text-decoration: none;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-admin { background: #667eea; color: white; }
        .badge-user { background: #28a745; color: white; }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>Panel Administrador</h2>
        <div>
            <span>Bienvenido, {{ session('nombre') }}</span>
            <a href="{{ route('logout') }}" class="logout-btn" style="margin-left: 15px;">Cerrar Sesión</a>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <div class="card">
            <h2>📝 Registrar Nuevo Usuario</h2>
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <input type="text" name="nombre" placeholder="Nombre completo" required>
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <select name="rol">
                    <option value="Usuario">Usuario</option>
                    <option value="Administrador">Administrador</option>
                </select>
                <button type="submit">Guardar</button>
            </form>
        </div>

        <div class="card">
            <h2>📋 Lista de Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->nombre }}</td>
                        <td>{{ $u->usuario }}</td>
                        <td>
                            <span class="badge {{ $u->rol == 'Administrador' ? 'badge-admin' : 'badge-user' }}">
                                {{ $u->rol }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.edit', $u->id) }}" class="btn-edit">Editar</a>
                            @if($u->id != session('id'))
                                <a href="{{ route('admin.delete', $u->id) }}" class="btn-delete" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>