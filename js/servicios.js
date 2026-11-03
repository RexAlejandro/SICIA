    const btnNuevoServicio = document.getElementById("btnNuevoServicio");
    const btnCancelarServicio = document.getElementById("btnCancelarServicio");
    const btnGuardarServicio = document.getElementById("btnGuardarServicio");

    const formularioServicio = document.getElementById("formularioServicio");
    const tablaServicios = document.getElementById("tablaServicios");
    const buscarServicio = document.getElementById("buscarServicio");

    const nombreServicio = document.getElementById("nombreServicio");
    const precioServicio = document.getElementById("precioServicio");
    const descripcionServicio = document.getElementById("descripcionServicio");

    let servicioEditando = null;

    const ventanaServicio = document.getElementById("ventanaServicio");
    const btnCerrarVentanaServicio = document.getElementById("btnCerrarVentanaServicio");

    const verIdServicio = document.getElementById("verIdServicio");
    const verNombreServicio = document.getElementById("verNombreServicio");
    const verDescripcionServicio = document.getElementById("verDescripcionServicio");
    const verPrecioServicio = document.getElementById("verPrecioServicio");

    btnNuevoServicio.addEventListener("click", function() {
        servicioEditando = null;
        nombreServicio.value = "";
        precioServicio.value = "";
        descripcionServicio.value = "";

        formularioServicio.querySelector("h2").textContent = "Nuevo servicio";
        formularioServicio.querySelector(".formulario-encabezado p").textContent =
            "Ingresa la información del nuevo servicio.";
        btnGuardarServicio.textContent = "Guardar servicio";

        formularioServicio.style.display = "block";
    });

    btnCancelarServicio.addEventListener("click", function() {
        formularioServicio.style.display = "none";
    });

    
    /* Guardar servicio */
    btnGuardarServicio.addEventListener("click", function() {
        const nombre = nombreServicio.value.trim();
        const precioTexto = precioServicio.value.trim();
        const descripcion = descripcionServicio.value.trim();
        const precio = Number(precioTexto);

        if (nombre === "") {
            alert("Por favor, ingresa el nombre del servicio.");
            nombreServicio.focus();
            return;
        }

        if (precioTexto === "" || !Number.isFinite(precio) || precio <= 0) {
            alert("Ingresa un precio válido mayor que cero.");
            precioServicio.focus();
            return;
        }

        const precioFormateado = precio.toLocaleString("es-MX", {
            style: "currency",
            currency: "MXN"
        });

        /* Si estamos editando, actualizar el servicio existente */
        if (servicioEditando !== null) {
            servicioEditando.cells[1].textContent = nombre;
            servicioEditando.cells[2].textContent = descripcion || "Sin descripción";
            servicioEditando.cells[3].textContent = precioFormateado;

            servicioEditando = null;

            nombreServicio.value = "";
            precioServicio.value = "";
            descripcionServicio.value = "";

            formularioServicio.style.display = "none";
            formularioServicio.querySelector("h2").textContent = "Nuevo servicio";
            formularioServicio.querySelector(".formulario-encabezado p").textContent =
                "Ingresa la información del nuevo servicio.";
            btnGuardarServicio.textContent = "Guardar servicio";

            alert("Servicio actualizado correctamente.");
            return;
        }

        /* Si no estamos editando, registrar un servicio nuevo */
        const filas = tablaServicios.querySelectorAll("tr");
        let numero = 1;

        filas.forEach(function(fila) {
            const id = parseInt(fila.cells[0].textContent, 10);
            if (id >= numero) {
                numero = id + 1;
            }
        });

        const idServicio = String(numero).padStart(3, "0");
        const fila = document.createElement("tr");

        const celdaId = document.createElement("td");
        celdaId.textContent = idServicio;

        const celdaNombre = document.createElement("td");
        celdaNombre.textContent = nombre;

        const celdaDescripcion = document.createElement("td");
        celdaDescripcion.textContent = descripcion || "Sin descripción";

        const celdaPrecio = document.createElement("td");
        celdaPrecio.textContent = precioFormateado;

        const celdaAcciones = document.createElement("td");
        celdaAcciones.innerHTML = `
            <button class="boton-tabla boton-ver" type="button">Ver</button>
            <button class="boton-tabla boton-editar" type="button">Editar</button>
            <button class="boton-tabla boton-eliminar" type="button">Eliminar</button>
        `;

        fila.append(celdaId, celdaNombre, celdaDescripcion, celdaPrecio, celdaAcciones);
        tablaServicios.appendChild(fila);

        nombreServicio.value = "";
        precioServicio.value = "";
        descripcionServicio.value = "";

        formularioServicio.style.display = "none";
        formularioServicio.querySelector("h2").textContent = "Nuevo servicio";
        formularioServicio.querySelector(".formulario-encabezado p").textContent =
            "Ingresa la información del nuevo servicio.";
        btnGuardarServicio.textContent = "Guardar servicio";

        alert("Servicio guardado correctamente.");
    });

    /* Editar servicio: cargar datos en el formulario */
    tablaServicios.addEventListener("click", function(event) {
        const boton = event.target.closest(".boton-editar");

        if (boton) {
            servicioEditando = boton.closest("tr");

            nombreServicio.value = servicioEditando.cells[1].textContent;
            precioServicio.value = servicioEditando.cells[3].textContent
                .replace(/[$,\s]/g, "");
            descripcionServicio.value =
                servicioEditando.cells[2].textContent === "Sin descripción"
                    ? ""
                    : servicioEditando.cells[2].textContent;

            formularioServicio.querySelector("h2").textContent = "Editar servicio";
            formularioServicio.querySelector(".formulario-encabezado p").textContent =
                "Modifica la información del servicio.";
            btnGuardarServicio.textContent = "Guardar cambios";

            formularioServicio.style.display = "block";
        }
    });

    /* Ver información del servicio */
    tablaServicios.addEventListener("click", function(event) {
        const boton = event.target.closest(".boton-ver");

        if (boton) {
            const fila = boton.closest("tr");

            verIdServicio.textContent = fila.cells[0].textContent;
            verNombreServicio.textContent = fila.cells[1].textContent;
            verDescripcionServicio.textContent = fila.cells[2].textContent;
            verPrecioServicio.textContent = fila.cells[3].textContent;

            ventanaServicio.style.display = "flex";
        }
    });

    /* Cerrar ventana de información */
    btnCerrarVentanaServicio.addEventListener("click", function() {
        ventanaServicio.style.display = "none";
    });

    /* Cerrar al hacer clic fuera de la ventana */
    ventanaServicio.addEventListener("click", function(event) {
        if (event.target === ventanaServicio) {
            ventanaServicio.style.display = "none";
        }
    });

    
    /* Eliminar servicio */
    tablaServicios.addEventListener("click", function(event) {
        const boton = event.target.closest(".boton-eliminar");

        if (boton) {
            const fila = boton.closest("tr");
            const nombre = fila.cells[1].textContent;

            const confirmar = confirm(
                `¿Estás seguro de que deseas eliminar el servicio "${nombre}"?`
            );

            if (confirmar) {
                if (servicioEditando === fila) {
                    servicioEditando = null;
                    formularioServicio.style.display = "none";
                    nombreServicio.value = "";
                    precioServicio.value = "";
                    descripcionServicio.value = "";

                    formularioServicio.querySelector("h2").textContent = "Nuevo servicio";
                    formularioServicio.querySelector(".formulario-encabezado p").textContent =
                        "Ingresa la información del nuevo servicio.";
                    btnGuardarServicio.textContent = "Guardar servicio";
                }

                fila.remove();
                alert("Servicio eliminado correctamente.");
            }
        }
    });
 
    /* Buscar servicios por nombre o descripción */
    buscarServicio.addEventListener("input", function() {
        const busqueda = buscarServicio.value.toLowerCase().trim();
        const filas = tablaServicios.querySelectorAll("tr");

        filas.forEach(function(fila) {
            const nombre = fila.cells[1].textContent.toLowerCase();
            const descripcion = fila.cells[2].textContent.toLowerCase();

            if (nombre.includes(busqueda) || descripcion.includes(busqueda)) {
                fila.style.display = "";
            } else {
                fila.style.display = "none";
            }
        });
    });