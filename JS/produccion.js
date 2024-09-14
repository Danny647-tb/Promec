let clientes = [];

// Cargar la información al inicio
document.addEventListener('DOMContentLoaded', function () {
    cargarGiros();
    cargarClientes();
    mostrarCampos(); // Asegurarse de mostrar los campos correctos según el tipo de cliente almacenado
    agregarEventos();
});

document.getElementById("clienteForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let tipoCliente = document.getElementById("tipoCliente").value;

    let cliente = {
        tipo: tipoCliente === "personaNatural" ? "Persona Natural" : "Empresa",
        nombre: tipoCliente === "personaNatural" ? document.getElementById("nombrePersona").value : document.getElementById("nombreEmpresa").value,
        contacto: tipoCliente === "personaNatural" ? document.getElementById("documento").value : document.getElementById("nombreContacto").value,
        telefono: tipoCliente === "personaNatural" ? document.getElementById("telefonoPersona").value : document.getElementById("telefonoEmpresa").value,
        email: tipoCliente === "personaNatural" ? document.getElementById("emailPersona").value : document.getElementById("emailEmpresa").value,
        direccion: tipoCliente === "personaNatural" ? document.getElementById("direccionPersona").value : document.getElementById("direccionEmpresa").value,
        fechaRegistro: tipoCliente === "personaNatural" ? document.getElementById("fechaRegistroPersona").value : document.getElementById("fechaRegistroEmpresa").value,
        nit: tipoCliente === "empresa" ? document.getElementById("nitEmpresa").value : undefined,
        giroNegocio: tipoCliente === "empresa" ? document.getElementById("giroNegocioEmpresa").value : undefined
    };

    // Verificar si estamos editando o creando un nuevo cliente
    if (document.getElementById("clienteForm").dataset.editIndex) {
        clientes[document.getElementById("clienteForm").dataset.editIndex] = cliente;
    } else {
        clientes.push(cliente);
    }

    guardarClientes();
    mostrarClientes();
    resetForm();
});

function mostrarClientes() {
    let lista = document.getElementById("listaClientes");
    lista.innerHTML = "";
    clientes.forEach((cliente, index) => {
        let nuevaFila = `
            <tr>
                <td>${cliente.tipo}</td>
                <td>${cliente.nombre}</td>
                <td>${cliente.contacto}</td>
                <td>${cliente.telefono}</td>
                <td>${cliente.email}</td>
                <td>${cliente.direccion}</td>
                <td>${cliente.nit || ''}</td>
                <td>${cliente.giroNegocio || ''}</td>
                <td>${cliente.fechaRegistro}</td>
                <td>
                    <button class="btn btn-sm btn-warning" onclick="editarCliente(${index})">Editar</button>
                    <button class="btn btn-sm btn-danger" onclick="eliminarCliente(${index})">Eliminar</button>
                </td>
            </tr>
        `;
        lista.insertAdjacentHTML('beforeend', nuevaFila);
    });
}

function editarCliente(index) {
    let cliente = clientes[index];
    document.getElementById("tipoCliente").value = cliente.tipo === "Persona Natural" ? "personaNatural" : "empresa";
    mostrarCampos(); // Mostrar campos correspondientes

    if (cliente.tipo === "Persona Natural") {
        document.getElementById("nombrePersona").value = cliente.nombre;
        document.getElementById("documento").value = cliente.contacto;
        document.getElementById("telefonoPersona").value = cliente.telefono;
        document.getElementById("emailPersona").value = cliente.email;
        document.getElementById("direccionPersona").value = cliente.direccion;
        document.getElementById("fechaRegistroPersona").value = cliente.fechaRegistro;
    } else {
        document.getElementById("nombreEmpresa").value = cliente.nombre;
        document.getElementById("nitEmpresa").value = cliente.nit;
        document.getElementById("nombreContacto").value = cliente.contacto;
        document.getElementById("telefonoEmpresa").value = cliente.telefono;
        document.getElementById("emailEmpresa").value = cliente.email;
        document.getElementById("direccionEmpresa").value = cliente.direccion;
        document.getElementById("fechaRegistroEmpresa").value = cliente.fechaRegistro;
        document.getElementById("giroNegocioEmpresa").value = cliente.giroNegocio;
    }

    document.getElementById("clienteForm").dataset.editIndex = index; // Guardar índice para edición
}

function eliminarCliente(index) {
    if (confirm("¿Estás seguro de que quieres eliminar este cliente?")) {
        clientes.splice(index, 1);
        guardarClientes();
        mostrarClientes();
        resetForm();
    }
}

function resetForm() {
    document.getElementById("clienteForm").reset();
    document.getElementById("camposPersonaNatural").style.display = "none";
    document.getElementById("camposEmpresa").style.display = "none";
    delete document.getElementById("clienteForm").dataset.editIndex; // Eliminar índice de edición
}

function mostrarCampos() {
    let tipoCliente = document.getElementById("tipoCliente").value;
    if (tipoCliente === "personaNatural") {
        document.getElementById("camposPersonaNatural").style.display = "block";
        document.getElementById("camposEmpresa").style.display = "none";
    } else if (tipoCliente === "empresa") {
        document.getElementById("camposPersonaNatural").style.display = "none";
        document.getElementById("camposEmpresa").style.display = "block";
        actualizarGirosSelect(); // Actualizar la lista de giros cuando se muestra el formulario de empresa
    } else {
        document.getElementById("camposPersonaNatural").style.display = "none";
        document.getElementById("camposEmpresa").style.display = "none";
    }
}

function cargarGiros() {
    let giros = JSON.parse(localStorage.getItem("girosNegocio")) || [];
    const listaGiros = document.getElementById("listaGiros");
    listaGiros.innerHTML = '';
    giros.forEach((giro) => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.innerHTML = `
            ${giro} 
            <button class="btn btn-danger btn-sm ms-3" onclick="eliminarGiro('${giro}')">Eliminar</button>
        `;
        listaGiros.appendChild(listItem);
    });
    actualizarGirosSelect();
}

function actualizarGirosSelect() {
    const giroNegocioSelect = document.getElementById("giroNegocioEmpresa");
    let giros = JSON.parse(localStorage.getItem("girosNegocio")) || [];
    giroNegocioSelect.innerHTML = '<option value="">Seleccione un giro de negocio</option>';
    giros.forEach(giro => {
        let option = document.createElement('option');
        option.value = giro;
        option.textContent = giro;
        giroNegocioSelect.appendChild(option);
    });
}

document.getElementById("nuevoGiroForm").addEventListener("submit", function (e) {
    e.preventDefault();
    let nuevoGiro = document.getElementById("nuevoGiro").value.trim();
    if (!nuevoGiro) return;

    let giros = JSON.parse(localStorage.getItem("girosNegocio")) || [];

    if (!giros.includes(nuevoGiro)) {
        giros.push(nuevoGiro);
        localStorage.setItem("girosNegocio", JSON.stringify(giros));
        cargarGiros();
        resetForm();
        let modal = bootstrap.Modal.getInstance(document.getElementById('gestionarGiroModal'));
        modal.hide();
    } else {
        alert("Este giro ya está registrado.");
    }
});

function eliminarGiro(giroNombre) {
    if (confirm("¿Estás seguro de que quieres eliminar este giro de negocio?")) {
        let giros = JSON.parse(localStorage.getItem("girosNegocio")) || [];
        giros = giros.filter(giro => giro !== giroNombre);
        localStorage.setItem("girosNegocio", JSON.stringify(giros));
        cargarGiros();
    }
}

function guardarClientes() {
    localStorage.setItem("clientes", JSON.stringify(clientes));
}

function cargarClientes() {
    clientes = JSON.parse(localStorage.getItem("clientes")) || [];
    mostrarClientes();
}

function agregarEventos() {
    document.getElementById("searchBar").addEventListener("input", function () {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll("#listaClientes tr");
        rows.forEach(row => {
            const nombre = row.cells[1].textContent.toLowerCase();
            const empresa = row.cells[2].textContent.toLowerCase();
            if (nombre.includes(searchTerm) || empresa.includes(searchTerm)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
}



// Mostrar historial de clientes
function cargarHistorialClientes() {
    let listaHistorial = document.getElementById("listaHistorial");
    listaHistorial.innerHTML = ""; // Limpiar la lista antes de llenarla

    // Si no hay clientes, mostrar un mensaje
    if (clientes.length === 0) {
        listaHistorial.innerHTML = `<li class="list-group-item">No hay clientes registrados.</li>`;
        return;
    }

    // Mostrar todos los clientes en el historial
    clientes.forEach((cliente, index) => {
        let listItem = document.createElement("li");
        listItem.className = "list-group-item d-flex justify-content-between align-items-center";
        listItem.innerHTML = `
            ${cliente.nombre}
            <button class="btn btn-sm btn-primary" onclick="verDetalles(${index})">Ver detalles</button>
        `;
        listaHistorial.appendChild(listItem);
    });
}

// Filtrar historial por nombre
function filtrarHistorial() {
    let input = document.getElementById("searchHistorial").value.toLowerCase();
    let listaHistorial = document.getElementById("listaHistorial");
    listaHistorial.innerHTML = ""; // Limpiar el historial antes de llenarlo

    let clientesFiltrados = clientes.filter(cliente => cliente.nombre.toLowerCase().includes(input));

    // Si no hay clientes que coincidan con la búsqueda, mostrar mensaje
    if (clientesFiltrados.length === 0) {
        listaHistorial.innerHTML = `<li class="list-group-item">No se encontraron clientes.</li>`;
        return;
    }

    clientesFiltrados.forEach((cliente, index) => {
        let listItem = document.createElement("li");
        listItem.className = "list-group-item d-flex justify-content-between align-items-center";
        listItem.innerHTML = `
            ${cliente.nombre}
            <button class="btn btn-sm btn-primary" onclick="verDetalles(${index})">Ver detalles</button>
        `;
        listaHistorial.appendChild(listItem);
    });
}

// Mostrar detalles del cliente en el modal
function verDetalles(index) {
    let cliente = clientes[index];
    let detallesDiv = document.getElementById("detallesCliente");

    detallesDiv.innerHTML = `
        <p><strong>Tipo de Cliente:</strong> ${cliente.tipo}</p>
        <p><strong>Nombre:</strong> ${cliente.nombre}</p>
        <p><strong>Teléfono:</strong> ${cliente.telefono}</p>
        <p><strong>Email:</strong> ${cliente.email}</p>
        <p><strong>Dirección:</strong> ${cliente.direccion}</p>
        <p><strong>NIT:</strong> ${cliente.nit || "-"}</p>
        <p><strong>Giro de Negocio:</strong> ${cliente.giroNegocio || "-"}</p>
        <p><strong>Fecha de Registro:</strong> ${cliente.fechaRegistro}</p>
    `;

    // Mostrar el modal de detalles
    let detalleClienteModal = new bootstrap.Modal(document.getElementById('detalleClienteModal'));
    detalleClienteModal.show();
}

// Cargar el historial cuando la página cargue
document.addEventListener("DOMContentLoaded", cargarHistorialClientes);


//COMPRAS DEL CLIENTE 

let clienteSeleccionadoIndex = -1;

// Función para abrir el modal de compras
function abrirModalCompra() {
    // Abrir el modal de añadir compra
    let modalCompra = new bootstrap.Modal(document.getElementById('modalCompra'));
    modalCompra.show();
}

// Función para guardar la compra
function guardarCompra() {
    let descripcion = document.getElementById("descripcionCompra").value;
    let precio = document.getElementById("precioCompra").value;

    if (descripcion === "" || precio === "") {
        alert("Por favor, complete todos los campos.");
        return;
    }

    // Añadir la compra al cliente seleccionado
    let cliente = clientes[clienteSeleccionadoIndex];
    if (!cliente.compras) {
        cliente.compras = [];
    }

    cliente.compras.push({
        descripcion: descripcion,
        precio: parseFloat(precio)
    });

    // Guardar en el localStorage
    localStorage.setItem("clientes", JSON.stringify(clientes));

    // Limpiar el formulario
    document.getElementById("formCompra").reset();

    // Cerrar el modal de compra
    let modalCompra = bootstrap.Modal.getInstance(document.getElementById('modalCompra'));
    modalCompra.hide();

    alert("Compra añadida con éxito.");
}

// Función para mostrar los detalles del cliente y abrir el modal de detalles
function verDetalles(index) {
    clienteSeleccionadoIndex = index; // Guardar el índice del cliente seleccionado
    let cliente = clientes[index];
    let detallesDiv = document.getElementById("detallesCliente");

    let comprasHtml = '';
    if (cliente.compras && cliente.compras.length > 0) {
        comprasHtml = '<h6>Compras realizadas:</h6><ul>';
        cliente.compras.forEach((compra, i) => {
            comprasHtml += `<li>${compra.descripcion} - $${compra.precio.toFixed(2)}</li>`;
        });
        comprasHtml += '</ul>';
    } else {
        comprasHtml = '<p>No ha realizado ninguna compra aún.</p>';
    }

    detallesDiv.innerHTML = `
        <p><strong>Tipo de Cliente:</strong> ${cliente.tipo}</p>
        <p><strong>Nombre:</strong> ${cliente.nombre}</p>
        <p><strong>Teléfono:</strong> ${cliente.telefono}</p>
        <p><strong>Email:</strong> ${cliente.email}</p>
        <p><strong>Dirección:</strong> ${cliente.direccion}</p>
        <p><strong>NIT:</strong> ${cliente.nit || "-"}</p>
        <p><strong>Giro de Negocio:</strong> ${cliente.giroNegocio || "-"}</p>
        <p><strong>Fecha de Registro:</strong> ${cliente.fechaRegistro}</p>
        ${comprasHtml}
    `;

    // Abrir el modal de detalles
    let detalleClienteModal = new bootstrap.Modal(document.getElementById('detalleClienteModal'));
    detalleClienteModal.show();
}
