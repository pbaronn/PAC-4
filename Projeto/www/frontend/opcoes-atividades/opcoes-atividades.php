<?php include '../../backend/verifica_sessao.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>
<link rel="stylesheet" type="text/css" href="../opcoes-atividades/opcoes-atividades.css">

<body>
    <div class="fundo">
        <header class="header">
            <a href="../home/home.php">
                <img src="../../img/logo.png" id="logo">
                </a>
            <a href="../login/login.php">
                <div class="sair-container">
                    <img src="../../img/sair.png" id="sair" alt="Sair">
                    <span class="sair-text">Sair</span>
                </div>
            </a>
        </header>

        <div class="telas" align="center">
            <h1>Atividades</h1>
            <?php if ($_SESSION['is_admin'] == 1): ?>
            <div class="tela" id="cadastrar" onclick="window.location='../atividades/atividades.php'" id="cadastrar">Cadastrar Atividade</div>
            <?php endif; ?>
            <div class="tela" id="visualizar" onclick="window.location='../minhas-atividades/minhas-atividades.php'" id="visualizar">Deletar Atividades</div>
            <div class="tela" id="visualizar" onclick="window.location='../vizualizar-atividades/vizualizar-atividades.php'" id="visualizar">Matricular-se em uma Atividade</div>
            <div class="tela" id="visualizar" onclick="window.location='../minhas-matriculas/minhas-matriculas.php'" id="visualizar">Minhas Matrículas</div>
            <div class="opcoes">
                <a href="../home/home.php"> <div class="Voltar">Voltar</div></a>
            </div>
        </div>
        <footer class="footer"></footer>
    </div>
</body>

</html>