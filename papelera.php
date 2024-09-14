<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paperera de Reciclaje</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Archivos Eliminados</h1>
        <table id="deleted-files-table">
            <thead>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Filas generadas dinámicamente por JavaScript -->
            </tbody>
        </table>
    </div>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f4f4f4;
}

button {
    padding: 5px 10px;
    margin: 2px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    color: #fff;
}

.restore-btn {
    background-color: #28a745;
}

.delete-btn {
    background-color: #dc3545;
}

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const deletedFiles = [
        'archivo1.txt',
        'archivo2.pdf',
        'archivo3.jpg'
    ];

    const tableBody = document.querySelector('#deleted-files-table tbody');

    deletedFiles.forEach(fileName => {
        const row = document.createElement('tr');
        
        const fileNameCell = document.createElement('td');
        fileNameCell.textContent = fileName;
        row.appendChild(fileNameCell);

        const actionsCell = document.createElement('td');

        const restoreButton = document.createElement('button');
        restoreButton.textContent = 'Restaurar';
        restoreButton.className = 'restore-btn';
        restoreButton.onclick = () => restoreFile(fileName);
        actionsCell.appendChild(restoreButton);

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Eliminar';
        deleteButton.className = 'delete-btn';
        deleteButton.onclick = () => deleteFile(fileName);
        actionsCell.appendChild(deleteButton);

        row.appendChild(actionsCell);
        tableBody.appendChild(row);
    });

    function restoreFile(fileName) {
        if (confirm(`¿Deseas restaurar "${fileName}"?`)) {
            alert(`Archivo "${fileName}" restaurado.`);
            // Aquí puedes agregar lógica para restaurar el archivo en el servidor.
        }
    }

    function deleteFile(fileName) {
        if (confirm(`¿Deseas eliminar "${fileName}" permanentemente?`)) {
            alert(`Archivo "${fileName}" eliminado.`);
            // Aquí puedes agregar lógica para eliminar el archivo permanentemente en el servidor.
        }
    }
});

    </script>

</body>
</html>
