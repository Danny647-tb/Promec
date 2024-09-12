<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Promec.Jr S.A.S | Proveedores</title>
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
        /* Modal Customization */
        .modal-content {
            border-radius: 10px; /* Esquinas redondeadas */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
        }

        .modal-header {
            background-color: #343a40; /* Color de fondo oscuro */
            color: #ffffff; /* Texto blanco */
            border-bottom: 1px solid #dee2e6; /* Línea inferior sutil */
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-body {
            padding: 2rem; /* Espaciado más amplio */
        }

        .modal-footer {
            border-top: 1px solid #dee2e6; /* Línea superior sutil */
        }

        .btn-primary {
            background-color: #dc3545; /* Color rojo de Bootstrap */
            border-color: #dc3545; /* Color de borde rojo */
        }

        .btn-secondary {
            background-color: #6c757d; /* Color gris claro de Bootstrap */
            border-color: #6c757d; /* Color de borde gris claro */
        }

        .btn-close {
            background-color: transparent; /* Fondo transparente para el botón de cerrar */
            border: none; /* Sin borde */
        }

        .btn-close:hover {
            opacity: 0.8; /* Reducir opacidad en hover */
        }

        .img-logo {
            width: 80px; /* Ajusta el tamaño según tus necesidades */
            height: 80px; /* Ajusta el tamaño según tus necesidades */
            border-radius: 50%; /* Hacer la imagen redonda */
            object-fit: cover; /* Ajustar la imagen para que cubra el área sin distorsionarse */
        }

        #cantidadActual {
            color: black;
        }
        /* Cambiar el color del título "Giros de Negocio Existentes" */
        .modal-body h6 {
        color: #343a40; /* Cambia este valor al color que prefieras */
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
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Configuración</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="signin.html" class="dropdown-item">Iniciar Sesión</a>
                        <a href="signup.html" class="dropdown-item">Registrarse</a>
                        <a href="blank.html" class="dropdown-item">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- FIN DE MENU LATERAL -->

    <div class="container mt-5">
    <img src="img/Logo2.png" alt="Logo" class="logo">
        <h2 class="text-center text-danger">Registrar Proveedor</h2>
        <form id="proveedorForm" class="form-container">
            <div class="form-group">
                <label for="nombreProveedor" class="form-label">Nombre del Proveedor</label>
                <input type="text" class="form-control" id="nombreProveedor" required>
            </div>

            <div class="form-group">
                <label for="contacto" class="form-label">Contacto</label>
                <input type="text" class="form-control" id="contacto" required>
            </div>

            <div class="form-group">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>

            <div class="form-group">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" required>
            </div>

            <div class="form-group">
                <label for="giroNegocio" class="form-label">Giro de Negocio</label>
                <select class="form-control" id="giroNegocio">
                    <option value="">Seleccione un giro de negocio</option>
                    <!-- Las opciones se llenarán dinámicamente -->
                </select>
                <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#gestionarGiroModal">Agregar nuevo giro de negocio</a>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-danger">Registrar Proveedor</button>
            </div>
        </form>

        <div class="mt-5">
            <h3 class="text-danger">Proveedores Registrados</h3>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Giro de Negocio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="listaProveedores"></tbody>
            </table>
        </div>
    </div>

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

    <script>
        let proveedores = [];
        let editIndex = -1;

        document.addEventListener("DOMContentLoaded", function () {
            // Cargar proveedores y giros de negocio al cargar la página
            proveedores = JSON.parse(localStorage.getItem("proveedores")) || [];
            mostrarProveedores();
            cargarGiros();
            actualizarGirosSelect();
        });

        document.getElementById("proveedorForm").addEventListener("submit", function (e) {
            e.preventDefault();

            let nombreProveedor = document.getElementById("nombreProveedor").value;
            let contacto = document.getElementById("contacto").value;
            let telefono = document.getElementById("telefono").value;
            let email = document.getElementById("email").value;
            let direccion = document.getElementById("direccion").value;
            let giroNegocio = document.getElementById("giroNegocio").value;

            if (editIndex === -1) {
                agregarProveedor(nombreProveedor, contacto, telefono, email, direccion, giroNegocio);
            } else {
                actualizarProveedor(nombreProveedor, contacto, telefono, email, direccion, giroNegocio);
            }

            resetForm();
            guardarEnLocalStorage();
            mostrarProveedores();
        });

        function agregarProveedor(nombreProveedor, contacto, telefono, email, direccion, giroNegocio) {
            let nuevoProveedor = { nombreProveedor, contacto, telefono, email, direccion, giroNegocio };
            proveedores.push(nuevoProveedor);
            mostrarProveedores();
        }

        function actualizarProveedor(nombreProveedor, contacto, telefono, email, direccion, giroNegocio) {
            proveedores[editIndex] = { nombreProveedor, contacto, telefono, email, direccion, giroNegocio };
            editIndex = -1;
            mostrarProveedores();
        }

        function mostrarProveedores() {
            let lista = document.getElementById("listaProveedores");
            lista.innerHTML = "";
            proveedores.forEach((proveedor, index) => {
                let nuevaFila = `
                    <tr>
                        <td>${proveedor.nombreProveedor}</td>
                        <td>${proveedor.contacto}</td>
                        <td>${proveedor.telefono}</td>
                        <td>${proveedor.email}</td>
                        <td>${proveedor.direccion}</td>
                        <td>${proveedor.giroNegocio}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" onclick="editarProveedor(${index})">Editar</button>
                            <button class="btn btn-sm btn-danger" onclick="eliminarProveedor(${index})">Eliminar</button>
                        </td>
                    </tr>
                `;
                lista.insertAdjacentHTML('beforeend', nuevaFila);
            });
        }

        function editarProveedor(index) {
            let proveedor = proveedores[index];
            editIndex = index;

            document.getElementById("nombreProveedor").value = proveedor.nombreProveedor;
            document.getElementById("contacto").value = proveedor.contacto;
            document.getElementById("telefono").value = proveedor.telefono;
            document.getElementById("email").value = proveedor.email;
            document.getElementById("direccion").value = proveedor.direccion;
            document.getElementById("giroNegocio").value = proveedor.giroNegocio;
        }

        function eliminarProveedor(index) {
            if (confirm("¿Está seguro de que desea eliminar este proveedor?")) {
                proveedores.splice(index, 1);
                mostrarProveedores();
                guardarEnLocalStorage();
            }
        }

        function resetForm() {
            document.getElementById("proveedorForm").reset();
            editIndex = -1;
        }

        function guardarEnLocalStorage() {
            localStorage.setItem("proveedores", JSON.stringify(proveedores));
        }

        function cargarGiros() {
            let giros = JSON.parse(localStorage.getItem("girosNegocio")) || [];
            const listaGiros = document.getElementById("listaGiros");
            listaGiros.innerHTML = '';
            giros.forEach((giro, index) => {
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
            const giroNegocioSelect = document.getElementById("giroNegocio");
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
                document.getElementById("nuevoGiroForm").reset();
                let modal = bootstrap.Modal.getInstance(document.getElementById('gestionarGiroModal'));
                modal.hide();
            } else {
                alert("Este giro ya está registrado.");
            }
        });

        function eliminarGiro(giroNombre) {
            let giros = JSON.parse(localStorage.getItem("girosNegocio")) || [];
            giros = giros.filter(giro => giro !== giroNombre);
            localStorage.setItem("girosNegocio", JSON.stringify(giros));
            cargarGiros();
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
