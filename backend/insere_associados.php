<?php
// Configuração do banco de dados
$host = "localhost";
$user = "root";
$password = ""; // Senha padrão do MySQL no XAMPP geralmente é vazia
$database = "Universodown"; // Nome do banco de dados

// Conexão com o banco
$conn = new mysqli($host, $user, $password, $database);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtendo os dados do formulário
$nome_completo = $_POST['NM_ASSOCIADO'];
$responsavel = $_POST['NM_RESPONSAVEL_ASSOCIADO'];
$cpf = $_POST['CPF'];
$nascimento = $_POST['DT_NASCIMENTO'];
$telefone1 = $_POST['TELEFONE01'];
$telefone2 = $_POST['TELEFONE02'] ?? null;
$cep = $_POST['CEP'];
$bairro = $_POST['BAIRRO'];
$rua = $_POST['RUA'];
$atividade = $_POST['ATIVIDADE'];
$snadmin = $_POST['sn_admin'];

// Montando a query de inserção
$sql = "INSERT INTO user (NM_ASSOCIADO,
                          NM_RESPONSAVEL_ASSOCIADO,
                          CPF,
                          DT_NASCIMENTO,
                          TELEFONE01,
                          TELEFONE02,
                          CEP,
                          BAIRRO,
                          RUA,
                          ATIVIDADE,
                          sn_admin)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparando a query
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "TESTE",
    $nome_completo,
    $responsavel,
    $cpf,
    $nascimento,
    $telefone1,
    $telefone2,
    $cep,
    $bairro,
    $rua,
    $atividade,
    $snadmin
);

// Executando a query
if ($stmt->execute()) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir os dados: " . $stmt->error;
}

// Fechando a conexão
$stmt->close();
$conn->close();
?>
