<?php include '../../backend/verifica_sessao.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<link rel="stylesheet" type="text/css" href="../home/home.css">
<body>
    <div class="fundo">
        <header class="header">
            <a href="../home/home.php">
                <img src="../../img/logo.png" id="logo">
                </a>
                <div class="sair-container" onclick="window.location.href='../../backend/logout.php';">
                    <img src="../../img/sair.png" id="sair" alt="Sair">
                    <span class="sair-text">Sair</span>
                </div>

        </header>
        <div class="usuario">
            <div class="inputs">
              <img src="../../img/usuario.png" class="foto-perfil">
              <div class="dados">
                <span class="nome">Nome Completo</span>
                <span class="cargo">Cargo</span>
              </div>
            </div>
          </div>
          

        <div class="telas" align="center">
            <div class="tela" id="associados" onclick="window.location='../opcoes-associados/opcoes-associados.html'" id="associados">Associados <img src="../../img/associados.png"></div>
            <div class="tela" id="atividades" onclick="window.location='../opcoes-atividades/opcoes-atividades.html'" id="Atividades">Atividades <img src="../../img/atividades.png"></div>
            <div class="tela" id="lista" href="" id="lista" onclick="window.location='../presenca/presenca.html'">Lista de presença<img src="../../img/lista.png"></div>
            <div class="tela" id="configuracoes" onclick="window.location='../configuracoes-conta/configuracoes-conta.html'" id="configuracoes">Configurações da conta <img src="../../img/configuracoes.png"></div>
        </div>

        <footer class="footer"></footer>
    </div>
</body>
</html>