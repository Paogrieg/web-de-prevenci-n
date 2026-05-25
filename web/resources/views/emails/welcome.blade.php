<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido/a a Equoria</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .header { background-color: #6c3fc5; padding: 32px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 28px; }
        .body { padding: 32px; color: #333333; }
        .body h2 { color: #6c3fc5; }
        .body p { line-height: 1.7; font-size: 15px; }
        .footer { background-color: #f0ecf9; padding: 20px; text-align: center; font-size: 12px; color: #888888; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Equoria</h1>
        </div>
        <div class="body">
            <h2>¡Bienvenido/a, {{ $user->name }}!</h2>
            <p>Nos alegra mucho que te hayas unido a <strong>Equoria</strong>, una plataforma dedicada a la prevención de la violencia y al apoyo de quienes lo necesitan.</p>
            <p>Tu cuenta ha sido creada exitosamente. Ya puedes iniciar sesión y explorar todos los recursos y herramientas disponibles para ti.</p>
            <p>Si en algún momento tienes preguntas o necesitas ayuda, no dudes en contactarnos. Estamos aquí para apoyarte.</p>
            <p>Con cariño,<br><strong>El equipo de Equoria</strong></p>
        </div>
        <div class="footer">
            <p>Este correo fue enviado a {{ $user->email }}. Si no creaste esta cuenta, ignora este mensaje.</p>
            <p>&copy; {{ date('Y') }} Equoria. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
