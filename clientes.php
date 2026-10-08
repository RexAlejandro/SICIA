<?php
require_once 'conexion.php';

$stmt = $pdo->query("SELECT * FROM clientes");
$listaClientes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - SICIA</title>

    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/cliente.js" defer></script>
</head>
<body>

    <div class="contenedor">

        <?php include 'layouts/menu_lateral.php'; ?>

        <!-- Contenido principal -->
        <main class="contenido">

            <?php 
                $tituloVentana = 'Clientes';
                $subtituloVentana = 'Administración de clientes registrados';
                include 'layouts/header.php';
            ?>


            <!-- Contenido de clientes -->
            <section class="clientes">

                <div class="encabezado-seccion">

                    <div>
                        <h2>Lista de clientes</h2>
                        <p>Consulta y administra la información de tus clientes.</p>
                    </div>

                    <button class="boton-principal" id="btnNuevoCliente" type="button">
                        + Nuevo cliente
                    </button>

                </div>

            <!-- Formulario de nuevo cliente -->
                <div class="formulario-cliente" id="formularioCliente">

                    <div class="formulario-encabezado">
                        <div>
                            <h2>Nuevo cliente</h2>
                            <p>Ingresa la información del nuevo cliente.</p>
                        </div>
                    </div>

                    <div class="formulario-contenido">

                        <div class="campo">
                            <label for="nombreCliente">Nombre completo</label>
                            <input type="text" name="nombreCliente" id="nombreCliente" placeholder="Ej. Juan Pérez">
                        </div>

                        <div class="campo">
                            <label for="telefonoCliente">Teléfono</label>
                            <input type="text" name="telefonoCliente" id="telefonoCliente" placeholder="Ej. 81 1234 5678">
                        </div>

                        <div class="campo">
                            <label for="correoCliente">Correo electrónico</label>
                            <input type="email" name="correoCliente" id="correoCliente" placeholder="Ej. juan@email.com">
                        </div>

                        <div class="campo">
                            <label for="direccionCliente">Dirección</label>
                            <input type="text" name="direccionCliente" id="direccionCliente" placeholder="Ej. Monterrey, Nuevo León">
                        </div>

                        <div class="campo campo-completo">
                            <label for="notasCliente">Notas</label>
                            <textarea name="notasCliente" id="notasCliente" placeholder="Información adicional del cliente..."></textarea>
                        </div>

                    </div>

                    <div class="formulario-botones">

                        <button class="boton-cancelar" id="btnCancelarCliente" type="button">
                            Cancelar
                        </button>

                        <button class="boton-principal" id="btnGuardarCliente" type="button">
                            Guardar cliente
                        </button>

                    </div>

                </div>

                <!-- Ventana de información del cliente -->
            <div class="ventana-cliente" id="ventanaCliente">
                <div class="ventana-contenido">
                        <div class="ventana-encabezado">
                            <h2>Información del cliente</h2>
                            <button type="button" id="btnCerrarVentana">X</button>
                        </div>

                    <div class="informacion-cliente">
                        <p><strong>Nombre:</strong> <span id="verNombre"></span></p>
                        <p><strong>Teléfono:</strong> <span id="verTelefono"></span></p>
                        <p><strong>Correo:</strong> <span id="verCorreo"></span></p>
                        <p><strong>Dirección:</strong> <span id="verDireccion"></span></p>
                        <p><strong>Notas:</strong> <span id="verNotas"></span></p>
                    </div>
                </div>
            </div>


                <!-- Busqueda -->
                <div class="busqueda">

                    <input
                        type="text"
                        id="buscarCliente"
                        placeholder="Buscar cliente..."
                    >

                </div>


                <!-- Tabla de clientes -->
                <div class="tabla-contenedor">

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody id="tablaClientes">
                            <?php foreach ($listaClientes as $cliente): ?>
                            <tr>
                                <tr data-id="<?= htmlspecialchars($cliente['id_cliente']) ?>">
                                <td><?= str_pad($cliente['id_cliente'], 3, "0", STR_PAD_LEFT) ?></td>
                                <td><?= htmlspecialchars($cliente['nombre']) ?></td>
                                <td><?= htmlspecialchars($cliente['tel']) ?></td>
                                <td><?= htmlspecialchars($cliente['email']) ?></td>
                                <td>
                                    <button class="boton-tabla" 
                                            data-nombre="<?= htmlspecialchars($cliente['nombre']) ?>"
                                            data-telefono="<?= htmlspecialchars($cliente['tel']) ?>"
                                            data-correo="<?= htmlspecialchars($cliente['email']) ?>"
                                            data-direccion="<?= htmlspecialchars($cliente['direccion']) ?>"
                                            data-notas="<?= htmlspecialchars($cliente['nota']) ?>">Ver</button>
                                    <button class="boton-tabla boton-editar">Editar</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>

            </section>

        </main>

    </div>
</body>
</html>