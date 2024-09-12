<?php
include 'BD.php'; // Incluye el archivo de conexión

// Procesar el formulario al enviarlo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreEmpresa = mysqli_real_escape_string($enlace, $_POST['nombreEmpresa']);
    $nombreContacto = mysqli_real_escape_string($enlace, $_POST['nombreContacto']);
    $cargo = mysqli_real_escape_string($enlace, $_POST['cargo']);
    $telefono = mysqli_real_escape_string($enlace, $_POST['telefono']);
    $correoElectronico = mysqli_real_escape_string($enlace, $_POST['correoElectronico']);
    $direccion = mysqli_real_escape_string($enlace, $_POST['direccion']);
    $giroNegocio = mysqli_real_escape_string($enlace, $_POST['giroNegocio']);
    $fechaRegistro = mysqli_real_escape_string($enlace, $_POST['fechaRegistro']);
    $comentarios = mysqli_real_escape_string($enlace, $_POST['comentarios']);

    // Verificar si se está editando un cliente existente
    if (isset($_POST['editIndex']) && !empty($_POST['editIndex'])) {
        $id = mysqli_real_escape_string($enlace, $_POST['editIndex']);
        $sql = "UPDATE CLIENTES SET nombre_empresa='$nombreEmpresa', nombre_contacto='$nombreContacto', cargo='$cargo', telefono='$telefono', correo_electronico='$correoElectronico', direccion='$direccion', giro_negocio='$giroNegocio', fecha_registro='$fechaRegistro', comentarios='$comentarios' WHERE id='$id'";
    } else {
        // Insertar nuevo cliente
        $sql = "INSERT INTO CLIENTES (nombre_empresa, nombre_contacto, cargo, telefono, correo_electronico, direccion, giro_negocio, fecha_registro, comentarios) VALUES ('$nombreEmpresa', '$nombreContacto', '$cargo', '$telefono', '$correoElectronico', '$direccion', '$giroNegocio', '$fechaRegistro', '$comentarios')";
    }

    if (mysqli_query($enlace, $sql)) {
        echo "success";
    } else {
        echo "Error: " . mysqli_error($enlace);
    }

    mysqli_close($enlace);
    exit();
}

// Procesar la eliminación
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($enlace, $_GET['id']);
    $sql = "DELETE FROM CLIENTES WHERE id='$id'";

    if (mysqli_query($enlace, $sql)) {
        echo "success";
    } else {
        echo "Error: " . mysqli_error($enlace);
    }

    mysqli_close($enlace);
    exit();
}
?>