

<?php
header('Content-Type: application/json; charset=utf-8');

session_start();
include 'conecta.php';

$cduser = $_SESSION['cduser'];
$nomeCompleto = $_POST['NM_ASSOCIADO'];
$telefone1 = $_POST['TELEFONE01'];
$telefone2 = $_POST['TELEFONE02'];
$cpf = $_POST['CPF'];
$cep = $_POST['CEP'];
$bairro = $_POST['BAIRRO'];
$rua = $_POST['RUA'];
$senhaAtual = $_POST['senha_atual'];
$novaSenha = $_POST['nova_senha'];
$confirmaSenha = $_POST['confirma_senha'];

// Validações de senha
if (!empty($senhaAtual) || !empty($novaSenha) || !empty($confirmaSenha)) {
    $querySenha = "SELECT SENHA FROM user WHERE cduser = ?";
    $stmtSenha = $conn->prepare($querySenha);
    $stmtSenha->bind_param("i", $cduser);
    $stmtSenha->execute();
    $result = $stmtSenha->get_result();
    $dados = $result->fetch_assoc();

    if ($senhaAtual !== $dados['SENHA']) {
        echo json_encode(["success" => false, "message" => "Senha atual incorreta."]);
        exit();
    }

    if ($novaSenha !== $confirmaSenha) {
        echo json_encode(["success" => false, "message" => "As novas senhas não coincidem."]);
        exit();
    }

    if (strlen($novaSenha) < 6) {
        echo json_encode(["success" => false, "message" => "A nova senha deve ter pelo menos 6 caracteres."]);
        exit();
    }

    $queryUpdateSenha = "UPDATE user SET SENHA = ? WHERE cduser = ?";
    $stmtUpdateSenha = $conn->prepare($queryUpdateSenha);
    $stmtUpdateSenha->bind_param("si", $novaSenha, $cduser);
    $stmtUpdateSenha->execute();
}

// Atualiza os demais dados
$query = "UPDATE user SET NM_ASSOCIADO = ?, TELEFONE01 = ?, TELEFONE02 = ?, CPF = ?, CEP = ?, BAIRRO = ?, RUA = ? WHERE cduser = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssssi", $nomeCompleto, $telefone1, $telefone2, $cpf, $cep, $bairro, $rua, $cduser);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Dados alterados com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao alterar os dados."]);
}

$stmt->close();
$conn->close();
