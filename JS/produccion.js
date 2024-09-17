    function filtrarHistorial() {
        const modalBody = document.getElementById('modalBody');
        const searchValue = document.getElementById('searchHistorial').value.toLowerCase();
        const listaHistorial = document.getElementById('listaHistorial');

        // Limpiar la lista antes de agregar nuevos elementos
        listaHistorial.innerHTML = '';

        let clientes = JSON.parse(localStorage.getItem('clientes')) || [];

        if (clientes.length === 0) {
            listaHistorial.innerHTML = '<li class="list-group-item">No hay datos disponibles.</li>';
            return;
        }

        // Filtrar clientes basado en el valor del input
        const filtrados = clientes.filter(cliente =>
            cliente.nombre.toLowerCase().includes(searchValue) ||
            cliente.email.toLowerCase().includes(searchValue) ||
            cliente.telefono.toLowerCase().includes(searchValue)
        );

        if (filtrados.length === 0) {
            listaHistorial.innerHTML = '<li class="list-group-item">No se encontraron resultados.</li>';
        } else {
            filtrados.forEach(cliente => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.innerHTML = `
                <strong>Nombre:</strong> ${cliente.nombre} <br>
                <strong>Tipo:</strong> ${cliente.tipo} <br>
                <strong>Contacto:</strong> ${cliente.contacto} <br>
                <strong>Teléfono:</strong> ${cliente.telefono} <br>
                <strong>Email:</strong> ${cliente.email} <br>
                <strong>Dirección:</strong> ${cliente.direccion} <br>
                <strong>NIT:</strong> ${cliente.nit || 'No disponible'} <br>
                <strong>Giro Negocio:</strong> ${cliente.giroNegocio || 'No disponible'} <br>
                <strong>Fecha Registro:</strong> ${cliente.fechaRegistro}
                <button class="btn btn-primary btn-sm mt-2" onclick="copiarNombre('${cliente.nombre}')">Seleccionar</button>
            `;
                listaHistorial.appendChild(li);
            });
        }
    }

    function copiarNombre(nombre) {
        const nombreInput = document.getElementById('nombreCliente'); // Cambia por el ID del input donde quieras pegar el nombre
        nombreInput.value = nombre;

        // Opcional: Cerrar el modal después de seleccionar el cliente
        const modal = bootstrap.Modal.getInstance(document.getElementById('historialClienteModal'));
        modal.hide();
    }

        // Capturar los datos del formulario
        const orden = {
            nombreCliente: document.getElementById('nombreCliente').value,
            descripcionProducto: document.getElementById('descripcionProducto').value,
            encargadoProduccion: document.getElementById('encargadoProduccion').value,
            estadoOrden: document.getElementById('estadoOrden').value,
            fechaCreacion: document.getElementById('fechaCreacion').value,
            fechaEntrega: document.getElementById('fechaEntrega').value,
            cantidad: document.getElementById('cantidad').value,
            valorTotal: document.getElementById('valorTotal').value
        };



    let editIndex = null;

    // Cargar las órdenes y productos desde Local Storage al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
    loadOrders();
    cargarDesdeLocalStorage();
    document.getElementById('ordenProduccionForm').addEventListener('submit', handleFormSubmit);
    document.getElementById('buscar').addEventListener('input', handleSearch);
    });

    // Manejar el envío del formulario de orden de producción
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

    // Añadir una nueva orden a la tabla
    function addOrder(order) {
    const tbody = document.getElementById('listaOrdenes');
    const row = document.createElement('tr');

    const estado = obtenerAlertaEstado(order.estadoOrden);

    row.innerHTML = `
        <td>${order.nombreCliente}</td>
        <td>${order.descripcionProducto}</td>
        <td>${order.encargadoProduccion}</td>
        <td><span class="badge ${estado.clase}">${estado.texto}</span></td>
        <td>${order.fechaCreacion}</td>
        <td>${order.fechaEntrega}</td>
        <td>${order.cantidad}</td>
        <td>${order.valorTotal}</td>
        <td>
            <button class="btn btn-warning btn-sm" onclick="editOrder(this)">Editar</button>
            <button class="btn btn-danger btn-sm" onclick="deleteOrder(this)">Eliminar</button>
        </td>
    `;

    tbody.appendChild(row);
    }

    // Editar una orden existente
    function editOrder(button) {
    const row = button.closest('tr');
    const cells = row.getElementsByTagName('td');

    document.getElementById('nombreCliente').value = cells[0].innerText;
    document.getElementById('descripcionProducto').value = cells[1].innerText;
    document.getElementById('encargadoProduccion').value = cells[2].innerText;
    document.getElementById('estadoOrden').value = obtenerEstadoOrdenDesdeBadge(cells[3].querySelector('.badge').innerText);
    document.getElementById('fechaCreacion').value = cells[4].innerText;
    document.getElementById('fechaEntrega').value = cells[5].innerText;
    document.getElementById('cantidad').value = cells[6].innerText;
    document.getElementById('valorTotal').value = cells[7].innerText;

    editIndex = Array.from(row.parentNode.children).indexOf(row);
    }

    // Obtener el estado de la orden desde el texto del badge
    function obtenerEstadoOrdenDesdeBadge(textoBadge) {
    switch (textoBadge) {
        case 'Pendiente':
            return 'pendiente';
        case 'En Proceso':
            return 'en_proceso';
        case 'Completada':
            return 'completada';
        case 'Cancelada':
            return 'cancelada';
        default:
            return 'desconocido';
    }
    }

    // Actualizar una orden existente
    function updateOrder(index, order) {
    const tbody = document.getElementById('listaOrdenes');
    const row = tbody.children[index];

    const estado = obtenerAlertaEstado(order.estadoOrden);

    row.innerHTML = `
        <td>${order.nombreCliente}</td>
        <td>${order.descripcionProducto}</td>
        <td>${order.encargadoProduccion}</td>
        <td><span class="badge ${estado.clase}">${estado.texto}</span></td>
        <td>${order.fechaCreacion}</td>
        <td>${order.fechaEntrega}</td>
        <td>${order.cantidad}</td>
        <td>${order.valorTotal}</td>
        <td>
            <button class="btn btn-warning btn-sm" onclick="editOrder(this)">Editar</button>
            <button class="btn btn-danger btn-sm" onclick="deleteOrder(this)">Eliminar</button>
        </td>
    `;
    saveOrders(); // Guardar órdenes en Local Storage
    }

    // Eliminar una orden
    function deleteOrder(button) {
    if (confirm('¿Estás seguro de que deseas eliminar esta orden?')) {
        const row = button.closest('tr');
        row.remove();
        saveOrders(); // Guardar órdenes en Local Storage
    }
    }

    // Manejar la búsqueda de órdenes
    function handleSearch(e) {
    const query = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#listaOrdenes tr');

    rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        const text = Array.from(cells).map(cell => cell.innerText.toLowerCase()).join(' ');
        row.style.display = text.includes(query) ? '' : 'none';
    });
    }

    // Obtener la clase y texto para el estado de la orden
    function obtenerAlertaEstado(estado) {
    switch (estado) {
        case 'pendiente':
            return { clase: "bg-warning text-dark", texto: "Pendiente" };  // Amarillo
        case 'en_proceso':
            return { clase: "bg-info text-dark", texto: "En Proceso" };  // Azul Claro
        case 'completada':
            return { clase: "bg-success text-white", texto: "Completada" };  // Verde
        case 'cancelada':
            return { clase: "bg-danger text-white", texto: "Cancelada" };  // Rojo
        default:
            return { clase: "bg-secondary text-white", texto: "Desconocido" };  // Gris
    }
    }

    // Guardar las órdenes en Local Storage
    function saveOrders() {
    const orders = [];
    document.querySelectorAll('#listaOrdenes tr').forEach(row => {
        const cells = row.getElementsByTagName('td');
        const estado = obtenerEstadoOrdenDesdeBadge(cells[3].querySelector('.badge').innerText);
        const order = {
            nombreCliente: cells[0].innerText,
            descripcionProducto: cells[1].innerText,
            encargadoProduccion: cells[2].innerText,
            estadoOrden: estado,
            fechaCreacion: cells[4].innerText,
            fechaEntrega: cells[5].innerText,
            cantidad: cells[6].innerText,
            valorTotal: cells[7].innerText
        };
        orders.push(order);
    });
    localStorage.setItem('orders', JSON.stringify(orders));
    }

    // Cargar las órdenes desde Local Storage
    function loadOrders() {
    const orders = JSON.parse(localStorage.getItem('orders')) || [];
    orders.forEach(order => addOrder(order));
    }

    // Simula una base de datos de productos
    let productos = [];

    // Cargar productos en el select del modal
    function cargarProductos() {
    let select = document.getElementById("nombreProductoStock");
    select.innerHTML = "<option value='' disabled selected>Seleccione un producto</option>"; // Resetea opciones

    productos.forEach(producto => {
        let option = document.createElement("option");
        option.value = producto.nombreProducto;
        option.textContent = producto.nombreProducto;
        select.appendChild(option);
    });
    }

    // Actualizar cantidad actual cuando se selecciona un producto
    function actualizarCantidadActual() {
    let nombreProductoStock = document.getElementById("nombreProductoStock").value;
    let producto = productos.find(p => p.nombreProducto === nombreProductoStock);
    if (producto) {
        document.getElementById("cantidadActual").value = producto.cantidadInicial;
    } else {
        document.getElementById("cantidadActual").value = "";
    }
    }

    // Función para agregar stock
    function agregarStock() {
    let nombreProductoStock = document.getElementById("nombreProductoStock").value;
    let cantidadAgregar = parseInt(document.getElementById("cantidadAgregar").value);
    let cantidadActual = parseInt(document.getElementById("cantidadActual").value);

    let producto = productos.find(p => p.nombreProducto === nombreProductoStock);
    if (producto) {
        if (cantidadAgregar > 0) {
            producto.cantidadInicial -= cantidadAgregar;
            if (producto.cantidadInicial < 0) producto.cantidadInicial = 0; // Evita que la cantidad sea negativa
            producto.valorTotal = producto.cantidadInicial * producto.precioUnidad; // Actualizar el valor total
            
            // Actualizar el cuadro de cantidad en el formulario principal
            let cantidadInput = document.getElementById("cantidad");
            let cantidadActualFormulario = parseInt(cantidadInput.value) || 0;
            cantidadInput.value = cantidadActualFormulario + cantidadAgregar;

            document.getElementById("cantidadActual").value = producto.cantidadInicial; // Actualiza el cuadro de cantidad en el modal
            guardarEnLocalStorage();
            alert("Stock descontado correctamente.");
            document.getElementById("agregarStockForm").reset();
            document.getElementById("agregarStockModal").querySelector('[data-bs-dismiss="modal"]').click(); // Cerrar modal
        } else {
            alert("La cantidad a descontar debe ser mayor a cero.");
        }
    } else {
        alert("Producto no encontrado.");
    }
    }

    // Guardar en Local Storage
    function guardarEnLocalStorage() {
    localStorage.setItem("productos", JSON.stringify(productos));
    }

    // Cargar productos desde Local Storage al cargar la página
    function cargarDesdeLocalStorage() {
    let productosGuardados = JSON.parse(localStorage.getItem("productos"));
    if (productosGuardados) {
        productos = productosGuardados;
        cargarProductos();
    }
    }


    //ESTO ES LO DE LA CANTIDA Y EL STOCK, LAS FUNCIONES DEL RESTO DEL PROYETO VA A ARRIBA

    // Cargar productos en el select del modal
    function cargarProductos() {
    let select = document.getElementById("nombreProductoStock");
    select.innerHTML = "<option value='' disabled selected>Seleccione un producto</option>"; // Resetea opciones

    productos.forEach(producto => {
        let option = document.createElement("option");
        option.value = producto.nombreProducto;
        option.textContent = producto.nombreProducto;
        select.appendChild(option);
    });
    }

    // Actualizar cantidad actual cuando se selecciona un producto
    function actualizarCantidadActual() {
    let nombreProductoStock = document.getElementById("nombreProductoStock").value;
    let producto = productos.find(p => p.nombreProducto === nombreProductoStock);
    if (producto) {
        document.getElementById("cantidadActual").value = producto.cantidadInicial;
    } else {
        document.getElementById("cantidadActual").value = "";
    }
    }

    // Función para agregar stock
    function agregarStock() {
    let nombreProductoStock = document.getElementById("nombreProductoStock").value;
    let cantidadAgregar = parseInt(document.getElementById("cantidadAgregar").value);
    let cantidadActual = parseInt(document.getElementById("cantidadActual").value);

    let producto = productos.find(p => p.nombreProducto === nombreProductoStock);
    if (producto) {
        if (cantidadAgregar > 0) {
            producto.cantidadInicial -= cantidadAgregar;
            if (producto.cantidadInicial < 0) producto.cantidadInicial = 0; // Evita que la cantidad sea negativa
            producto.valorTotal = producto.cantidadInicial * producto.precioUnidad; // Actualizar el valor total
            
            // Actualizar el cuadro de cantidad en el formulario principal
            let cantidadInput = document.getElementById("cantidad");
            let cantidadActualFormulario = parseInt(cantidadInput.value) || 0;
            cantidadInput.value = cantidadActualFormulario + cantidadAgregar;

            document.getElementById("cantidadActual").value = producto.cantidadInicial; // Actualiza el cuadro de cantidad en el modal
            guardarEnLocalStorage();
            alert("Stock descontado correctamente.");
            document.getElementById("agregarStockForm").reset();
            document.getElementById("agregarStockModal").querySelector('[data-bs-dismiss="modal"]').click(); // Cerrar modal
        } else {
            alert("La cantidad a descontar debe ser mayor a cero.");
        }
    } else {
        alert("Producto no encontrado.");
    }
    }

    // Guardar en LocalStorage
    function guardarEnLocalStorage() {
    localStorage.setItem("productos", JSON.stringify(productos));
    }

    // Cargar productos desde LocalStorage al cargar la página
    function cargarDesdeLocalStorage() {
    let productosGuardados = JSON.parse(localStorage.getItem("productos"));
    if (productosGuardados) {
        productos = productosGuardados;
        cargarProductos();
    }
    }

    // Inicializar
    document.addEventListener("DOMContentLoaded", function () {
    cargarDesdeLocalStorage();
    });










