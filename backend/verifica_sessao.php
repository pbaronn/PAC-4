<?php
session_start();
include 'conecta.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['cduser'])) {
    header("Location: ../login/login.php");
    exit();
}

// Opcional: Verificação no banco para validar a sessão
$cduser = $_SESSION['cduser'];

$sql = "SELECT cduser FROM user WHERE cduser = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cduser);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Sessão inválida
    session_unset();
    session_destroy();
    header("Location: ../login/index.php");
    exit();
}

$stmt->close();
$conn->close();
?>
