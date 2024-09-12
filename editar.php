<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rol"; // El nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del producto
$id = intval($_GET['id']);

// Obtener datos del producto
$sql = "SELECT * FROM inventario WHERE id = ?"; // Usar el nombre correcto de la tabla
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Manejo de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $proveedor = $_POST['proveedor'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $valor_total = $_POST['valor_total'];
    $fecha = $_POST['fecha'];

    $update_sql = "UPDATE inventario SET nombre = ?, descripcion = ?, categoria = ?, proveedor = ?, cantidad = ?, precio = ?, valor_total = ?, fecha = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssdissi", $nombre, $descripcion, $categoria, $proveedor, $cantidad, $precio, $valor_total, $fecha, $id);
    $stmt->execute();

    header("Location: listado_productos.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Editar Producto</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #000; /* Fondo negro */
        }
        .form-control {
            background-color: #333; /* Fondo de campos del formulario */
            color: #fff; /* Color de texto en campos del formulario */
        }
        .form-control:focus {
            border-color: #e60012; /* Color del borde al enfocar */
            box-shadow: none; /* Quitar sombra al enfocar */
        }
        .btn-primary {
            background-color: #e60012; /* Botón rojo */
            border-color: #e60012; /* Borde del botón rojo */
        }
        .btn-primary:hover {
            background-color: #c70039; /* Color del botón en hover */
            border-color: #c70039; /* Borde del botón en hover */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-light">Editar Producto</h2>
        <form action="editar_producto.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $product['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción Detallada</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $product['descripcion']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-select" id="categoria" name="categoria" required>
                    <option value="Electrónica" <?php echo ($product['categoria'] === 'Electrónica') ? 'selected' : ''; ?>>Electrónica</option>
                    <option value="Muebles" <?php echo ($product['categoria'] === 'Muebles') ? 'selected' : ''; ?>>Muebles</option>
                    <option value="Ropa" <?php echo ($product['categoria'] === 'Ropa') ? 'selected' : ''; ?>>Ropa</option>
                    <option value="Otro" <?php echo ($product['categoria'] === 'Otro') ? 'selected' : ''; ?>>Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="proveedor" class="form-label">Proveedor</label>
                <select class="form-select" id="proveedor" name="proveedor" required>
                    <option value="Proveedor 1" <?php echo ($product['proveedor'] === 'Proveedor 1') ? 'selected' : ''; ?>>Proveedor 1</option>
                    <option value="Proveedor 2" <?php echo ($product['proveedor'] === 'Proveedor 2') ? 'selected' : ''; ?>>Proveedor 2</option>
                    <option value="Proveedor 3" <?php echo ($product['proveedor'] === 'Proveedor 3') ? 'selected' : ''; ?>>Proveedor 3</option>
                    <option value="Otro" <?php echo ($product['proveedor'] === 'Otro') ? 'selected' : ''; ?>>Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad Inicial</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="<?php echo $product['cantidad']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio por Unidad</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" value="<?php echo $product['precio']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="valor_total" class="form-label">Valor Total</label>
                <input type="text" class="form-control" id="valor_total" name="valor_total" value="<?php echo $product['valor_total']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de Registro</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $product['fecha']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

    <!-- Script para recalcular valor total -->
    <script>
        document.getElementById('cantidad').addEventListener('input', calcularValorTotal);
        document.getElementById('precio').addEventListener('input', calcularValorTotal);

        function calcularValorTotal() {
            const cantidad = parseFloat(document.getElementById('cantidad').value) || 0;
            const precio = parseFloat(document.getElementById('precio').value) || 0;
            const valorTotal = cantidad * precio;
            document.getElementById('valor_total').value = valorTotal.toFixed(2);
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
