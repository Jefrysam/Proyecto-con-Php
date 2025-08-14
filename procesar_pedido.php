<?php
include 'db_conexion.php';

// Recibir datos del formulario
$tipo_documento = $_POST['tipo_documento'];
$numero_documento = $_POST['numero_documento'];
$nombre_completo = $_POST['nombre_completo'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$menu = $_POST['menu'];
$modalidad = $_POST['modalidad'];
$mesa = isset($_POST['mesa']) ? $_POST['mesa'] : '';

// --- 1. Insertar o actualizar usuario ---

// Primero, verificar si el usuario ya existe
$sql_select_user = "SELECT id FROM usuarios WHERE numero_documento = ?";
$stmt_select = $conn->prepare($sql_select_user);
$stmt_select->bind_param("s", $numero_documento);
$stmt_select->execute();
$result = $stmt_select->get_result();

if ($result->num_rows > 0) {
    // Si existe, obtenemos su ID
    $row = $result->fetch_assoc();
    $usuario_id = $row['id'];
} else {
    // Si no existe, lo insertamos
    $sql_insert_user = "INSERT INTO usuarios (tipo_documento, numero_documento, nombre_completo, celular, correo) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert_user);
    $stmt_insert->bind_param("sssss", $tipo_documento, $numero_documento, $nombre_completo, $celular, $correo);
    
    if ($stmt_insert->execute()) {
        $usuario_id = $conn->insert_id; // Obtenemos el ID del nuevo usuario
    } else {
        echo "Error al registrar el usuarios: " . $conn->error;
        exit; // Salimos si hay un error
    }
    $stmt_insert->close();
}
$stmt_select->close();


// --- 2. Insertar el pedido ---

$fecha_pedido = date('Y-m-d H:i:s'); // Fecha y hora actual

$sql_pedido = "INSERT INTO pedidos (usuario_id, menu, modalidad, mesa, fecha_pedido) VALUES (?, ?, ?, ?, ?)";
$stmt_pedido = $conn->prepare($sql_pedido);
$stmt_pedido->bind_param("issss", $usuario_id, $menu, $modalidad, $mesa, $fecha_pedido);

if ($stmt_pedido->execute()) {
    echo "<h1>¡Pedido realizado con éxito!</h1>";
    echo "<p>Gracias por tu compra, $nombre_completo.</p>";
    echo "<a href='index.html'>Volver al inicio</a>";
} else {
    echo "Error al guardar el pedidos: " . $stmt_pedido->error;
}

$stmt_pedido->close();
$conn->close();
?>
