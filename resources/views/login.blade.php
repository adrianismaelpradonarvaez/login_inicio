<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            max-width: 450px;
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 { font-size: 24px; margin-bottom: 10px; }
        .estudiante {
            background: rgba(255,255,255,0.2);
            padding: 10px;
            border-radius: 10px;
            margin-top: 15px;
        }
        .estudiante p { font-size: 14px; margin: 5px 0; }
        .body { padding: 30px; }
        .body h3 { color: #333; margin-bottom: 20px; text-align: center; }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
        }
        input:focus { outline: none; border-color: #667eea; }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover { transform: translateY(-2px); }
        .error {
            background: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            border-left: 4px solid #c33;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }
        .register-link a {
            color: #667eea;
            text-decoration: none;
        }
        .register-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>SISTEMA LOGIN INICIO</h1>
            <div class="estudiante">
                <p><strong>ADRIAN ISMAEL PRADO NARVAEZ</strong></p>
                <p>Carnet: 12635993 LP</p>
                <p>Ingeniería de Sistemas</p>
            </div>
        </div>
        <div class="body">
            <h3>INICIAR SESIÓN</h3>

            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <input type="text" name="usuario" placeholder="Usuario" value="{{ old('usuario') }}" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Ingresar</button>
            </form>

            <div class="register-link">
                <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate aquí</a>
            </div>
        </div>
    </div>
</body>
</html>