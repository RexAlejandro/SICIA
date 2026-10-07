const btnNuevoCliente = document.getElementById("btnNuevoCliente");
const btnCancelarCliente = document.getElementById("btnCancelarCliente");
const btnGuardarCliente = document.getElementById("btnGuardarCliente");

const formularioCliente = document.getElementById("formularioCliente");
const tablaClientes = document.getElementById("tablaClientes");
const ventanaCliente = document.getElementById("ventanaCliente");
const btnCerrarVentana = document.getElementById("btnCerrarVentana");

const verNombre = document.getElementById("verNombre");
const verTelefono = document.getElementById("verTelefono");
const verCorreo = document.getElementById("verCorreo");
const verDireccion = document.getElementById("verDireccion");
const verNotas = document.getElementById("verNotas");

const buscarCliente = document.getElementById("buscarCliente");

const nombreCliente = document.getElementById("nombreCliente");
const telefonoCliente = document.getElementById("telefonoCliente");
const correoCliente = document.getElementById("correoCliente");
const direccionCliente = document.getElementById("direccionCliente");
const notasCliente = document.getElementById("notasCliente");

let clienteEditando = null;

/* Consultar información del cliente */
tablaClientes.addEventListener("click", function (event) {
  const boton = event.target.closest("button");

  if (boton && boton.textContent.trim() === "Ver") {
    const fila = boton.closest("tr");

    verNombre.textContent = fila.dataset.nombre || fila.cells[1].textContent;
    verTelefono.textContent =
      fila.dataset.telefono || fila.cells[2].textContent;
    verCorreo.textContent = fila.dataset.correo || fila.cells[3].textContent;
    verDireccion.textContent = fila.dataset.direccion || "No registrada";
    verNotas.textContent = fila.dataset.notas || "Sin notas";

    ventanaCliente.style.display = "flex";
  }
});

/* Editar cliente */
tablaClientes.addEventListener("click", function (event) {
  const boton = event.target.closest(".boton-editar");

  if (boton) {
    const fila = boton.closest("tr");

    clienteEditando = fila;

    nombreCliente.value = fila.dataset.nombre || fila.cells[1].textContent;
    telefonoCliente.value = fila.dataset.telefono || fila.cells[2].textContent;
    correoCliente.value = fila.dataset.correo || fila.cells[3].textContent;
    direccionCliente.value = fila.dataset.direccion || "";
    notasCliente.value = fila.dataset.notas || "";

    formularioCliente.style.display = "block";
  }
});

/* Cerrar ventana de información */
btnCerrarVentana.addEventListener("click", function () {
  ventanaCliente.style.display = "none";
});

/* Buscar clientes */
buscarCliente.addEventListener("input", function () {
  const textoBusqueda = buscarCliente.value.toLowerCase();

  const filas = tablaClientes.getElementsByTagName("tr");

  for (let i = 0; i < filas.length; i++) {
    const datosCliente = filas[i].textContent.toLowerCase();

    if (datosCliente.includes(textoBusqueda)) {
      filas[i].style.display = "";
    } else {
      filas[i].style.display = "none";
    }
  }
});

/* Abrir formulario */

btnNuevoCliente.addEventListener("click", function () {
  formularioCliente.style.display = "block";
});

/* Cancelar */

btnCancelarCliente.addEventListener("click", function () {
  formularioCliente.style.display = "none";

  nombreCliente.value = "";
  telefonoCliente.value = "";
  correoCliente.value = "";
  direccionCliente.value = "";
  notasCliente.value = "";
});

/* Guardar cliente */

btnGuardarCliente.addEventListener("click", function () {
  const nombre = nombreCliente.value.trim();
  const telefono = telefonoCliente.value.trim();
  const correo = correoCliente.value.trim();

  if (nombre === "") {
    alert("Por favor, ingresa el nombre del cliente.");
    nombreCliente.focus();
    return;
  }

  if (isNaN(parseInt(telefono)) || telefono === "") {
    alert("Por favor, ingrese un numero de telefono valido.");
    return;
  }

  if (clienteEditando) {
    clienteEditando.cells[1].textContent = nombre;
    clienteEditando.cells[2].textContent = telefono;
    clienteEditando.cells[3].textContent = correo;

    clienteEditando.dataset.nombre = nombre;
    clienteEditando.dataset.telefono = telefono;
    clienteEditando.dataset.correo = correo;
    clienteEditando.dataset.direccion = direccionCliente.value.trim();
    clienteEditando.dataset.notas = notasCliente.value.trim();

    formularioCliente.style.display = "none";

    nombreCliente.value = "";
    telefonoCliente.value = "";
    correoCliente.value = "";
    direccionCliente.value = "";
    notasCliente.value = "";

    clienteEditando = null;

    alert("Cliente actualizado correctamente.");
    return;
  }

  const numeroCliente = tablaClientes.rows.length + 1;

  const fila = document.createElement("tr");

  fila.dataset.nombre = nombre;
  fila.dataset.telefono = telefono;
  fila.dataset.correo = correo;
  fila.dataset.direccion = direccionCliente.value.trim();
  fila.dataset.notas = notasCliente.value.trim();

  fila.innerHTML = `
                <td>${String(numeroCliente).padStart(3, "0")}</td>
                <td>${nombre}</td>
                <td>${telefono}</td>
                <td>${correo}</td>
                <td>
                    <button class="boton-tabla">Ver</button>
                    <button class="boton-tabla boton-editar">Editar</button>
                </td>
            `;

  tablaClientes.appendChild(fila);

  formularioCliente.style.display = "none";

  nombreCliente.value = "";
  telefonoCliente.value = "";
  correoCliente.value = "";
  direccionCliente.value = "";
  notasCliente.value = "";

  alert("Cliente guardado correctamente.");
});
