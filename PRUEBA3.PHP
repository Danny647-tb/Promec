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

///////ENCARGADOOOOOOOO////////////

const select = document.getElementById('encargadoProduccion');
const listaEncargados = document.getElementById('listaEncargados');

// Agregar nuevo encargado
document.getElementById('agregarEncargado').addEventListener('click', function() {
    const nuevoEncargado = document.getElementById('nuevoEncargado').value.trim();

    if (nuevoEncargado) {
        // Agregar al menú desplegable
        const option = document.createElement('option');
        option.value = nuevoEncargado;
        option.textContent = nuevoEncargado;
        select.appendChild(option);

        // Agregar a la lista de encargados
        const li = document.createElement('li');
        li.textContent = nuevoEncargado;
        li.className = "list-group-item d-flex justify-content-between align-items-center";
        const btnEliminar = document.createElement('button');
        btnEliminar.className = "btn btn-danger btn-sm";
        btnEliminar.textContent = "Eliminar";
        btnEliminar.onclick = function() {
            // Eliminar del menú desplegable
            select.removeChild(select.querySelector(`option[value="${nuevoEncargado}"]`));
            // Eliminar de la lista
            listaEncargados.removeChild(li);
        };
        li.appendChild(btnEliminar);
        listaEncargados.appendChild(li);

        // Limpiar el campo de entrada
        document.getElementById('nuevoEncargado').value = '';

        // Cerrar el modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('encargadoProduccionModal'));
        modal.hide();
    } else {
        alert('Por favor, ingrese un nombre válido.');
    }
});

//////////////BARRA DE BUSQUEDAD/////////////

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
        <button class="btn btn-info btn-sm" onclick="mostrarMateriales(this)">Ver</button>
    </td>
`;
}