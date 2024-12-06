<?php
header('Content-Type: application/json; charset=utf-8');

session_start();
include 'conecta.php';

$cduser = $_SESSION['cduser'];
$cargo = $_POST['CARGO'];

// Define o valor de SN_ADMIN com base no cargo selecionado
$snAdmin = ($cargo == 'Administrador') ? 1 : 0; // 1 para 'Administrador', 0 para 'Aluno'

// Atualiza os campos SN_ADMIN e CARGO no banco de dados
$query = "UPDATE user SET SN_ADMIN = ?, CARGO = ? WHERE cduser = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("isi", $snAdmin, $cargo, $cduser);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Cargo e permissões alterados com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao alterar os dados."]);
}

$stmt->close();
$conn->close();
