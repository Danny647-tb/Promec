// Variables globales
let ordenes = [];
let encargados = JSON.parse(localStorage.getItem('encargados')) || []; // Cargar encargados desde Local Storage
let materiales = [];

// Función para inicializar la página
document.addEventListener('DOMContentLoaded', function() {
    cargarEncargados();
    loadOrders();
    configurarEventListeners();
});

// Cargar encargados desde Local Storage
function cargarEncargados() {
    const select = document.getElementById('encargadoProduccion');
    select.innerHTML = ''; // Limpiar el select
    encargados.forEach(encargado => {
        const option = document.createElement('option');
        option.value = encargado;
        option.textContent = encargado;
        select.appendChild(option);
    });
    actualizarListaEncargados(); // Actualizar la lista en el modal
}

// Agregar nuevo encargado y guardar en Local Storage
function agregarNuevoEncargado() {
    const nuevoEncargado = document.getElementById('nuevoEncargado').value.trim();
    if (nuevoEncargado && !encargados.includes(nuevoEncargado)) {
        encargados.push(nuevoEncargado);
        localStorage.setItem('encargados', JSON.stringify(encargados)); // Guardar en Local Storage
        cargarEncargados();
        document.getElementById('nuevoEncargado').value = '';
    }
}

// Actualizar lista de encargados en el modal
function actualizarListaEncargados() {
    const lista = document.getElementById('listaEncargados');
    lista.innerHTML = '';
    encargados.forEach(encargado => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.textContent = encargado;
        const btnEliminar = document.createElement('button');
        btnEliminar.className = "btn btn-danger btn-sm";
        btnEliminar.textContent = "Eliminar";
        btnEliminar.onclick = function() {
            encargados = encargados.filter(e => e !== encargado);
            localStorage.setItem('encargados', JSON.stringify(encargados)); // Guardar en Local Storage
            actualizarListaEncargados();
            cargarEncargados();
        };
        li.appendChild(btnEliminar);
        lista.appendChild(li);
    });
}

// Configurar event listeners
function configurarEventListeners() {
    document.getElementById('ordenProduccionForm').addEventListener('submit', manejarSubmitOrden);
    document.getElementById('buscar').addEventListener('input', filtrarOrdenes);
    document.getElementById('agregarEncargado').addEventListener('click', agregarNuevoEncargado);
    document.getElementById('estadoOrden').addEventListener('change', actualizarAlertaEstado);
    document.getElementById('prioridadOrden').addEventListener('change', actualizarAlertaPrioridad);
    document.getElementById('searchHistorial').addEventListener('input', filtrarHistorial);
}

// Manejar el envío del formulario de orden
function manejarSubmitOrden(event) {
    event.preventDefault();
    const nuevaOrden = {
        nombreCliente: document.getElementById('nombreCliente').value,
        descripcionProducto: document.getElementById('descripcionProducto').value,
        encargadoProduccion: document.getElementById('encargadoProduccion').value,
        estadoOrden: document.getElementById('estadoOrden').value,
        prioridadOrden: document.getElementById('prioridadOrden').value,
        fechaCreacion: document.getElementById('fechaCreacion').value,
        fechaEntrega: document.getElementById('fechaEntrega').value,
        valorTotal: document.getElementById('valorTotal').value
    };
    addOrder(nuevaOrden);
    event.target.reset();
    actualizarAlertaEstado();
    actualizarAlertaPrioridad();
}

// Añadir una nueva orden a la tabla
function addOrder(order) {
    const tbody = document.getElementById('listaOrdenes');
    const row = document.createElement('tr');
    const estadoAlerta = obtenerAlertaEstado(order.estadoOrden);
    const prioridadAlerta = obtenerAlertaPrioridad(order.prioridadOrden);
    
    row.innerHTML = 
        `<td>${order.nombreCliente}</td>
        <td>${order.descripcionProducto}</td>
        <td>${order.encargadoProduccion}</td>
        <td><span class="badge ${estadoAlerta.clase}">${estadoAlerta.texto}</span></td>
        <td><span class="badge ${prioridadAlerta.clase}">${prioridadAlerta.texto}</span></td>
        <td>${order.fechaCreacion}</td>
        <td>${order.fechaEntrega}</td>
        <td>${order.valorTotal}</td>
        <td>
            <button class="btn btn-sm btn-warning" onclick="editarOrden(this)">Editar</button>
            <button class="btn btn-sm btn-danger" onclick="eliminarOrden(this)">Eliminar</button>
            <button class="btn btn-sm btn-info" onclick="verOrden(${ordenes.length})">Ver</button>
        </td>`;
    
    tbody.appendChild(row);
    ordenes.push(order);
    saveOrders(); // Guardar las órdenes en Local Storage
}

// Función para editar una orden
function editarOrden(button) {
    const row = button.closest('tr');
    const cells = row.cells;

    document.getElementById('nombreCliente').value = cells[0].textContent;
    document.getElementById('descripcionProducto').value = cells[1].textContent;
    document.getElementById('encargadoProduccion').value = cells[2].textContent;
    document.getElementById('estadoOrden').value = obtenerEstadoOrdenDesdeBadge(cells[3].querySelector('.badge').textContent);
    document.getElementById('prioridadOrden').value = obtenerPrioridadOrdenDesdeBadge(cells[4].querySelector('.badge').textContent);
    document.getElementById('fechaCreacion').value = cells[5].textContent;
    document.getElementById('fechaEntrega').value = cells[6].textContent;
    document.getElementById('valorTotal').value = cells[7].textContent;

    const guardarBtn = document.createElement('button');
    guardarBtn.className = 'btn btn-sm btn-warning'; // Color amarillo
    guardarBtn.textContent = 'Guardar Cambios';
    guardarBtn.onclick = function() {
        const ordenEditada = {
            nombreCliente: document.getElementById('nombreCliente').value,
            descripcionProducto: document.getElementById('descripcionProducto').value,
            encargadoProduccion: document.getElementById('encargadoProduccion').value,
            estadoOrden: document.getElementById('estadoOrden').value,
            prioridadOrden: document.getElementById('prioridadOrden').value,
            fechaCreacion: document.getElementById('fechaCreacion').value,
            fechaEntrega: document.getElementById('fechaEntrega').value,
            valorTotal: document.getElementById('valorTotal').value
        };
        
        // Actualizar la fila en la tabla
        cells[0].textContent = ordenEditada.nombreCliente;
        cells[1].textContent = ordenEditada.descripcionProducto;
        cells[2].textContent = ordenEditada.encargadoProduccion;
        
        const estadoAlerta = obtenerAlertaEstado(ordenEditada.estadoOrden);
        cells[3].innerHTML = `<span class="badge ${estadoAlerta.clase}">${estadoAlerta.texto}</span>`;
        
        const prioridadAlerta = obtenerAlertaPrioridad(ordenEditada.prioridadOrden);
        cells[4].innerHTML = `<span class="badge ${prioridadAlerta.clase}">${prioridadAlerta.texto}</span>`;
        
        cells[5].textContent = ordenEditada.fechaCreacion;
        cells[6].textContent = ordenEditada.fechaEntrega;
        cells[7].textContent = ordenEditada.valorTotal;

        // Actualizar el registro en el array de órdenes
        const index = Array.from(document.querySelectorAll('#listaOrdenes tr')).indexOf(row);
        ordenes[index] = ordenEditada;

        // Guardar cambios en Local Storage
        saveOrders();

        // Eliminar el botón de "Guardar Cambios"
        guardarBtn.remove();
    };

    button.parentNode.appendChild(guardarBtn);
}

// Obtener la clase y texto para el estado de la orden
function obtenerAlertaEstado(estado) {
    switch (estado) {
        case 'pendiente':
            return { clase: "bg-warning text-dark", texto: "Pendiente" };
        case 'en_proceso':
            return { clase: "bg-info text-dark", texto: "En Proceso" };
        case 'completada':
            return { clase: "bg-success text-white", texto: "Completada" };
        case 'cancelada':
            return { clase: "bg-danger text-white", texto: "Cancelada" };
        default:
            return { clase: "bg-secondary text-white", texto: "Desconocido" };
    }
}

// Actualizar alerta de estado (sin cuadro grande)
function actualizarAlertaEstado() {
    const estado = document.getElementById('estadoOrden').value;
    const alerta = document.getElementById('alertaEstado');
    const texto = document.getElementById('alertaEstadoTexto');
    const estadoAlerta = obtenerAlertaEstado(estado);
    
    alerta.className = `alert ${estadoAlerta.clase}`;
    texto.textContent = `Estado de la orden: ${estadoAlerta.texto}`;
    alerta.style.display = 'block'; // Asegúrate de que el alerta esté visible
}

// Filtrar órdenes
function filtrarOrdenes() {
    const filtro = document.getElementById('buscar').value.toLowerCase();
    const filas = document.getElementById('listaOrdenes').getElementsByTagName('tr');
    for (let fila of filas) {
        const cliente = fila.cells[0].textContent.toLowerCase();
        const descripcion = fila.cells[1].textContent.toLowerCase();
        if (cliente.includes(filtro) || descripcion.includes(filtro)) {
            fila.style.display = '';
        } else {
            fila.style.display = 'none';
        }
    }
}

// Obtener la clase y texto para la prioridad de la orden
function obtenerAlertaPrioridad(prioridad) {
    switch (prioridad) {
        case 'alta':
            return { clase: "bg-danger text-white", texto: "Alta" }; // Rojo para alta
        case 'media':
            return { clase: "bg-warning text-dark", texto: "Media" };
        case 'baja':
            return { clase: "bg-success text-white", texto: "Baja" }; // Verde para baja
        default:
            return { clase: "bg-secondary text-white", texto: "Desconocido" };
    }
}

// Actualizar alerta de prioridad
function actualizarAlertaPrioridad() {
    const prioridad = document.getElementById('prioridadOrden').value;
    const alerta = document.getElementById('alertaPrioridad');
    const texto = document.getElementById('alertaPrioridadTexto');
    const prioridadAlerta = obtenerAlertaPrioridad(prioridad);
    
    alerta.className = `alert ${prioridadAlerta.clase}`;
    texto.textContent = `Prioridad de la orden: ${prioridadAlerta.texto}`;
    alerta.style.display = 'block';
}

// Guardar las órdenes en Local Storage
function saveOrders() {
    localStorage.setItem('ordenes', JSON.stringify(ordenes));
}

// Cargar las órdenes desde Local Storage
function loadOrders() {
    const ordenesGuardadas = JSON.parse(localStorage.getItem('ordenes')) || [];
    ordenesGuardadas.forEach(orden => addOrder(orden));
}

// Funciones para la visualización de órdenes
function eliminarOrden(button) {
    const row = button.closest('tr');
    const index = Array.from(document.querySelectorAll('#listaOrdenes tr')).indexOf(row);
    ordenes.splice(index, 1);
    row.remove();
    saveOrders(); // Guardar cambios en Local Storage
}

// Función para ver una orden en detalle
function verOrden(index) {
    const orden = ordenes[index];
    const modalBody = document.getElementById('modalOrdenBody');
    modalBody.innerHTML = `
        <p><strong>Cliente:</strong> ${orden.nombreCliente}</p>
        <p><strong>Descripción del Producto:</strong> ${orden.descripcionProducto}</p>
        <p><strong>Encargado de Producción:</strong> ${orden.encargadoProduccion}</p>
        <p><strong>Estado de la Orden:</strong> ${orden.estadoOrden}</p>
        <p><strong>Prioridad de la Orden:</strong> ${orden.prioridadOrden}</p>
        <p><strong>Fecha de Creación:</strong> ${orden.fechaCreacion}</p>
        <p><strong>Fecha de Entrega:</strong> ${orden.fechaEntrega}</p>
        <p><strong>Valor Total:</strong> ${orden.valorTotal}</p>
    `;
    const modal = new bootstrap.Modal(document.getElementById('modalOrden'));
    modal.show();
}


// Funciones para el historial del cliente
function filtrarHistorial() {
    const filtro = document.getElementById('searchHistorial').value.toLowerCase();
    const items = document.getElementById('listaHistorial').getElementsByTagName('li');
    for (let item of items) {
        if (item.textContent.toLowerCase().includes(filtro)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    }
}

function copiarNombre(nombre) {
    document.getElementById('nombreCliente').value = nombre;
    const modal = bootstrap.Modal.getInstance(document.getElementById('historialClienteModal'));
    modal.hide();
}

// Funciones para el modal de agregar stock
function agregarMaterial() {
    const materialesDiv = document.getElementById('materiales');
    const nuevoMaterial = document.createElement('div');
    nuevoMaterial.className = 'd-flex mb-2 align-items-center';
    nuevoMaterial.innerHTML = 
        `<select class="form-select me-2" required>
            <option value="" disabled selected>Seleccione un material</option>
            ${materiales.map(material => `<option value="${material.nombre}">${material.nombre}</option>`).join('')}
        </select>
        <input type="number" class="form-control me-2" placeholder="Cantidad Actual" disabled>
        <input type="number" class="form-control me-2" placeholder="Cantidad a Utilizar" required>
        <button type="button" class="btn btn-danger" onclick="eliminarMaterial(this)">Eliminar</button>`;
    materialesDiv.appendChild(nuevoMaterial);
}

function eliminarMaterial(button) {
    button.closest('.d-flex').remove();
}

function submitForm() {
    // Implementar lógica para guardar los materiales utilizados
    console.log('Guardando materiales...');
    $('#agregarStockModal').modal('hide');
}

// Función para abrir el modal de compra (a implementar)
function abrirModalCompra() {
    console.log('Abriendo modal de compra');
}

//BARRA DE BUSQUEDAD//

// Funcionalidad de búsqueda
document.getElementById("buscar").addEventListener("input", function() {
    let query = this.value.toLowerCase();  // Convierte la búsqueda en minúsculas
    let filas = document.getElementById("listaOrdenes").getElementsByTagName("tr");

    for (let i = 0; i < filas.length; i++) {
        let celdas = filas[i].getElementsByTagName("td");

        let nombreCliente = celdas[0].innerText.toLowerCase();
        let encargado = celdas[2].innerText.toLowerCase();
        let estado = celdas[3].innerText.toLowerCase();
        let prioridad = celdas[4].innerText.toLowerCase();

        // Verifica si alguna de las columnas contiene la query
        if (nombreCliente.includes(query) || encargado.includes(query) || estado.includes(query) || prioridad.includes(query)) {
            filas[i].style.display = "";  // Muestra la fila si coincide
        } else {
            filas[i].style.display = "none";  // Oculta la fila si no coincide
        }
    }
});












