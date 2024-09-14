<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Promec.Jr S.A.S | Clientes</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="icon" href="img/Logo2.png" type="image/x-icon">
    <!-- ICONOS DE MENU -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- ESTILOS DEL MENU -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- ESTILOS DEL MENU -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: #343a40;
            color: #ffffff;
            border-bottom: 1px solid #dee2e6;
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
        }

        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-close {
            background-color: transparent;
            border: none;
        }

        .btn-close:hover {
            opacity: 0.8;
        }

        .img-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        #cantidadActual {
            color: black;
        }

        .modal-body h6 {
            color: #343a40;
        }
    </style>
</head>

<body>
    <!-- INICIO DE MENU LATERAL -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="inicio.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary">Promec.Jr</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="img/Logo2.png" alt="" style="width: 40px; height: 40px;">
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Claudia Molano</h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="inicio.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Inicio</a>
                <a href="inventario.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Inventario</a>
                <a href="clientes.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Clientes</a>
                <a href="cotizacion.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Cotización</a>
                <a href="facturacion.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Facturación</a>
                <a href="produccion.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Producción</a>
                <a href="produccion.php" class="nav-item nav-link"><i class="fa fa-trash-alt me-2"></i>Archivados</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Configuración</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="signin.html" class="dropdown-item">Iniciar Sesión</a>
                        <a href="signup.html" class="dropdown-item">Registrarse</a>
                        <a href="index.php" class="dropdown-item">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- FIN DE MENU LATERAL -->

    <div class="container mt-5">
    <img src="img/Logo2.png" alt="Logo" class="logo">
    <h2 class="text-danger">Registrar Cliente</h2>
    <form id="clienteForm">
        <div class="row">
            <!-- Columna completa para tipo de cliente y campos -->
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="tipoCliente" class="form-label text-danger">Tipo de Cliente</label>
                    <select class="form-select" id="tipoCliente" onchange="mostrarCampos()">
                        <option value="">Seleccione el tipo de cliente</option>
                        <option value="personaNatural">Persona Natural</option>
                        <option value="empresa">Empresa</option>
                    </select>
                </div>

                <!-- Campos para Persona Natural -->
                <div id="camposPersonaNatural" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombrePersona" class="form-label text-danger">Nombre</label>
                            <input type="text" class="form-control" id="nombrePersona">
                        </div>
                        <div class="col-md-6">
                            <label for="documento" class="form-label text-danger">Documento</label>
                            <input type="text" class="form-control" id="documento">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="telefonoPersona" class="form-label text-danger">Teléfono</label>
                            <input type="text" class="form-control" id="telefonoPersona">
                        </div>
                        <div class="col-md-6">
                            <label for="emailPersona" class="form-label text-danger">Email</label>
                            <input type="email" class="form-control" id="emailPersona">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="direccionPersona" class="form-label text-danger">Dirección</label>
                            <input type="text" class="form-control" id="direccionPersona">
                        </div>
                        <div class="col-md-6">
                            <label for="fechaRegistroPersona" class="form-label text-danger">Fecha de Registro</label>
                            <input type="date" class="form-control" id="fechaRegistroPersona">
                        </div>
                    </div>
                </div>

                <!-- Campos para Empresa -->
                <div id="camposEmpresa" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombreEmpresa" class="form-label text-danger">Nombre de la Empresa</label>
                            <input type="text" class="form-control" id="nombreEmpresa">
                        </div>
                        <div class="col-md-6">
                            <label for="nitEmpresa" class="form-label text-danger">NIT</label>
                            <input type="text" class="form-control" id="nitEmpresa">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="telefonoEmpresa" class="form-label text-danger">Teléfono de la Empresa</label>
                            <input type="text" class="form-control" id="telefonoEmpresa">
                        </div>
                        <div class="col-md-6">
                            <label for="emailEmpresa" class="form-label text-danger">Email</label>
                            <input type="email" class="form-control" id="emailEmpresa">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="direccionEmpresa" class="form-label text-danger">Dirección</label>
                            <input type="text" class="form-control" id="direccionEmpresa">
                        </div>
                        <div class="col-md-6">
                            <label for="fechaRegistroEmpresa" class="form-label text-danger">Fecha de Registro</label>
                            <input type="date" class="form-control" id="fechaRegistroEmpresa">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombreContacto" class="form-label text-danger">Nombre del Contacto</label>
                            <input type="text" class="form-control" id="nombreContacto">
                        </div>
                        <div class="col-md-6">
                            <label for="giroNegocioEmpresa" class="form-label text-danger">Giro del Negocio</label>
                            <div class="input-group">
                                <select class="form-select" id="giroNegocioEmpresa">
                                    <option value="">Seleccione un giro de negocio</option>
                                    <!-- Opciones se llenarán dinámicamente -->
                                </select>
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#gestionarGiroModal">
                                    <i class="bi bi-plus"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-danger">Registrar Cliente</button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#historialClienteModal">Historial del Cliente</button>
        </div>
    </form>

    <!-- Modal para agregar nuevo giro de negocio -->
    <div class="modal fade" id="gestionarGiroModal" tabindex="-1" aria-labelledby="gestionarGiroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gestionarGiroModalLabel">Agregar Nuevo Giro de Negocio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <img src="img/Logo2.png" alt="Logo" class="img-logo">
                    </div>
                    <form id="nuevoGiroForm">
                        <div class="mb-3">
                            <label for="nuevoGiro" class="form-label">Nuevo Giro de Negocio</label>
                            <input type="text" class="form-control" id="nuevoGiro" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Giro</button>
                    </form>
                    <h6 class="mt-4">Giros de Negocio Existentes</h6>
                    <ul id="listaGiros" class="list-group">
                        <!-- Los giros se llenarán dinámicamente -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

<!-- Modal para ver historial del cliente -->
<div class="modal fade" id="historialClienteModal" tabindex="-1" aria-labelledby="historialClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="historialClienteModalLabel">Historial del Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Campo de búsqueda -->
                <div class="mb-4">
                <img src="img/Logo2.png" alt="Logo" class="img-logo">
                    <input type="text" id="searchHistorial" class="form-control" placeholder="Buscar en historial" oninput="filtrarHistorial()">
                </div>

                <!-- Lista de historial -->
                <h6 class="mt-4">Historial de Cliente</h6>
                <ul id="listaHistorial" class="list-group">
                    <!-- El historial se llenará dinámicamente -->
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal para ver detalles del cliente -->
<div class="modal fade" id="detalleClienteModal" tabindex="-1" aria-labelledby="detalleClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalleClienteModalLabel">Detalles del Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <img src="img/Logo2.png" alt="Logo" class="img-logo">

                <div id="detallesCliente">
                    <!-- Aquí se mostrarán los detalles del cliente seleccionado -->
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-success" onclick="abrirModalCompra()">Añadir compra</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para añadir compra -->
<div class="modal fade" id="modalCompra" tabindex="-1" aria-labelledby="modalCompraLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCompraLabel">Añadir Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCompra">
                <img src="img/Logo2.png" alt="Logo" class="img-logo">
                    <div class="mb-3">
                        <label for="descripcionCompra" class="form-label">Descripción de la compra</label>
                        <input type="text" class="form-control" id="descripcionCompra" required>
                    </div>
                    <div class="mb-3">
                        <label for="precioCompra" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precioCompra" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="guardarCompra()">Guardar Compra</button>
            </div>
        </div>
    </div>
</div>

    <div class="mt-5">
        <h3 class="text-danger">Clientes Registrados</h3>
        <div class="mt-4">
            <input type="text" id="searchBar" class="form-control" placeholder="Buscar por nombre de cliente" oninput="filtrarClientes()">
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Tipo de Cliente</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>NIT</th>
                    <th>Giro de Negocio</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="listaClientes"></tbody>
        </table>
    </div>
</div>

<script>
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

</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
