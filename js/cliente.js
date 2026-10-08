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

tablaClientes.addEventListener("click", function (event) {
  const boton = event.target.closest("button");

  if (boton && boton.textContent.trim() === "Ver") {
    const fila = boton.closest("tr");

    verNombre.textContent = fila.dataset.nombre || fila.cells[1].textContent;
    verTelefono.textContent =
      fila.dataset.tel || fila.cells[2].textContent;
    verCorreo.textContent = fila.dataset.correo || fila.cells[3].textContent;
    verDireccion.textContent = fila.dataset.direccion || "No registrada";
    verNotas.textContent = fila.dataset.nota || "Sin nota";

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
    telefonoCliente.value = fila.dataset.tel || fila.cells[2].textContent;
    correoCliente.value = fila.dataset.correo || fila.cells[3].textContent;
    direccionCliente.value = fila.dataset.direccion || "";
    notasCliente.value = fila.dataset.nota || "";

    formularioCliente.style.display = "block";
  }
});

btnCerrarVentana.addEventListener("click", function () {
  ventanaCliente.style.display = "none";
});

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


btnNuevoCliente.addEventListener("click", function () {
  formularioCliente.style.display = "block";
});


btnCancelarCliente.addEventListener("click", function () {
  formularioCliente.style.display = "none";

  nombreCliente.value = "";
  telefonoCliente.value = "";
  correoCliente.value = "";
  direccionCliente.value = "";
  notasCliente.value = "";
});


/* Guardar cliente con Fetch API */
btnGuardarCliente.addEventListener("click", async function () {
  const nombre = nombreCliente.value.trim();
  const tel = telefonoCliente.value.trim();
  const correo = correoCliente.value.trim();
  const direccion = direccionCliente.value.trim();
  const nota = notasCliente.value.trim();

  if (nombre === "") {
    alert("Por favor, ingresa el nombre del cliente.");
    nombreCliente.focus();
    return;
  }

  const regexTelefono = /^[0-9\s]+$/;
  if (!regexTelefono.test(tel) || tel === "") {
    alert("Por favor, ingrese un número de teléfono válido.");
    return;
  }

  const datosFormulario = new FormData();
  datosFormulario.append("nombre", nombre);
  datosFormulario.append("tel", tel);
  datosFormulario.append("email", correo); 
  datosFormulario.append("direccion", direccion);
  datosFormulario.append("nota", nota);

  // Determinar si es una actualización (Editar) o un registro nuevo (Crear)
  if (clienteEditando) {
      datosFormulario.append("accion", "editar");
      datosFormulario.append("id_cliente", clienteEditando.dataset.id); 
  } else {
      datosFormulario.append("accion", "crear");
  }

  try {
    const respuesta = await fetch("guardar_cliente.php", {
      method: "POST",
      body: datosFormulario
    });

    // Leer la respuesta del servidor en formato JSON
    const resultado = await respuesta.json();

    if (resultado.exito) {
      alert(resultado.mensaje); 

      if (clienteEditando) {
        clienteEditando.cells[1].textContent = nombre;
        clienteEditando.cells[2].textContent = tel;
        clienteEditando.cells[3].textContent = correo;
        
        clienteEditando.dataset.nombre = nombre;
        clienteEditando.dataset.tel = tel;
        clienteEditando.dataset.correo = correo;
        clienteEditando.dataset.direccion = direccion;
        clienteEditando.dataset.nota = nota;
        
        clienteEditando = null;
      } else {
        const numeroCliente = tablaClientes.rows.length + 1;
        const fila = document.createElement("tr");
        
        fila.dataset.id = resultado.id_insertado; 
        fila.dataset.nombre = nombre;
        fila.dataset.tel = tel;
        fila.dataset.correo = correo;
        fila.dataset.direccion = direccion;
        fila.dataset.nota = nota;

        fila.innerHTML = `
            <td>${String(numeroCliente).padStart(3, "0")}</td>
            <td>${nombre}</td>
            <td>${tel}</td>
            <td>${correo}</td>
            <td>
                <button class="boton-tabla">Ver</button>
                <button class="boton-tabla boton-editar">Editar</button>
            </td>
        `;
        tablaClientes.appendChild(fila);
      }

      formularioCliente.style.display = "none";
      nombreCliente.value = "";
      telefonoCliente.value = "";
      correoCliente.value = "";
      direccionCliente.value = "";
      notasCliente.value = "";

    } else {
      alert("Error en el servidor: " + resultado.mensaje);
    }

  } catch (error) {
    console.error("Error en la petición Fetch:", error);
    alert("Ocurrió un error de conexión con el servidor.");
  }
});