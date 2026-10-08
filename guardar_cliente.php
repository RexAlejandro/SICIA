<?php
require_once 'conexion.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $accion = $_POST['accion'] ?? 'crear';
        $nombre = trim($_POST['nombre'] ?? '');
        $tel = trim($_POST['tel'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');
        $nota = trim($_POST['nota'] ?? '');

        if ($accion === 'crear') {
            $sql = "INSERT INTO clientes (nombre, tel, email, direccion, nota) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nombre, $tel, $email, $direccion, $nota]);
            
            echo json_encode([
                'exito' => true,
                'mensaje' => 'Cliente guardado correctamente.',
                'id_insertado' => $pdo->lastInsertId()
            ]);

        } elseif ($accion === 'editar') {
            $id_cliente = $_POST['id_cliente'] ?? null;
            
            if (!$id_cliente) {
                echo json_encode(['exito' => false, 'mensaje' => 'ID de cliente no proporcionado.']);
                exit;
            }

            $sql = "UPDATE clientes SET nombre = ?, tel = ?, email = ?, direccion = ?, nota = ? WHERE id_cliente = ?";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([$nombre, $tel, $email, $direccion, $nota, $id_cliente]);

            echo json_encode([
                'exito' => true,
                'mensaje' => 'Cliente actualizado correctamente.'
            ]);
        }

    } catch (PDOException $e) {
        echo json_encode([
            'exito' => false,
            'mensaje' => 'Error al procesar la solicitud: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode(['exito' => false, 'mensaje' => 'Método de solicitud no permitido.']);
}
?>