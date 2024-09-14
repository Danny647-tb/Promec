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
