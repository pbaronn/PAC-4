<?php
session_start();
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['CPF'];
    $senha = $_POST['SENHA'];

    // Valida as credenciais
    $sql = "SELECT cduser FROM user WHERE CPF = ? AND SENHA = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $cpf, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login bem-sucedido
        $usuario = $result->fetch_assoc();
        $_SESSION['cduser'] = $usuario['cduser']; // Salva apenas o ID do usuário

        // Redireciona para a página inicial
        header("Location: ../frontend/home/home.php");
        exit();
    } else {
        // Login falhou
        $_SESSION['login_error'] = "CPF ou Senha incorretos!";
        header("Location: ../frontend/login/login.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
