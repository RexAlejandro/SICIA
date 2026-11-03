<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Servicios - SICIA</title>

    <link rel="stylesheet" href="css/estilos.css">

    <script type="text/javascript" src="js/servicios.js" defer></script></head>

<body>

    <div class="contenedor">

        <!-- Menu lateral -->

        <?php include 'layouts/menu_lateral.php'; ?>

        <!-- Contenido principal -->
        <main class="contenido">

            <?php 
                $tituloVentana = 'Servicios';
                $subtituloVentana = 'Administración de servicios registrados';
                include 'layouts/header.php';
            ?>

        <!-- Contenido de servicios -->
        <section class="clientes">
                <div class="encabezado-seccion">
                    <div>
                        <h2>Lista de servicios</h2>
                        <p>Consulta y administra los servicios disponibles.</p>
                    </div>

                    <button class="boton-principal" id="btnNuevoServicio" type="button">
                        + Nuevo servicio
                    </button>
                </div>

        <!-- Formulario de nuevo servicio -->
        <div class="formulario-cliente" id="formularioServicio">
            <div class="formulario-encabezado">
                <div>
                    <h2>Nuevo servicio</h2>
                    <p>Ingresa la información del nuevo servicio.</p>
                </div>
            </div>
            <div class="formulario-contenido">
                <div class="campo">
                    <label for="nombreServicio">Nombre del servicio</label>
                    <input type="text" id="nombreServicio" placeholder="Ej. Instalación eléctrica">
                </div>
                <div class="campo">
                    <label for="precioServicio">Precio</label>
                    <input type="text" id="precioServicio" placeholder="Ej. 1500.00">
                </div>
                <div class="campo campo-completo">
                    <label for="descripcionServicio">Descripción</label>
                    <textarea id="descripcionServicio" placeholder="Describe el servicio..."></textarea>
                </div>
            </div>
            <div class="formulario-botones">
                <button class="boton-cancelar" id="btnCancelarServicio" type="button">Cancelar</button>
                <button class="boton-principal" id="btnGuardarServicio" type="button">Guardar servicio</button>
            </div>
        </div>

            <!-- Busqueda -->
            <div class="busqueda">
                <input type="text" id="buscarServicio" placeholder="Buscar servicio...">
            </div>

            <!-- Tabla de servicios -->
            <div class="tabla-contenedor">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Servicio</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaServicios">
                        <tr>
                            <td>001</td>
                            <td>Instalación eléctrica</td>
                            <td>Instalación de cableado eléctrico</td>
                            <td>$1,500.00</td>
                            <td>
                                <button class="boton-tabla boton-ver" type="button">Ver</button>
                                <button class="boton-tabla boton-editar">Editar</button>
                                <button class="boton-tabla boton-eliminar">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Mantenimiento de equipo</td>
                            <td>Mantenimiento preventivo de equipo</td>
                            <td>$800.00</td>
                            <td>
                                <button class="boton-tabla boton-ver" type="button">Ver</button>
                                <button class="boton-tabla boton-editar">Editar</button>
                                <button class="boton-tabla boton-eliminar">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Instalación de cámaras</td>
                            <td>Instalación y configuración de cámaras</td>
                            <td>$2,500.00</td>
                            <td>
                                <button class="boton-tabla boton-ver" type="button">Ver</button>
                                <button class="boton-tabla boton-editar">Editar</button>
                                <button class="boton-tabla boton-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </section>

        </main>

    </div>

    <!-- Ventana de información del servicio -->
    <div class="ventana-cliente" id="ventanaServicio">
        <div class="ventana-contenido">
            <div class="ventana-encabezado">
                <h2>Información del servicio</h2>
                <button type="button" id="btnCerrarVentanaServicio">&times;</button>
            </div>
            <div class="informacion-cliente">
                <p><strong>ID:</strong> <span id="verIdServicio"></span></p>
                <p><strong>Nombre:</strong> <span id="verNombreServicio"></span></p>
                <p><strong>Descripción:</strong> <span id="verDescripcionServicio"></span></p>
                <p><strong>Precio:</strong> <span id="verPrecioServicio"></span></p>
            </div>
        </div>
    </div>
</body>
</html>