<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cotizaciones - SICIA</title>

    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <div class="contenedor">
        <!-- Menu lateral -->
        <?php include 'layouts/menu_lateral.php'; ?>

        <!-- Contenido principal -->
        <main class="contenido">
            <?php 
                $tituloVentana = 'Cotizaciones';
                $subtituloVentana = 'Administración de cotizaciones registradas';
                include 'layouts/header.php';
            ?>
            <!-- Contenido de cotizaciones -->
            <section class="clientes">
                <div class="encabezado-seccion">
                    <div>
                        <h2>Lista de cotizaciones</h2>
                        <p>Consulta y administra las cotizaciones registradas.</p>
                    </div>
                    <button class="boton-principal" id="btnNuevaCotizacion" type="button">
                        + Nueva cotización
                    </button>
                </div>

                <!-- Formulario de nueva cotización -->
                <div class="formulario-cliente" id="formularioCotizacion">
                    <div class="formulario-encabezado">
                        <div>
                            <h2>Nueva cotización</h2>
                            <p>Ingresa la información para generar una nueva cotización.</p>
                        </div>
                    </div>

                    <div class="formulario-contenido">
                        <div class="campo">
                            <label for="clienteCotizacion">Cliente</label>
                            <select id="clienteCotizacion">
                                <option value="">Selecciona un cliente</option>
                            </select>
                        </div>

                        <div class="campo">
                            <label for="fechaCotizacion">Fecha</label>
                            <input type="date" id="fechaCotizacion">
                        </div>

                        <div class="campo campo-completo">
                            <label for="descripcionCotizacion">Descripción del trabajo</label>
                            <textarea id="descripcionCotizacion"
                                placeholder="Describe brevemente el trabajo a realizar..."></textarea>
                        </div>
                        
                        <!-- Servicios de la cotización -->
                        <div class="campo campo-completo">
                            <h3>Servicios</h3>
                            <label for="servicioCotizacion">Seleccionar servicio</label>
                            <select id="servicioCotizacion">
                                <option value="">Selecciona un servicio</option>
                            </select>
                        </div>

                        <div class="campo">
                            <label for="cantidadServicio">Cantidad</label>
                            <input type="number" id="cantidadServicio" min="1" value="1">
                        </div>

                        <div class="campo">
                            <label for="precioServicio">Precio unitario (MXN)</label>
                            <input type="number" id="precioServicio" min="0" step="0.01" placeholder="0.00">
                        </div>

                        <div class="campo campo-completo">
                            <button class="boton-principal" id="btnAgregarServicio" type="button">
                                + Agregar servicio
                            </button>
                        </div>
                        
                        <!-- Materiales de la cotización -->
                        <div class="campo campo-completo">
                            <h3>Materiales</h3>
                            <label for="materialCotizacion">Seleccionar material</label>
                            <select id="materialCotizacion">
                                <option value="">Selecciona un material</option>
                            </select>
                        </div>

                        <div class="campo">
                            <label for="cantidadMaterial">Cantidad</label>
                            <input type="number" id="cantidadMaterial" min="0.01" step="0.01" value="1">
                        </div>

                        <div class="campo">
                            <label for="precioMaterial">Costo unitario (MXN)</label>
                            <input type="number" id="precioMaterial" min="0" step="0.01" placeholder="0.00">
                        </div>

                        <div class="campo campo-completo">
                            <button class="boton-principal" id="btnAgregarMaterial" type="button">
                                + Agregar material
                            </button>
                        </div>
                        
                        <!-- Resumen de servicios y materiales -->
                        <div class="campo campo-completo">
                            <h3>Resumen de la cotización</h3>
                            <div class="tabla-contenedor">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Concepto</th>
                                            <th>Cantidad</th>
                                            <th>Precio unitario</th>
                                            <th>Importe</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalleCotizacion">
                                        <!-- Aquí aparecerán los servicios y materiales agregados -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Totales de la cotización -->
                        <div class="campo campo-completo">
                            <p><strong>Subtotal de servicios:</strong> <span id="subtotalServicios">$0.00</span></p>
                            <p><strong>Subtotal de materiales:</strong> <span id="subtotalMateriales">$0.00</span></p>
                            <h3>Total general: <span id="totalCotizacion">$0.00</span></h3>
                        </div>

                    </div>

                    <div class="formulario-botones">
                        <button class="boton-cancelar" id="btnCancelarCotizacion" type="button">Cancelar</button>
                        <button class="boton-principal" id="btnGuardarCotizacion" type="button">Guardar cotización</button>
                    </div>
                </div>

                <!-- Búsqueda -->
                <div class="busqueda">
                    <input type="text" id="buscarCotizacion" placeholder="Buscar cotización...">
                </div>

                <!-- Tabla de cotizaciones -->
                <div class="tabla-contenedor">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaCotizaciones">
                            <!-- Aquí aparecerán las cotizaciones registradas -->
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <!-- Ventana de información de la cotización -->
    <div class="ventana-cliente" id="ventanaCotizacion">
        <div class="ventana-contenido">
            <div class="ventana-encabezado">
                <h2>Información de la cotización</h2>
                <button type="button" id="btnCerrarVentanaCotizacion">&times;</button>
            </div>
            <div class="informacion-cliente">
                <p><strong>ID:</strong> <span id="verIdCotizacion"></span></p>
                <p><strong>Cliente:</strong> <span id="verClienteCotizacion"></span></p>
                <p><strong>Fecha:</strong> <span id="verFechaCotizacion"></span></p>
                <p><strong>Descripción:</strong> <span id="verDescripcionCotizacion"></span></p>
                <p><strong>Total:</strong> <span id="verTotalCotizacion"></span></p>
                <p><strong>Estado:</strong> <span id="verEstadoCotizacion"></span></p>
            </div>
        </div>
    </div>

    <script> 
    const btnNuevaCotizacion = document.getElementById("btnNuevaCotizacion");
    const btnCancelarCotizacion = document.getElementById("btnCancelarCotizacion");
    const formularioCotizacion = document.getElementById("formularioCotizacion");

    // Mostrar formulario
    btnNuevaCotizacion.addEventListener("click", function () {
        formularioCotizacion.style.display = "block";
    });

    // Ocultar formulario
    btnCancelarCotizacion.addEventListener("click", function () {
        formularioCotizacion.style.display = "none";
    });

    </script>

</body>
</html>