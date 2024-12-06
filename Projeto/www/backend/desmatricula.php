<?php
header('Content-Type: application/json');

// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'Universodown');

// Verifica se a conexão foi estabelecida
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Erro de conexão com o banco de dados']);
    exit;
}

// Lê o corpo da requisição
$input = json_decode(file_get_contents('php://input'), true);

// Valida se o ID foi enviado
if (!isset($input['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID do usuário não fornecido']);
    exit;
}

$id = $conn->real_escape_string($input['id']);

// Executa a exclusão no banco de dados
$sql = "DELETE FROM atividade WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao deletar usuário: ' . $conn->error]);
}

$conn->close();
?>
