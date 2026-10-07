<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SICIA</title>
    
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <div class="contenedor">

        <?php include 'layouts/menu_lateral.php'; ?>

        <!-- Contenido principal -->
        <main class="contenido">

            <?php 
                $tituloVentana = 'Dashboard Principal';
                $subtituloVentana = 'Resumen general de SICIA';
                include 'layouts/header.php';
            ?>

            <section class="dashboard">

                <h2>Resumen</h2>

            <div class="tarjetas">

                 <div class="tarjeta">
                    <div class="tarjeta-info">
                        <h3>Total de Cotizaciones</h3>
                        <p>0</p>
                    </div>
                    <div class="icono-tarjeta">📄</div>
                </div>

                <div class="tarjeta">
                    <div class="tarjeta-info">
                         <h3>Pendientes</h3>
                         <p>0</p>
                    </div>
                    <div class="icono-tarjeta">⏳</div>
                </div>

                <div class="tarjeta">
                    <div class="tarjeta-info">
                        <h3>Aceptadas</h3>
                        <p>0</p>
                    </div>
                    <div class="icono-tarjeta">✓</div>
            </div>

                <div class="tarjeta">
                    <div class="tarjeta-info">
                        <h3>Rechazadas</h3>
                        <p>0</p>
                    </div>
                    <div class="icono-tarjeta">✕</div>
            </div>

            </div>

            <!-- Cotizaciones recientes -->

            <div class="seccion-cotizaciones">

                    <div class="encabezado-seccion">
                        <h2>Cotizaciones recientes</h2>
                        <a href="#">Ver todas</a>
                    </div>

            <div class="tabla-contenedor">

            <table>

                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>COT-001</td>
                        <td>Juan Pérez</td>
                        <td>13/09/2026</td>
                        <td>$2,500.00</td>
                        <td><span class="estado enviada">Enviada</span></td>
                    </tr>

                    <tr>
                        <td>COT-002</td>
                        <td>María López</td>
                        <td>12/09/2026</td>
                        <td>$1,800.00</td>
                        <td><span class="estado aceptada">Aceptada</span></td>
                    </tr>

                    <tr>
                        <td>COT-003</td>
                        <td>Pedro García</td>
                        <td>11/09/2026</td>
                        <td>$3,200.00</td>
                        <td><span class="estado pendiente">Pendiente</span></td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

            </section>

        </main>

    </div>

</body>
</html>