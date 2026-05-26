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
        <form action="<?php echo e(route('admin.update', $usuario->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="nombre" value="<?php echo e($usuario->nombre); ?>" required>
            <input type="text" name="usuario" value="<?php echo e($usuario->usuario); ?>" required>
            <input type="password" name="password" placeholder="Nueva contraseña (opcional)">
            <select name="rol">
                <option value="Usuario" <?php echo e($usuario->rol == 'Usuario' ? 'selected' : ''); ?>>Usuario</option>
                <option value="Administrador" <?php echo e($usuario->rol == 'Administrador' ? 'selected' : ''); ?>>Administrador</option>
            </select>
            <button type="submit">Actualizar</button>
        </form>
        <a href="<?php echo e(route('admin.index')); ?>" class="back">← Volver al listado</a>
    </div>
</body>
</html><?php /**PATH D:\login_inicio\resources\views/admin/edit.blade.php ENDPATH**/ ?>