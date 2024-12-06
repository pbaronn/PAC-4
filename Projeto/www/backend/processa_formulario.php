<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'Universodown';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_atividade = $_POST['nome_atividade'] ?? '';
    $profissional = $_POST['profissional'] ?? '';
    $dias_atividade = implode(', ', $_POST['dias_atividade'] ?? []);
    $horarios = implode(', ', $_POST['horarios'] ?? []);
    $numero_vagas = $_POST['numero_vagas'] ?? 0;

    // Inserir os dados no banco
    try {
        $sql = "INSERT INTO atividade (nome_atividade, profissional, dias_atividade, horarios, numero_vagas)
                VALUES (:nome_atividade, :profissional, :dias_atividade, :horarios, :numero_vagas)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_atividade', $nome_atividade);
        $stmt->bindParam(':profissional', $profissional);
        $stmt->bindParam(':dias_atividade', $dias_atividade);
        $stmt->bindParam(':horarios', $horarios);
        $stmt->bindParam(':numero_vagas', $numero_vagas);

        if ($stmt->execute()) {
            echo "Atividade salva com sucesso!";
            header('Location: ../frontend/atividades/atividades.php');
        } else {
            echo "Erro ao salvar a atividade.";
        }
    } catch (PDOException $e) {
        echo "Erro no banco de dados: " . $e->getMessage();
    }
}
?>
