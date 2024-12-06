<?php
include_once("conecta.php"); // ou onde estiver sua conexão com o banco

if (isset($_GET['atividade_id'])) {
    $atividade_id = (int)$_GET['atividade_id'];

    // Consulta para buscar os usuários da atividade selecionada com a sintaxe do mysqli
    $query = "SELECT u.NM_ASSOCIADO FROM usuarios_atividades ua
              JOIN user u ON ua.cduser = u.cduser
              WHERE ua.atividade_id = ?
              ORDER BY 1 ASC";

    // Preparar a consulta
    $stmt = $conn->prepare($query);
    
    if ($stmt === false) {
        die('Erro ao preparar a consulta: ' . $conn->error);
    }

    // Vincular o parâmetro de forma segura
    $stmt->bind_param('i', $atividade_id); // 'i' significa inteiro

    // Executar a consulta
    $stmt->execute();

    // Obter os resultados
    $result = $stmt->get_result();
    
    // Criar um array para armazenar os resultados
    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        // Renomeia a chave para 'nome', para que seja acessível dessa forma no JavaScript
        $usuarios[] = ['nome' => $row['NM_ASSOCIADO']];
    }

    // Retornar os resultados como um array JSON
    echo json_encode($usuarios);

    // Fechar a declaração
    $stmt->close();
} else {
    echo json_encode([]);
}
?>
