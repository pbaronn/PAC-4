<?php
session_start();
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destroi a sessão atual
header("Location: ../frontend/login/login.php"); // Redireciona para a tela de login
exit();
?>
