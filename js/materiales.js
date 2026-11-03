const btnNuevoMaterial = document.getElementById("btnNuevoMaterial");
const btnCancelarMaterial = document.getElementById("btnCancelarMaterial");
const btnGuardarMaterial = document.getElementById("btnGuardarMaterial");
const formularioMaterial = document.getElementById("formularioMaterial");
const tablaMateriales = document.getElementById("tablaMateriales");
const buscarMaterial = document.getElementById("buscarMaterial");
const nombreMaterial = document.getElementById("nombreMaterial");
const unidadMaterial = document.getElementById("unidadMaterial");
const costoMaterial = document.getElementById("costoMaterial");
const descripcionMaterial = document.getElementById("descripcionMaterial");
let materialEditando = null;
const ventanaMaterial = document.getElementById("ventanaMaterial");
const btnCerrarVentanaMaterial = document.getElementById(
  "btnCerrarVentanaMaterial",
);

const verIdMaterial = document.getElementById("verIdMaterial");
const verNombreMaterial = document.getElementById("verNombreMaterial");
const verDescripcionMaterial = document.getElementById(
  "verDescripcionMaterial",
);
const verUnidadMaterial = document.getElementById("verUnidadMaterial");
const verCostoMaterial = document.getElementById("verCostoMaterial");

/* Abrir formulario para registrar un material */
btnNuevoMaterial.addEventListener("click", function () {
  materialEditando = null;

  nombreMaterial.value = "";
  unidadMaterial.value = "";
  costoMaterial.value = "";
  descripcionMaterial.value = "";

  formularioMaterial.querySelector("h2").textContent = "Nuevo material";
  formularioMaterial.querySelector(".formulario-encabezado p").textContent =
    "Ingresa la información del nuevo material.";
  btnGuardarMaterial.textContent = "Guardar material";

  formularioMaterial.style.display = "block";
});

/* Cancelar el formulario */
btnCancelarMaterial.addEventListener("click", function () {
  formularioMaterial.style.display = "none";
  materialEditando = null;
});

/* Guardar un nuevo material */
btnGuardarMaterial.addEventListener("click", function () {
  const nombre = nombreMaterial.value.trim();
  const unidad = unidadMaterial.value;
  const costo = Number(costoMaterial.value);
  const descripcion = descripcionMaterial.value.trim() || "Sin descripción";

  /* Validar los campos */
  if (nombre === "") {
    alert("Ingresa el nombre del material.");
    return;
  }

  if (unidad === "") {
    alert("Selecciona una unidad de medida.");
    return;
  }

  if (
    costoMaterial.value.trim() === "" ||
    !Number.isFinite(costo) ||
    costo <= 0
  ) {
    alert("Ingresa un costo válido mayor a cero.");
    return;
  }

  /* Actualizar un material existente */
  if (materialEditando !== null) {
    const celdas = materialEditando.cells;

    celdas[1].textContent = nombre;
    celdas[2].textContent = descripcion;
    celdas[3].textContent = unidad;
    celdas[4].textContent = costo.toLocaleString("es-MX", {
      style: "currency",
      currency: "MXN",
    });

    /* Limpiar y cerrar el formulario */
    nombreMaterial.value = "";
    unidadMaterial.value = "";
    costoMaterial.value = "";
    descripcionMaterial.value = "";

    formularioMaterial.style.display = "none";
    materialEditando = null;

    alert("Material actualizado correctamente.");
    return;
  }

  /* Generar el siguiente ID */
  let ultimoId = 0;

  tablaMateriales.querySelectorAll("tr").forEach(function (fila) {
    const id = Number(fila.cells[0].textContent);

    if (id > ultimoId) {
      ultimoId = id;
    }
  });

  const nuevoId = String(ultimoId + 1).padStart(3, "0");

  /* Dar formato al costo */
  const costoFormato = costo.toLocaleString("es-MX", {
    style: "currency",
    currency: "MXN",
  });

  /* Crear el nuevo registro */
  const nuevaFila = document.createElement("tr");

  nuevaFila.innerHTML = `
                <td>${nuevoId}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>${costoFormato}</td>
                <td>
                    <button class="boton-tabla boton-ver" type="button">Ver</button>
                    <button class="boton-tabla boton-editar" type="button">Editar</button>
                    <button class="boton-tabla boton-eliminar" type="button">Eliminar</button>
                </td>
            `;

  nuevaFila.cells[1].textContent = nombre;
  nuevaFila.cells[2].textContent = descripcion;
  nuevaFila.cells[3].textContent = unidad;

  tablaMateriales.appendChild(nuevaFila);

  /* Limpiar y cerrar el formulario */
  nombreMaterial.value = "";
  unidadMaterial.value = "";
  costoMaterial.value = "";
  descripcionMaterial.value = "";

  formularioMaterial.style.display = "none";

  alert("Material registrado correctamente.");
});

/* Editar un material */
tablaMateriales.addEventListener("click", function (evento) {
  if (evento.target.classList.contains("boton-editar")) {
    materialEditando = evento.target.closest("tr");

    const celdas = materialEditando.cells;

    nombreMaterial.value = celdas[1].textContent;
    descripcionMaterial.value =
      celdas[2].textContent === "Sin descripción" ? "" : celdas[2].textContent;
    unidadMaterial.value = celdas[3].textContent;
    costoMaterial.value = celdas[4].textContent.replace(/[$,\s]/g, "");

    formularioMaterial.querySelector("h2").textContent = "Editar material";
    formularioMaterial.querySelector(".formulario-encabezado p").textContent =
      "Modifica la información del material seleccionado.";
    btnGuardarMaterial.textContent = "Guardar cambios";

    formularioMaterial.style.display = "block";
  }
});

/* Ver información de un material */
tablaMateriales.addEventListener("click", function (evento) {
  if (evento.target.classList.contains("boton-ver")) {
    const fila = evento.target.closest("tr");
    const celdas = fila.cells;

    verIdMaterial.textContent = celdas[0].textContent;
    verNombreMaterial.textContent = celdas[1].textContent;
    verDescripcionMaterial.textContent = celdas[2].textContent;
    verUnidadMaterial.textContent = celdas[3].textContent;
    verCostoMaterial.textContent = celdas[4].textContent;

    ventanaMaterial.style.display = "flex";
  }
});

/* Cerrar ventana de información */
btnCerrarVentanaMaterial.addEventListener("click", function () {
  ventanaMaterial.style.display = "none";
});

/* Cerrar al hacer clic fuera de la ventana */
ventanaMaterial.addEventListener("click", function (evento) {
  if (evento.target === ventanaMaterial) {
    ventanaMaterial.style.display = "none";
  }
});

/* Eliminar material */
tablaMateriales.addEventListener("click", function (event) {
  const boton = event.target.closest(".boton-eliminar");

  if (boton) {
    const fila = boton.closest("tr");
    const nombre = fila.cells[1].textContent;

    const confirmar = confirm(
      `¿Estás seguro de que deseas eliminar el material "${nombre}"?`,
    );

    if (confirmar) {
      if (materialEditando === fila) {
        materialEditando = null;
        formularioMaterial.style.display = "none";
        nombreMaterial.value = "";
        unidadMaterial.value = "";
        costoMaterial.value = "";
        descripcionMaterial.value = "";

        formularioMaterial.querySelector("h2").textContent = "Nuevo material";
        formularioMaterial.querySelector(
          ".formulario-encabezado p",
        ).textContent = "Ingresa la información del nuevo material.";
        btnGuardarMaterial.textContent = "Guardar material";
      }

      fila.remove();
      alert("Material eliminado correctamente.");
    }
  }
});

/* Buscar materiales por nombre o descripción */
buscarMaterial.addEventListener("input", function () {
  const busqueda = buscarMaterial.value.toLowerCase().trim();
  const filas = tablaMateriales.querySelectorAll("tr");

  filas.forEach(function (fila) {
    const nombre = fila.cells[1].textContent.toLowerCase();
    const descripcion = fila.cells[2].textContent.toLowerCase();

    if (nombre.includes(busqueda) || descripcion.includes(busqueda)) {
      fila.style.display = "";
    } else {
      fila.style.display = "none";
    }
  });
});
