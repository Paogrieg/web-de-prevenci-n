<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .header { background-color: #6c3fc5; padding: 32px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 28px; }
        .body { padding: 32px; color: #333333; }
        .body h2 { color: #6c3fc5; }
        .body p { line-height: 1.7; font-size: 15px; }
        .btn { display: inline-block; margin: 24px 0; padding: 14px 32px; background-color: #6c3fc5; color: #ffffff !important; text-decoration: none; border-radius: 6px; font-size: 16px; font-weight: bold; }
        .note { font-size: 13px; color: #888888; margin-top: 16px; }
        .footer { background-color: #f0ecf9; padding: 20px; text-align: center; font-size: 12px; color: #888888; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Equoria</h1>
        </div>
        <div class="body">
            <h2>Restablecer tu contraseña</h2>
            <p>Recibimos una solicitud para restablecer la contraseña asociada a <strong>{{ $email }}</strong>.</p>
            <p>Haz clic en el siguiente botón para crear una nueva contraseña:</p>
            <p style="text-align: center;">
                <a href="{{ env('FRONTEND_URL') }}/reset-password?token={{ $token }}&email={{ urlencode($email) }}" class="btn">
                    Restablecer contraseña
                </a>
            </p>
            <p class="note">Este enlace expirará en <strong>60 minutos</strong>. Si no solicitaste este cambio, puedes ignorar este correo; tu contraseña no será modificada.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Equoria. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
