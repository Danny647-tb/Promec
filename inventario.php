<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Promec.Jr S.A.S | Inventario</title>
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
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Configuración</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="Login/signin.php" class="dropdown-item">Iniciar Sesión</a>
                        <a href="Login/signup.php" class="dropdown-item">Registrarse</a>
                        <a href="blank.html" class="dropdown-item">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- FIN DE MENU LATERAL -->

    <div class="container mt-5">
    <img src="img/Logo2.png" alt="Logo" class="logo">
        <h2 class="text-center text-danger">Registrar Producto</h2>
        <form id="productoForm" class="form-container">
            <div class="form-group">
                <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombreProducto" required>
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción Detallada</label>
                <textarea class="form-control" id="descripcion" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-control" id="categoria">
                    <option value="">Seleccione una categoría</option>
                    <!-- Opciones de categoría se llenarán dinámicamente -->
                </select>
                <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#gestionarCategoriasModal">Agregar nueva categoría</a>
            </div>
            <div class="form-group">
    <label for="proveedor" class="form-label">Proveedor</label>
    <select class="form-control" id="proveedor">
        <option value="">Seleccione un proveedor</option>
        <!-- Las opciones se llenarán dinámicamente -->
    </select>
    <a href="proveedores.php" class="text-danger">Agregar nuevo proveedor</a>
</div>
            <div class="form-group">
                <label for="cantidadInicial" class="form-label">Cantidad Inicial</label>
                <input type="number" class="form-control" id="cantidadInicial" required>
            </div>

            <div class="form-group">
                <label for="precioUnidad" class="form-label">Precio por Unidad</label>
                <input type="number" class="form-control" id="precioUnidad" required>
            </div>

            <div class="form-group">
                <label for="valorTotal" class="form-label">Valor Total</label>
                <input type="number" class="form-control" id="valorTotal" readonly>
            </div>

            <div class="form-group">
                <label for="fechaRegistro" class="form-label">Fecha de Registro</label>
                <input type="date" class="form-control" id="fechaRegistro" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-danger">Registrar Producto</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarStockModal">
                    Agregar Stock
                </button>
            </div>
        </form>

        <div class="mt-5">
            <h3 class="text-danger">Productos Registrados</h3>
            <input type="text" class="form-control mb-3" id="buscar" placeholder="Buscar por nombre del producto o proveedor...">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Proveedor</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="listaProductos"></tbody>
            </table>
        </div>
    </div>

    <!-- Modal para agregar stock -->
    <div class="modal fade" id="agregarStockModal" tabindex="-1" aria-labelledby="agregarStockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarStockModalLabel">Agregar Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <img src="img/Logo2.png" alt="Logo" class="img-logo">
                    </div>
                    <form id="agregarStockForm">
                        <div class="form-group">
                            <label for="nombreProductoStock" class="form-label">Nombre del Producto</label>
                            <select class="form-control" id="nombreProductoStock" required>
                                <!-- Opciones dinámicas que se llenarán con los productos existentes -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cantidadActual" class="form-label">Cantidad Actual</label>
                            <input type="number" class="form-control" id="cantidadActual" readonly>
                        </div>

                        <div class="form-group">
                            <label for="cantidadAgregar" class="form-label">Cantidad a Agregar</label>
                            <input type="number" class="form-control" id="cantidadAgregar" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarStock()">Agregar Stock</button>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal para gestionar categorías -->
<div class="modal fade" id="gestionarCategoriasModal" tabindex="-1" aria-labelledby="gestionarCategoriasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gestionarCategoriasModalLabel">Gestionar Categorías</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="img/Logo2.png" alt="Logo" class="img-logo">
                </div>
                <div class="modal-body">
                    <form id="gestionarCategoriasForm">
                        <div class="form-group">
                            <label for="nuevaCategoria" class="form-label">Nombre de la Nueva Categoría</label>
                            <input type="text" class="form-control" id="nuevaCategoria" required>
                        </div>
                        <button type="button" class="btn btn-primary mt-3" onclick="agregarCategoria()">Agregar Categoría</button>
                    </form>
                    <hr>
                    <h6 id="tituloCategorias">Categorías Existentes</h6>
                    <ul id="listaCategorias" class="list-group">
                    <!-- Las categorías se llenarán dinámicamente -->
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
// Cargar categorías desde LocalStorage al cargar la página
document.addEventListener("DOMContentLoaded", function () {
        cargarCategorias();
    });

    // Función para cargar categorías desde LocalStorage
    function cargarCategorias() {
        const listaCategorias = JSON.parse(localStorage.getItem("categorias")) || [];
        const listaElement = document.getElementById("listaCategorias");
        const categoriaSelect = document.getElementById('categoria');

        // Limpiar la lista y el menú desplegable
        listaElement.innerHTML = "";
        categoriaSelect.innerHTML = "";

        // Agregar las categorías a la lista y al menú desplegable
        listaCategorias.forEach(categoria => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.textContent = categoria;

            // Crear botón para eliminar la categoría
            const button = document.createElement('button');
            button.className = 'btn btn-danger btn-sm';
            button.textContent = 'Eliminar';
            button.onclick = function () {
                eliminarCategoria(categoria);
            };

            // Agregar el botón al elemento de lista
            li.appendChild(button);

            // Agregar la nueva categoría a la lista
            listaElement.appendChild(li);

            // Agregar la categoría al menú desplegable
            const option = document.createElement('option');
            option.value = categoria;
            option.textContent = categoria;
            categoriaSelect.appendChild(option);
        });
    }

    // Función para agregar una nueva categoría al menú desplegable y al modal
    function agregarCategoria() {
        const nuevaCategoriaInput = document.getElementById('nuevaCategoria');
        const categoriaNombre = nuevaCategoriaInput.value.trim();

        if (categoriaNombre) {
            // Obtener las categorías actuales desde LocalStorage
            const listaCategorias = JSON.parse(localStorage.getItem("categorias")) || [];

            if (listaCategorias.includes(categoriaNombre)) {
                alert("La categoría ya existe.");
                nuevaCategoriaInput.value = '';
                return;
            }

            // Agregar la nueva categoría a la lista
            listaCategorias.push(categoriaNombre);
            localStorage.setItem("categorias", JSON.stringify(listaCategorias));

            cargarCategorias();
            nuevaCategoriaInput.value = ''; // Limpiar el campo de entrada
        }
    }

    // Función para eliminar una categoría
    function eliminarCategoria(categoriaNombre) {
        // Obtener las categorías actuales desde LocalStorage
        const listaCategorias = JSON.parse(localStorage.getItem("categorias")) || [];

        // Filtrar la categoría a eliminar
        const nuevasCategorias = listaCategorias.filter(categoria => categoria !== categoriaNombre);

        // Guardar las categorías actualizadas en LocalStorage
        localStorage.setItem("categorias", JSON.stringify(nuevasCategorias));

        cargarCategorias();
    }


        let editIndex = -1;
        let productos = [];

        // Cargar productos de LocalStorage al cargar la página
        document.addEventListener("DOMContentLoaded", function () {
            productos = JSON.parse(localStorage.getItem("productos")) || [];
            mostrarProductos();
        });

        // Automatizar el cálculo del valor total
        document.getElementById("cantidadInicial").addEventListener("input", calcularTotal);
        document.getElementById("precioUnidad").addEventListener("input", calcularTotal);

        function calcularTotal() {
            let cantidad = parseFloat(document.getElementById("cantidadInicial").value) || 0;
            let precio = parseFloat(document.getElementById("precioUnidad").value) || 0;
            document.getElementById("valorTotal").value = cantidad * precio;
        }

        document.getElementById("productoForm").addEventListener("submit", function (e) {
            e.preventDefault();

            let nombreProducto = document.getElementById("nombreProducto").value;
            let descripcion = document.getElementById("descripcion").value;
            let categoria = document.getElementById("categoria").value;
            let proveedor = document.getElementById("proveedor").value;
            let cantidadInicial = document.getElementById("cantidadInicial").value;
            let precioUnidad = document.getElementById("precioUnidad").value;
            let valorTotal = document.getElementById("valorTotal").value;
            let fechaRegistro = document.getElementById("fechaRegistro").value;

            if (editIndex === -1) {
                agregarProducto(nombreProducto, descripcion, categoria, proveedor, cantidadInicial, precioUnidad, valorTotal, fechaRegistro);
            } else {
                actualizarProducto(nombreProducto, descripcion, categoria, proveedor, cantidadInicial, precioUnidad, valorTotal, fechaRegistro);
            }

            resetForm();
            guardarEnLocalStorage();
        });

        function agregarProducto(nombreProducto, descripcion, categoria, proveedor, cantidadInicial, precioUnidad, valorTotal, fechaRegistro) {
            let nuevoProducto = { nombreProducto, descripcion, categoria, proveedor, cantidadInicial, precioUnidad, valorTotal, fechaRegistro };
            productos.push(nuevoProducto);
            mostrarProductos();
        }

        function actualizarProducto(nombreProducto, descripcion, categoria, proveedor, cantidadInicial, precioUnidad, valorTotal, fechaRegistro) {
            productos[editIndex] = { nombreProducto, descripcion, categoria, proveedor, cantidadInicial, precioUnidad, valorTotal, fechaRegistro };
            editIndex = -1;
            mostrarProductos();
        }

        function mostrarProductos() {
            let lista = document.getElementById("listaProductos");
            lista.innerHTML = "";
            productos.forEach((producto, index) => {
                let alertaCantidad = obtenerAlertaCantidad(producto.cantidadInicial);

                let nuevaFila = `
                    <tr>
                        <td>${producto.nombreProducto}</td>
                        <td>${producto.descripcion}</td>
                        <td>${producto.categoria}</td>
                        <td>${producto.proveedor}</td>
                        <td>${producto.cantidadInicial} <span class="badge ${alertaCantidad.clase}">${alertaCantidad.texto}</span></td>
                        <td>${producto.precioUnidad}</td>
                        <td>${producto.valorTotal}</td>
                        <td>${producto.fechaRegistro}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" onclick="editarProducto(${index})">Editar</button>
                            <button class="btn btn-sm btn-danger" onclick="eliminarProducto(${index})">Eliminar</button>
                        </td>
                    </tr>
                `;
                lista.insertAdjacentHTML('beforeend', nuevaFila);
            });

            // Actualizar el dropdown del modal con productos
            let dropdown = document.getElementById("nombreProductoStock");
            dropdown.innerHTML = ""; // Limpiar opciones anteriores
            productos.forEach((producto) => {
                let option = `<option value="${producto.nombreProducto}">${producto.nombreProducto}</option>`;
                dropdown.insertAdjacentHTML('beforeend', option);
            });
        }

        function obtenerAlertaCantidad(cantidad) {
            if (cantidad <= 10) {
                return { clase: "bg-danger", texto: "Bajo" };  // Rojo
            } else if (cantidad <= 50) {
                return { clase: "bg-warning", texto: "Medio" };  // Amarillo
            } else {
                return { clase: "bg-success", texto: "Alto" };  // Verde
            }
        }

        function agregarStock() {
            let nombreProductoStock = document.getElementById("nombreProductoStock").value;
            let cantidadAgregar = parseInt(document.getElementById("cantidadAgregar").value);
            let cantidadActual = parseInt(document.getElementById("cantidadActual").value);

            // Buscar el producto y agregarle la cantidad
            let producto = productos.find(p => p.nombreProducto === nombreProductoStock);
            if (producto) {
                producto.cantidadInicial = cantidadActual + cantidadAgregar;
                producto.valorTotal = producto.cantidadInicial * producto.precioUnidad; // Actualizar el valor total
                mostrarProductos();
                guardarEnLocalStorage();
                alert("Stock agregado correctamente.");
                document.getElementById("agregarStockForm").reset();
                document.getElementById("agregarStockModal").querySelector('[data-bs-dismiss="modal"]').click(); // Cerrar modal
            } else {
                alert("Producto no encontrado.");
            }
        }

        document.getElementById("nombreProductoStock").addEventListener("change", function() {
            let nombreProductoStock = this.value;
            let producto = productos.find(p => p.nombreProducto === nombreProductoStock);
            if (producto) {
                document.getElementById("cantidadActual").value = producto.cantidadInicial;
            } else {
                document.getElementById("cantidadActual").value = "";
            }
        });

        function editarProducto(index) {
            let producto = productos[index];
            editIndex = index;

            document.getElementById("nombreProducto").value = producto.nombreProducto;
            document.getElementById("descripcion").value = producto.descripcion;
            document.getElementById("categoria").value = producto.categoria;
            document.getElementById("proveedor").value = producto.proveedor;
            document.getElementById("cantidadInicial").value = producto.cantidadInicial;
            document.getElementById("precioUnidad").value = producto.precioUnidad;
            document.getElementById("valorTotal").value = producto.valorTotal;
            document.getElementById("fechaRegistro").value = producto.fechaRegistro;
        }

        function eliminarProducto(index) {
            if (confirm("¿Está seguro de que desea eliminar este producto?")) {
                productos.splice(index, 1);
                mostrarProductos();
                guardarEnLocalStorage();
            }
        }

        function resetForm() {
            document.getElementById("productoForm").reset();
            editIndex = -1;
        }

        function guardarEnLocalStorage() {
            localStorage.setItem("productos", JSON.stringify(productos));
        }

        // Funcionalidad de búsqueda
        document.getElementById("buscar").addEventListener("input", function() {
            let query = this.value.toLowerCase();
            let filas = document.getElementById("listaProductos").getElementsByTagName("tr");

            for (let i = 0; i < filas.length; i++) {
                let celdas = filas[i].getElementsByTagName("td");
                let nombre = celdas[0].innerText.toLowerCase();
                let proveedor = celdas[3].innerText.toLowerCase();

                if (nombre.includes(query) || proveedor.includes(query)) {
                    filas[i].style.display = "";
                } else {
                    filas[i].style.display = "none";
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
