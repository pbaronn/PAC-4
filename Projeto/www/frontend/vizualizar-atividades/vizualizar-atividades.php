<?php
include '../../backend/conecta.php'; 
// Consulta para obter todas as atividades cadastradas
// Consulta para obter todas as atividades cadastradas
$query = "SELECT id, nome_atividade FROM atividade order by nome_atividade asc";
$result = $conn->query($query);

// Verificar se a consulta retornou resultados
$atividades = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $atividades[] = $row;
    }
} else {
    $atividades = [];
}

$conn->close(); // Fechar a conexão com o banco de dados
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../vizualizar-atividades/vizualizar-atividades.css">

</head>

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
            <div class="banner" id="banner"><b>Matricular-se em uma Atividade</b></div>
            <!-- Exibindo as atividades cadastradas -->
            <div class="atividades" id="atividade">
            <form action="../../backend/usuario_atividade.php" method="POST">
                <label for="atividade">Escolha uma atividade para se Matricular:</label>
                <select name="atividade_id" id="atividade" class="atividade" required>
                    <?php if ($atividades): ?>
                        <?php foreach ($atividades as $atividade): ?>
                            <option value="<?= $atividade['id'] ?>"><?= htmlspecialchars($atividade['nome_atividade']) ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option disabled>Não há atividades cadastradas</option>
                    <?php endif; ?>
                </select>
                <br>
                <br>
                <input type="submit" class="cadastrar" value="Cadastrar">
            </div>
        </form>

            <br>
            <div class="opcoes">
                <a href="../opcoes-atividades/opcoes-atividades.php">
                    <div class="Voltar">Voltar</div>
                </a>
            </div>
        </div>

        <!-- Modal de confirmação -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" id="fecharModal">&times;</span>
                <b>
                    <p>Dados Alterados com Sucesso!</p>
                </b>
            </div>
        </div>

        <footer class="footer">
            <!-- Conteúdo do footer -->
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>

    <script>
        // Função para abrir a modal
        function abrirModal() {
            document.getElementById("modal").style.display = "flex";
        }

        // Fecha a modal quando o botão de fechar é clicado
        document.getElementById("fecharModal").onclick = function () {
            document.getElementById("modal").style.display = "none";
        }

        // Fecha a modal se o usuário clicar fora dela
        window.onclick = function (event) {
            if (event.target == document.getElementById("modal")) {
                document.getElementById("modal").style.display = "none";
            }
        }

        // Intercepta o submit do formulário apenas quando o botão de submit é clicado
        document.getElementById("submitButton").addEventListener("click", function (event) {
            event.preventDefault(); // Impede o envio do formulário
            abrirModal(); // Abre a modal
        });

        // Se você precisar interceptar a submissão do formulário em si, para o caso de form submit via enter também
        document.getElementById("meuFormulario").addEventListener("submit", function (event) {
            event.preventDefault(); // Impede o envio real do formulário
            abrirModal(); // Abre a modal
        });

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
    document.getElementById("fecharModal").onclick = function () {
        document.getElementById("modal").style.display = "none";
    }

    // Fecha a modal se o usuário clicar fora dela
    window.onclick = function (event) {
        if (event.target == document.getElementById("modal")) {
            document.getElementById("modal").style.display = "none";
        }
    }

    // Intercepta o submit do formulário para exibir a modal
    document.getElementById("meuFormulario").onsubmit = function (event) {
        event.preventDefault(); // Impede o envio do formulário
        abrirModal(); // Abre a modal
    }

    // Select all buttons with the class "myButton"
    const buttons = document.querySelectorAll('.dia2');

    // Add event listener to each button
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            // Toggle the 'clicked' class on the button when clicked
            button.classList.toggle('clicked');
        });
    });


</script>

</html>