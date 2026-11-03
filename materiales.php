<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Materiales - SICIA</title>

    <link rel="stylesheet" href="css/estilos.css">

    <script type = 'text/javascript' src = 'js/materiales.js'></script>

</head>

<body>

    <div class="contenedor">

        <!-- Menu lateral -->

         <?php include 'layouts/menu_lateral.php'; ?>

        <!-- Contenido principal -->
        <main class="contenido">
            <?php 
                $tituloVentana = 'Materiales';
                $subtituloVentana = 'Administración de materiales registrados';
                include 'layouts/header.php';
            ?>

            <!-- Contenido de materiales -->
            <section class="clientes">
                <div class="encabezado-seccion">
                    <div>
                        <h2>Lista de materiales</h2>
                        <p>Consulta y administra los materiales disponibles.</p>
                    </div>
                    <button class="boton-principal" id="btnNuevoMaterial" type="button">
                        + Nuevo material
                    </button>
                </div>

                <!-- Formulario de nuevo material -->
                <div class="formulario-cliente" id="formularioMaterial">
                    <div class="formulario-encabezado">
                        <div>
                            <h2>Nuevo material</h2>
                            <p>Ingresa la información del nuevo material.</p>
                        </div>
                    </div>

                    <div class="formulario-contenido">
                        <div class="campo">
                            <label for="nombreMaterial">Nombre del material</label>
                            <input type="text" id="nombreMaterial" placeholder="Ej. Cable eléctrico">
                        </div>
                        <div class="campo">
                            <label for="unidadMaterial">Unidad de medida</label>
                            <select id="unidadMaterial">
                                <option value="">Selecciona una unidad</option>
                                <option value="Pieza">Pieza</option>
                                <option value="Metro">Metro</option>
                                <option value="Kilogramo">Kilogramo</option>
                                <option value="Litro">Litro</option>
                                <option value="Caja">Caja</option>
                                <option value="Rollo">Rollo</option>
                                <option value="Servicio">Servicio</option>
                            </select>
                        </div>
                        <div class="campo">
                            <label for="costoMaterial">Costo por unidad (MXN)</label>
                            <input type="number" id="costoMaterial" min="0.01" step="0.01" placeholder="Ej. 25.00">
                        </div>
                        <div class="campo campo-completo">
                            <label for="descripcionMaterial">Descripción</label>
                            <textarea id="descripcionMaterial" placeholder="Describe el material..."></textarea>
                        </div>
                    </div>

                    <div class="formulario-botones">
                        <button class="boton-cancelar" id="btnCancelarMaterial" type="button">Cancelar</button>
                        <button class="boton-principal" id="btnGuardarMaterial" type="button">Guardar material</button>
                    </div>
                </div>

                <!-- Búsqueda -->
                <div class="busqueda">
                    <input type="text" id="buscarMaterial" placeholder="Buscar material...">
                </div>

                <!-- Tabla de materiales -->
                <div class="tabla-contenedor">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Material</th>
                                <th>Descripción</th>
                                <th>Unidad</th>
                                <th>Costo unitario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaMateriales">
                            <tr>
                                <td>001</td>
                                <td>Cable eléctrico</td>
                                <td>Cable de cobre para instalaciones eléctricas</td>
                                <td>Metro</td>
                                <td>$25.00</td>
                                <td>
                                    <button class="boton-tabla boton-ver" type="button">Ver</button>
                                    <button class="boton-tabla boton-editar" type="button">Editar</button>
                                    <button class="boton-tabla boton-eliminar" type="button">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>Tornillo</td>
                                <td>Tornillo para fijación</td>
                                <td>Pieza</td>
                                <td>$3.50</td>
                                <td>
                                    <button class="boton-tabla boton-ver" type="button">Ver</button>
                                    <button class="boton-tabla boton-editar" type="button">Editar</button>
                                    <button class="boton-tabla boton-eliminar" type="button">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>003</td>
                                <td>Pintura blanca</td>
                                <td>Pintura blanca para interiores</td>
                                <td>Litro</td>
                                <td>$85.00</td>
                                <td>
                                    <button class="boton-tabla boton-ver" type="button">Ver</button>
                                    <button class="boton-tabla boton-editar" type="button">Editar</button>
                                    <button class="boton-tabla boton-eliminar" type="button">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>

    </div>

    <!-- Ventana de información del material -->
    <div class="ventana-cliente" id="ventanaMaterial">
        <div class="ventana-contenido">
            <div class="ventana-encabezado">
                <h2>Información del material</h2>
                <button type="button" id="btnCerrarVentanaMaterial">&times;</button>
            </div>
            <div class="informacion-cliente">
                <p><strong>ID:</strong> <span id="verIdMaterial"></span></p>
                <p><strong>Nombre:</strong> <span id="verNombreMaterial"></span></p>
                <p><strong>Descripción:</strong> <span id="verDescripcionMaterial"></span></p>
                <p><strong>Unidad de medida:</strong> <span id="verUnidadMaterial"></span></p>
                <p><strong>Costo unitario:</strong> <span id="verCostoMaterial"></span></p>
            </div>
        </div>
    </div>
</body>
</html>