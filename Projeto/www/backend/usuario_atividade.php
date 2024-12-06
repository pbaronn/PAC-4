<?php
include 'conecta.php'; // Conexão com o banco de dados
session_start(); // Iniciar a sessão

try {
    // Verificar se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atividade_id'])) {
        $atividade_id = $_POST['atividade_id'];
        $usuario_id = $_SESSION['cduser']; // Supondo que o ID do usuário esteja na sessão

        // Verificar se a variável de sessão do usuário está setada
        if (!isset($usuario_id)) {
            die("Erro: usuário não autenticado.");
        }

        // Inserir o registro de inscrição na atividade
        $query = "INSERT INTO usuarios_atividades (cduser, atividade_id) VALUES (?, ?)";

        // Preparar a consulta
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die("Erro ao preparar a consulta: " . $conn->error);
        }

        // Vincular os parâmetros (s = string, i = inteiro)
        $stmt->bind_param("ii", $usuario_id, $atividade_id);

        // Executar a consulta
        if ($stmt->execute()) {
            echo "Inscrição realizada com sucesso!";
            header("Location: ../frontend/home/home.php");
        } else {
            echo "Erro ao realizar inscrição: " . $stmt->error;
        }

        // Fechar a consulta
        $stmt->close();
    }
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>
