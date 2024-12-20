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

$sql = "SELECT cduser, NM_ASSOCIADO, CARGO, TELEFONE01, TELEFONE02, CPF, CEP, BAIRRO, RUA, SN_ADMIN 
        FROM user 
        WHERE cduser = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cduser);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Sessão inválida
    session_unset();
    session_destroy();
    header("Location: ../login/login.php");
    exit();
}

// Obtém os dados do usuário e armazena na sessão
$userData = $result->fetch_assoc();
$_SESSION['user_data'] = $userData; // Armazena todos os dados do usuário na sessão
$_SESSION['is_admin'] = $userData['SN_ADMIN']; // Armazena SN_ADMIN na sessão

$stmt->close();
$conn->close();
?>
