<?php
// Dados da conexão
$host = "localhost"; // Ou 127.0.0.1
$user = "root"; // Usuário padrão do MySQL no XAMPP
$password = ""; // Senha padrão (geralmente vazia no XAMPP)
$database = "Universodown"; // Substitua pelo nome do seu banco de dados

// Criando a conexão
$conn = new mysqli($host, $user, $password, $database);

// Testando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "Conexão com o banco de dados foi bem-sucedida!";
?>
