<?php include '../../backend/verifica_sessao.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>
<link rel="stylesheet" type="text/css" href="../configuracoes-conta/configuracoes-conta.css">

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
            <div class="banner" id="banner"><b>Configurações da Conta</b></div>
            <form id="meuFormulario" class="form" method="post" action="../../backend/processa_alteracao.php">
    <div class="inputs">
        <div class="fotonome">
            <img src="../../img/logo2.png" class="foto-perfil">
            <input type="text" class="nomecompleto" placeholder="Nome Completo" id="nomecompleto" name="NM_ASSOCIADO"
                value="<?= htmlspecialchars($_SESSION['user_data']['NM_ASSOCIADO']) ?>">
        </div>
        <div class="telefones">
            <input type="tel" id="telefone1" class="input-padrao" required placeholder="Telefone 1"
                name="TELEFONE01" onkeypress="formatar('(##) #####-####', this)" maxlength="15"
                value="<?= htmlspecialchars($_SESSION['user_data']['TELEFONE01']) ?>">
            <input type="tel" id="telefone2" class="input-padrao" placeholder="Telefone 2" name="TELEFONE02"
                onkeypress="formatar('(##) #####-####', this)" maxlength="15"
                value="<?= htmlspecialchars($_SESSION['user_data']['TELEFONE02']) ?>">
        </div>
        <input type="text" class="cpf" placeholder="CPF" name="CPF" maxlength="14"
            onkeypress="formatar('###.###.###-##', this)"
            value="<?= htmlspecialchars($_SESSION['user_data']['CPF']) ?>">
        <input type="text" id="cep" name="CEP" placeholder="CEP" value="<?= htmlspecialchars($_SESSION['user_data']['CEP']) ?>">
        <input type="text" id="bairro" name="BAIRRO" placeholder="Bairro"
            value="<?= htmlspecialchars($_SESSION['user_data']['BAIRRO']) ?>">
        <input type="text" id="rua" name="RUA" placeholder="Rua" value="<?= htmlspecialchars($_SESSION['user_data']['RUA']) ?>">
        <div class="alinhabotao">
            <button type="button" class="mudasenha" onclick="mostrarCamposSenha()">Alterar Senha</button>
            <div class="fantasma"></div>
        </div>
        <br>
        <div id="password-fields" style="display: none;">
            <input type="password" placeholder="Senha Atual" class="password-input" name="senha_atual" id="senhaAtual">
            <input type="password" placeholder="Nova Senha" class="password-input" name="nova_senha" id="novaSenha">
            <input type="password" placeholder="Confirmar Nova Senha" class="password-input" name="confirma_senha"
                id="confirmaSenha">
        </div>
        <br>
    </div>
    <br>
    <div class="opcoes">
        <a href="../home/home.php">
            <div class="Voltar">Voltar</div>
        </a>
        <input type="submit" value="Salvar" onclick="return validarSenhas()">
    </div>
</form>

        </div>

        <!-- Modal de confirmação -->
        <div id="modal" class="modal">

        </div>

        <footer class="footer">
            <!-- Conteúdo do footer -->
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
   
    <script>

        function mostrarCamposSenha() {
                const camposSenha = document.getElementById("password-fields");
                camposSenha.style.display = camposSenha.style.display === "none" ? "block" : "none";
            }
        
            function validarSenhas() {
                const senhaAtual = document.getElementById("senhaAtual").value;
                const novaSenha = document.getElementById("novaSenha").value;
                const confirmaSenha = document.getElementById("confirmaSenha").value;
            
                // Verifica se os campos de senha estão preenchidos
                if (senhaAtual || novaSenha || confirmaSenha) {
                    if (!senhaAtual) {
                        alert("Por favor, insira sua senha atual.");
                        return false;
                    }
                    if (novaSenha !== confirmaSenha) {
                        alert("As novas senhas não coincidem.");
                        return false;
                    }
                    if (novaSenha.length < 6) {
                        alert("A nova senha deve ter pelo menos 6 caracteres.");
                        return false;
                    }
                }
            
                return true; // Permite o envio do formulário se tudo estiver correto
            }

document.getElementById("meuFormulario").onsubmit = function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    const formData = new FormData(this);

    fetch("../../backend/processa_alteracao.php", {
        method: "POST",
        body: formData,
    })
    .then(response => {
        // Verifica se o status da resposta é OK
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            abrirModal(); // Abre a modal de sucesso
        } else {
            alert(data.message); // Exibe a mensagem de erro
        }
    })
    .catch(error => {
        console.error("Erro na requisição:", error.message);
        alert("Dados alterados com Sucesso!");
    });
};


function abrirModal() {
    const modal = document.getElementById("modal");
    modal.style.display = "flex"; // Exibe a modal
}

document.getElementById("fecharModal").onclick = function() {
    document.getElementById("modal").style.display = "none";
};

window.onclick = function(event) {
    const modal = document.getElementById("modal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
};


        // Função para mostrar campos de senha (opcional)
        function mostrarCamposSenha() {
            var passwordFields = document.getElementById("password-fields");
            passwordFields.style.display = (passwordFields.style.display === "none") ? "block" : "none";
        }

        // Inicializa dropdown (caso necessário)
        $('.ui.dropdown').dropdown();
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>

    function formatar(mascara, documento) {
        let i = documento.value.length;
        let saida = '#';
        let texto = mascara.substring(i);
        while (texto.substring(0, 1) != saida && texto.length) {
            documento.value += texto.substring(0, 1);
            i++;
            texto = mascara.substring(i);
        }
    }

    $("#cep").blur(function () {
        var cep = this.value.replace(/[^0-9]/, "");

        if (cep.length != 8) {
            return false;
        }

        var url = "https://viacep.com.br/ws/" + cep + "/json/";

        $.getJSON(url, function (dadosRetorno) {
            try {
                // Preenche os campos de acordo com o retorno da pesquisa
                $("#rua").val(dadosRetorno.logradouro);
                $("#bairro").val(dadosRetorno.bairro);
            } catch (ex) { }
        });
    });

    const selectElement = document.getElementById('flamingos');
    const selectedList = document.getElementById('selectedList');
    let selectedOptions = new Set();

    // Evento de clique no select para dispositivos móveis
    selectElement.addEventListener('change', (event) => {
        const selectedOption = event.target.value;

        // // Verifica o número de opções selecionadas
        // if (selectedOptions.size >= 4 && !selectedOptions.has(selectedOption)) {
        //     alert('Você pode selecionar no máximo 3 opções.');
        //     // Reverte a seleção da última opção
        //     selectElement.value = [...selectedOptions][0]; // Retorna à primeira opção selecionada
        //     return;
        // }

        // Alterna entre adicionar ou remover a opção da lista de selecionados
        if (selectedOptions.has(selectedOption)) {
            selectedOptions.delete(selectedOption); // Remove se já estiver selecionada
        } else {
            selectedOptions.add(selectedOption); // Adiciona se ainda não estiver selecionada
        }

        // Atualiza a exibição dos itens selecionados
        renderSelectedList();
    });

    function renderSelectedList() {
        // Limpa a lista antes de renderizar
        selectedList.innerHTML = '';
        selectedOptions.forEach(value => {
            const optionText = selectElement.querySelector(`option[value="${value}"]`).text;
            const listItem = document.createElement('li');
            listItem.textContent = optionText;
            selectedList.appendChild(listItem);
        });
    }

    function mostrarCamposSenha() {
        const camposSenha = document.getElementById("password-fields");
        camposSenha.style.display = "block"; // Exibe os campos de senha
    }

        function abrirModal() {
            document.getElementById("modal").style.display = "block";
        }

        // Função para abrir a modal
        function abrirModal() {
        document.getElementById("modal").style.display = "flex";
        }

        // Fecha a modal quando o botão de fechar é clicado
        document.getElementById("fecharModal").onclick = function() {
            document.getElementById("modal").style.display = "none";
        }

        // Fecha a modal se o usuário clicar fora dela
        window.onclick = function(event) {
            if (event.target == document.getElementById("modal")) {
                document.getElementById("modal").style.display = "none";
            }
        }

        // Intercepta o submit do formulário para exibir a modal
        document.getElementById("meuFormulario").onsubmit = function(event) {
            event.preventDefault(); // Impede o envio do formulário
            abrirModal(); // Abre a modal
        }
</script>

</html>