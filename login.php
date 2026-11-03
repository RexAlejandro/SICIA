
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | SICIA</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main class="login-contenedor">
        <section class="login-presentacion">
            <div class="login-marca">SICIA</div>
            <div class="login-mensaje">
                <h1>¡Bienvenido a SICIA!</h1>
                <p>Sistema de Información para la Gestión de Cotizaciones.</p>
                <p>Administra tus clientes, servicios, materiales y cotizaciones desde un solo lugar.</p>
            </div>
            <p class="login-pie">SICIA 1.0 | Sistema de gestión de cotizaciones</p>
        </section>

        <section class="login-acceso">
            <div class="login-formulario">
                <div class="login-encabezado">
                    <h2>Iniciar sesión</h2>
                    <p>Accede al panel de administración.</p>
                </div>

                <form id="formLogin">
                    <div class="campo">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" id="correo" name="correo"
                               placeholder="Ingresa tu correo" required>
                    </div>

                    <div class="campo">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena"
                               placeholder="Ingresa tu contraseña" required>
                    </div>

                    <button type="submit" class="btn-login">
                        Iniciar sesión
                    </button>
                    <p id="mensajeLogin" role="status" aria-live="polite"></p>
                </form>
            </div>
        </section>
    </main>
</body>
</html>