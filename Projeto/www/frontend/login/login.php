<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../login/login.css">
</head>
<body>
    <div class="fundo">
        <header class="header">
            <img src="../../img/logo.png" id="logo">
        </header>        
        
        <div class="telas" align="center">
            <h1>Bem-Vindo</h1>
            <div class="form" id="fundo">
                <img src="../../img/usuario.png">
                <form method="POST" action="../../backend/funcao_login.php">
                    <input type="text" name="CPF" class="inputs" placeholder="CPF" required>
                    <input type="password" name="SENHA" class="inputs" placeholder="Senha" required>
                    <input type="submit" class="inputs" id="entrar" value="Entrar">
                </form>
                <?php if (isset($_SESSION['login_error'])): ?>
                    <p style="color: red;"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
                <?php endif; ?>
                <a href="../esqueci-senha/esqueci-senha.html">
                    <div class="esqueci">Esqueci minha senha</div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
