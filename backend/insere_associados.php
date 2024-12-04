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
$telefone2 = $_POST['TELEFONE02'];
$cep = $_POST['CEP'];
$bairro = $_POST['BAIRRO'];
$rua = $_POST['RUA'];   
$senha = $_POST['SENHA'];   

// Montando a query de inserção (inserindo "Aluno" diretamente na query)
$sql = "INSERT INTO user (NM_ASSOCIADO,
                          NM_RESPONSAVEL_ASSOCIADO,
                          CPF,
                          DT_NASCIMENTO,
                          TELEFONE01,
                          TELEFONE02,
                          CEP,
                          BAIRRO,
                          RUA,
                          SENHA,
                          CARGO
                          )
       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Aluno')";  // 'Aluno' como valor fixo para CARGO

// Preparando a query
$stmt = $conn->prepare($sql);

// Verifica se a preparação foi bem-sucedida
if (!$stmt) {
    die("Erro ao preparar a query: " . $conn->error);
}

// Vinculando os parâmetros à query preparada
$stmt->bind_param(
    'ssssssssss', // String de tipos: 10 parâmetros (todos como string, sem contar o 'Aluno' que já está fixo)
    $nome_completo,
    $responsavel,
    $cpf,
    $nascimento,
    $telefone1,
    $telefone2,
    $cep,
    $bairro,
    $rua,
    $senha
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
