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
    <div class="input-group">
        <select class="form-select" id="encargadoProduccion" required>
            <option value="">Seleccione...</option>
        </select>
        <button type="button" class="btn btn-outline-primary ms-2" data-bs-toggle="modal" data-bs-target="#encargadoProduccionModal">
            <i class="bi bi-plus"></i> Agregar Encargado
        </button>
    </div>
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
                        <label for="materiales" class="form-label">Materiales Necesarios</label>
                        <div id="materiales">
                            <!-- Se agregarán dinámicamente los materiales y cantidades aquí -->
                        </div>
                        <button type="button" class="btn btn-primary mt-2" onclick="agregarMaterial()">Añadir Material</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="submitForm()">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Encargado-->
<div class="modal fade" id="encargadoProduccionModal" tabindex="-1" aria-labelledby="encargadoProduccionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="encargadoProduccionModalLabel">Administrar Encargados de Producción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nuevoEncargado" class="form-label">Nombre del Encargado:</label>
                    <input type="text" class="form-control" id="nuevoEncargado" placeholder="Ingrese el nombre">
                </div>
                <div>
                    <label class="form-label">Encargados Actuales:</label>
                    <ul class="list-group" id="listaEncargados">
                        <!-- Aquí se agregarán los encargados -->
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregarEncargado">Agregar</button>
            </div>
        </div>
    </div>
</div>

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

<script>
    //ESTO ES LO DE LA CANTIDA Y EL STOCK, LAS FUNCIONES DEL RESTO DEL PROYETO VA A ARRIBA

function agregarMaterial() {
    const materialesDiv = document.getElementById('materiales');
    const materialInput = document.createElement('div');
    materialInput.className = 'd-flex mb-2 align-items-center';

    const selectMaterial = document.createElement('select');
    selectMaterial.className = 'form-select me-2';
    selectMaterial.required = true;
    selectMaterial.innerHTML = `
        <option value="" disabled selected>Seleccione un material</option>
        ${productos.map(producto => `<option value="${producto.nombreProducto}" data-cantidad="${producto.cantidadInicial}">${producto.nombreProducto}</option>`).join('')}
    `;

    const cantidadActualInput = document.createElement('input');
    cantidadActualInput.type = 'number';
    cantidadActualInput.className = 'form-control me-2';
    cantidadActualInput.placeholder = 'Cantidad Actual';
    cantidadActualInput.disabled = true; // Desactivado para que no se edite directamente

    const cantidadUtilizarInput = document.createElement('input');
    cantidadUtilizarInput.type = 'number';
    cantidadUtilizarInput.className = 'form-control me-2';
    cantidadUtilizarInput.placeholder = 'Cantidad a Utilizar';
    cantidadUtilizarInput.oninput = () => {
        const cantidadActual = parseInt(selectMaterial.selectedOptions[0].dataset.cantidad) || 0;
        if (cantidadUtilizarInput.value > cantidadActual) {
            alert("La cantidad a utilizar no puede ser mayor que la cantidad actual.");
            cantidadUtilizarInput.value = "";
        }
    };

    selectMaterial.onchange = () => {
        const cantidadActual = parseInt(selectMaterial.selectedOptions[0].dataset.cantidad) || 0;
        cantidadActualInput.value = cantidadActual;
    };

    const removeButton = document.createElement('button');
    removeButton.className = 'btn btn-danger';
    removeButton.innerText = 'Eliminar';
    removeButton.onclick = () => materialesDiv.removeChild(materialInput);

    materialInput.appendChild(selectMaterial);
    materialInput.appendChild(cantidadActualInput);
    materialInput.appendChild(cantidadUtilizarInput);
    materialInput.appendChild(removeButton);
    materialesDiv.appendChild(materialInput);
}

function submitForm() {
    // Lógica para guardar los cambios
    const materialesDiv = document.getElementById('materiales');
    const materialesInputs = materialesDiv.getElementsByTagName('div');

    Array.from(materialesInputs).forEach(materialInput => {
        const selectMaterial = materialInput.getElementsByTagName('select')[0];
        const cantidadUtilizar = materialInput.getElementsByTagName('input')[1].value;

        const producto = productos.find(p => p.nombreProducto === selectMaterial.value);
        if (producto) {
            const cantidadActual = producto.cantidadInicial;
            producto.cantidadInicial -= parseInt(cantidadUtilizar);
            if (producto.cantidadInicial < 0) producto.cantidadInicial = 0; // Evita que la cantidad sea negativa
            producto.valorTotal = producto.cantidadInicial * producto.precioUnidad; // Actualizar el valor total
        }
    });

    guardarEnLocalStorage();
    alert("Stock actualizado correctamente.");
    document.getElementById("agregarStockForm").reset();
    document.getElementById("agregarStockModal").querySelector('[data-bs-dismiss="modal"]').click(); // Cerrar modal
}

///////////////////////////////////

function submitForm() {
// Lógica para guardar los cambios
const materialesDiv = document.getElementById('materiales');
const materialesInputs = materialesDiv.getElementsByTagName('div');

Array.from(materialesInputs).forEach(materialInput => {
    const selectMaterial = materialInput.getElementsByTagName('select')[0];
    const cantidadUtilizar = materialInput.getElementsByTagName('input')[1].value;
    
    const producto = productos.find(p => p.nombreProducto === selectMaterial.value);
    if (producto) {
        const cantidadActual = producto.cantidadInicial;
        producto.cantidadInicial -= parseInt(cantidadUtilizar);
        if (producto.cantidadInicial < 0) producto.cantidadInicial = 0; // Evita que la cantidad sea negativa
        producto.valorTotal = producto.cantidadInicial * producto.precioUnidad; // Actualizar el valor total
    }
});

guardarEnLocalStorage();
alert("Stock actualizado correctamente.");

// Aquí añadimos la lógica para mostrar los materiales en el modal "Materiales"
mostrarMateriales();

document.getElementById("agregarStockForm").reset();
document.getElementById("agregarStockModal").querySelector('[data-bs-dismiss="modal"]').click(); // Cerrar modal
}
</script>
















<script src="JS/produccion.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
