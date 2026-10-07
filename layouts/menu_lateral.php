<aside class="menu-lateral">
    <div class="logo">
        <h2>SICIA</h2>
        <p>Sistema de Información para la Gestión de Cotizaciones</p>
    </div>

    <nav>
        <?php 
            $paginaActual = basename($_SERVER['PHP_SELF']); 
        ?>

        <a href="index.php" class="<?php echo ($paginaActual == 'index.php') ? 'activo' : ''; ?>">Inicio</a>
        
        <a href="clientes.php" class="<?php echo ($paginaActual == 'clientes.php') ? 'activo' : ''; ?>">Clientes</a>
        
        <a href="servicios.php" class="<?php echo ($paginaActual == 'servicios.php') ? 'activo' : ''; ?>">Servicios</a>
        
        <a href="materiales.php" class="<?php echo ($paginaActual == 'materiales.php') ? 'activo' : ''; ?>">Materiales</a>
        
        <a href="cotizaciones.php" class="<?php echo ($paginaActual == 'cotizaciones.php') ? 'activo' : ''; ?>">Cotizaciones</a>
        
        <a href="seguimiento.php" class="<?php echo ($paginaActual == 'seguimiento.php') ? 'activo' : ''; ?>">Seguimiento</a>
    </nav>
</aside>