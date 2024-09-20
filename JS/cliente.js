
//ESTOOO ES DE CLIENTES -----------------------------------------------------------------------------------------

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


// Suponiendo que `clientes` es un array global de objetos clientes

function eliminarCliente(index) {
    if (confirm("¿Estás seguro de que quieres eliminar este cliente?")) {
        clientes.splice(index, 1); // Eliminar el cliente del array
        guardarClientes(); // Función para guardar los cambios (puedes definirla según sea necesario)
        mostrarClientes(); // Función para actualizar la vista (puedes definirla según sea necesario)
        resetForm(); // Reiniciar el formulario
        
        // Redirigir a otra página después de eliminar
        window.location.href = 'confirmacion.html'; // Cambia 'confirmacion.html' al nombre de tu página de confirmación
    }
}

function resetForm() {
    document.getElementById("clienteForm").reset();
    document.getElementById("camposPersonaNatural").style.display = "none";
    document.getElementById("camposEmpresa").style.display = "none";
    delete document.getElementById("clienteForm").dataset.editIndex; // Eliminar índice de edición
}

// Define tus funciones `guardarClientes` y `mostrarClientes` según sea necesario
function guardarClientes() {
    // Implementa la lógica para guardar los datos de los clientes
}

function mostrarClientes() {
    // Implementa la lógica para mostrar los datos de los clientes en la interfaz
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

// ESTO ES DE INVENTARIO ---------------------------------------------------------------------------------------------------------------------------------------


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

    document.addEventListener("DOMContentLoaded", function () {
        cargarProveedoresEnMenu();
    });

    function cargarProveedoresEnMenu() {
        let proveedorSelect = document.getElementById("proveedor");
        proveedorSelect.innerHTML = '<option value="">Seleccione un proveedor</option>';
        let proveedores = JSON.parse(localStorage.getItem("proveedores")) || [];
        proveedores.forEach(proveedor => {
            let option = document.createElement("option");
            option.value = proveedor.nombreProveedor;
            option.textContent = proveedor.nombreProveedor;
            proveedorSelect.appendChild(option);
        });
    }













    function handleFormSubmit(e) {
        e.preventDefault();
        const form = e.target;
    
        const nombreCliente = form.nombreCliente.value.trim();
        const descripcionProducto = form.descripcionProducto.value.trim();
        const encargadoProduccion = form.encargadoProduccion.value.trim();
        const estadoOrden = form.estadoOrden.value;
        const fechaCreacion = form.fechaCreacion.value;
        const fechaEntrega = form.fechaEntrega.value;
        const cantidad = form.cantidad.value;
        const valorTotal = form.valorTotal.value;
    
        // Verificar si hay campos vacíos
        if (!nombreCliente || !descripcionProducto || !encargadoProduccion || !estadoOrden || !fechaCreacion || !fechaEntrega || !cantidad || !valorTotal) {
            alert('Por favor, complete todos los campos.');
            return;
        }
    
        const order = {
            nombreCliente,
            descripcionProducto,
            encargadoProduccion,
            estadoOrden,
            fechaCreacion,
            fechaEntrega,
            cantidad,
            valorTotal,
        };
    
        // Guardar la compra en el Local Storage
        const compras = JSON.parse(localStorage.getItem('compras')) || [];
        compras.push({ nombreCliente, descripcionProducto, precio: valorTotal }); // Guarda el precio total
        localStorage.setItem('compras', JSON.stringify(compras));
    
        if (editIndex !== null) {
            // Editar orden existente
            updateOrder(editIndex, order);
        } else {
            // Añadir nueva orden
            addOrder(order);
        }
    
        form.reset();
        editIndex = null;
        saveOrders(); // Guardar órdenes en Local Storage
    }
    