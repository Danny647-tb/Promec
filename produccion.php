<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Promec.Jr S.A.S | Orden de Producción</title>
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
</head>

<body>
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
        /* Cambiar el color del título "Categorías Existentes" */
        #tituloCategorias {
        color: #dc3545; /* Cambia este valor al color que prefieras */
        }



/* Estilos para las alertas */
.alert {
    padding: 15px;
    border-radius: 5px;
    color: #fff;
    font-weight: bold;
}

/* Estilos específicos para cada estado */
.bg-danger {
    background-color: #dc3545; /* Rojo */
}

.bg-warning {
    background-color: #ffc107; /* Amarillo */
}

.bg-success {
    background-color: #28a745; /* Verde */
}

.bg-primary {
    background-color: #007bff; /* Azul */
}

/* Estilos adicionales para el texto */
.text-white {
    color: #fff;
}

    </style>

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
                <a href="papelera.php" class="nav-item nav-link"><i class="fa fa-trash-alt me-2"></i>Archivados</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Configuración</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="Login/signin.php" class="dropdown-item">Iniciar Sesión</a>
                        <a href="Login/signup.php" class="dropdown-item">Registrarse</a>
                        <a href="index.php" class="dropdown-item">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- FIN DE MENU LATERAL -->


    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ordenes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <img src="img/Logo2.png" alt="Logo" class="logo">
    <h2 class="text-center text-danger">Registrar Orden de Producción</h2>
    <form id="ordenProduccionForm" class="form-container">

    <div class="form-group">
            <label for="nombreCliente" class="form-label text-danger">Nombre del Cliente</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nombreCliente" placeholder="Seleccionar cliente..."
                       required>
                <!-- Botón que abre el modal y carga los datos -->
                <button type="button" class="btn btn-outline-primary ms-2" data-bs-toggle="modal"
                        data-bs-target="#historialClienteModal">
                    Ver Historial
                </button>
            </div>
        </div>



        <div class="form-group">
            <label for="descripcionProducto" class="form-label">Descripción del Producto</label>
            <textarea class="form-control" id="descripcionProducto" rows="3" required></textarea>
        </div>

        
        <div class="form-group">
            <label for="encargadoProduccion" class="form-label">Encargado de la Producción</label>
            <input type="text" class="form-control" id="encargadoProduccion" required>
        </div>


        <div class="form-group">
            <label for="estadoOrden" class="form-label">Estado de la Orden</label>
            <select class="form-select" id="estadoOrden" required>
                <option value="" disabled selected>Selecciona un estado</option>
                <option value="pendiente">Pendiente</option>
                <option value="en_proceso">En Proceso</option>
                <option value="completada">Completada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>
        <div id="alertaEstado" class="alert mt-3" role="alert" style="display: none;">
            <span id="alertaEstadoTexto"></span>
        </div>

        <div class="form-group">
            <label for="fechaCreacion" class="form-label">Fecha de Creación</label>
            <input type="date" class="form-control" id="fechaCreacion" required>
        </div>

        <div class="form-group">
            <label for="fechaEntrega" class="form-label">Fecha de Entrega Estimada</label>
            <input type="date" class="form-control" id="fechaEntrega" required>
        </div>

        <div class="form-group">
            <label for="cantidad" class="form-label text-danger">Cantidad</label>
            <div class="input-group">
                <input type="number" class="form-control" id="cantidad" required>
                <button type="button" class="btn btn-outline-primary ms-2" data-bs-toggle="modal" data-bs-target="#agregarStockModal">
                    <i class="bi bi-plus"></i> Agregar Stock
                </button>
            </div>
        </div>

        <div class="form-group">
            <label for="valorTotal" class="form-label">Valor Total</label>
            <input type="number" class="form-control" id="valorTotal" step="0.01" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-danger">Registrar Orden</button>
        </div>
    </form>

    <div class="mt-5">
        <h3 class="text-danger">Órdenes Registradas</h3>
        <input type="text" class="form-control mb-3" id="buscar" placeholder="Buscar por nombre del cliente o producto...">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Nombre del Cliente</th>
                    <th>Descripción</th>
                    <th>Encargado</th>
                    <th>Estado</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Entrega</th>
                    <th>Cantidad</th>
                    <th>Valor Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="listaOrdenes"></tbody>
        </table>
    </div>
</div>

<!-- Modal para agregar stock -->
<div class="modal fade" id="agregarStockModal" tabindex="-1" aria-labelledby="agregarStockModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="agregarStockModalLabel">Agregar Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="img/Logo2.png" alt="Logo" class="img-logo">
                </div>
                <form id="agregarStockForm">
                    <div class="mb-3">
                        <label for="nombreProductoStock" class="form-label">Nombre del Producto</label>
                        <select class="form-select" id="nombreProductoStock" required onchange="actualizarCantidadActual()">
                            <option value="" disabled selected>Seleccione un producto</option>
                            <!-- Opciones dinámicas que se llenarán con los productos existentes -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cantidadActual" class="form-label">Cantidad Actual</label>
                        <input type="number" class="form-control" id="cantidadActual" readonly>
                    </div>

                    <div class="mb-3 d-flex align-items-center">
                        <label for="cantidadAgregar" class="form-label me-2">Cantidad a Agregar</label>
                        <input type="number" class="form-control" id="cantidadAgregar" required>
                        <button type="button" class="btn btn-success ms-2" onclick="agregarStock()">Añadir Stock</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal para ver historial del cliente -->
<div class="modal fade" id="historialClienteModal" tabindex="-1" aria-labelledby="historialClienteModalLabel"
     aria-hidden="true">
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
                    <input type="text" id="searchHistorial" class="form-control" placeholder="Buscar en historial"
                           oninput="filtrarHistorial()">
                </div>

                <!-- Lista de historial -->
                <h6 class="mt-4">Historial de Cliente</h6>
                <ul id="listaHistorial" class="list-group">
                    <!-- El historial se llenará dinámicamente -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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


<script src="JS/produccion.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
