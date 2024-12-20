

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
<link rel="stylesheet" type="text/css" href="../atividades/atividades.css">

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
            <div class="banner" id="banner"><b>Cadastrar Atividade</b></div>
            <form id="meuFormulario" onsubmit="return false;" class="form" method="POST" action="processa_formulario.php">
    <div class="borda">    
        <div class="inputs">
            <input type="text" name="nome_atividade" class="nomeatividade" placeholder="Nome da Atividade" required>
            <input type="text" name="profissional" class="profissional" placeholder="Profissional" required>
            
            <div class="cpf">Dias de Atividade</div>
            <div class="diassemana">
                <label><input type="checkbox" name="dias_atividade[]" value="Seg"> Seg</label>
                <label><input type="checkbox" name="dias_atividade[]" value="Ter"> Ter</label>
                <label><input type="checkbox" name="dias_atividade[]" value="Qua"> Qua</label>
                <label><input type="checkbox" name="dias_atividade[]" value="Qui"> Qui</label>
                <label><input type="checkbox" name="dias_atividade[]" value="Sex"> Sex</label>
            </div>

            <div class="cpf">Horários</div>
            <div class="diassemana2">
                <label><input type="checkbox" name="horarios[]" value="08:00"> 08:00</label>
                <label><input type="checkbox" name="horarios[]" value="09:00"> 09:00</label>
                <label><input type="checkbox" name="horarios[]" value="10:00"> 10:00</label>
                <label><input type="checkbox" name="horarios[]" value="11:00"> 11:00</label>
                <label><input type="checkbox" name="horarios[]" value="12:00"> 12:00</label>
                <label><input type="checkbox" name="horarios[]" value="14:00"> 14:00</label>
                <label><input type="checkbox" name="horarios[]" value="15:00"> 15:00</label>
                <label><input type="checkbox" name="horarios[]" value="16:00"> 16:00</label>
                <label><input type="checkbox" name="horarios[]" value="17:00"> 17:00</label>
                <label><input type="checkbox" name="horarios[]" value="18:00"> 18:00</label>
            </div>

            <div class="cpf">Número de Vagas</div>
            <select name="numero_vagas" id="flamingos" class="ui scrolling dropdown" required>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
    </div>    
    <div class="opcoes">
        <a href="../home/home.php"><div class="Voltar">Voltar</div></a>
        <input type="submit" value="Salvar" id="submitButton">
    </div>
</form>

        </div>

        <!-- Modal de confirmação -->
        <div id="modal" class="modal">
            <!-- <div class="modal-content">
                <span class="close" id="fecharModal">&times;</span>
                <b><p>Dados Alterados com Sucesso!</p></b>
            </div> -->
        </div>

        <footer class="footer">
            <!-- Conteúdo do footer -->
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
   
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const selectVagas = document.getElementById("flamingos");

    if (selectVagas) {
        selectVagas.addEventListener("change", function() {
            const vagasSelecionadas = this.value;
            console.log("Número de vagas selecionado: " + vagasSelecionadas);
            // Aqui você pode manipular o DOM, se necessário
            // Exemplo: document.getElementById("outroElemento").innerHTML = vagasSelecionadas;
        });
    } else {
        console.error("Elemento com ID 'flamingos' não encontrado.");
    }
});


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

        // Intercepta o submit do formulário apenas quando o botão de submit é clicado
        document.getElementById("submitButton").addEventListener("click", function(event) {
            event.preventDefault(); // Impede o envio do formulário
            abrirModal(); // Abre a modal
        });

        // Se você precisar interceptar a submissão do formulário em si, para o caso de form submit via enter também
        document.getElementById("meuFormulario").addEventListener("submit", function(event) {
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

  // Select all buttons with the class "myButton"
  const buttons = document.querySelectorAll('.dia2');

  // Add event listener to each button
  buttons.forEach(button => {
    button.addEventListener('click', function() {
      // Toggle the 'clicked' class on the button when clicked
      button.classList.toggle('clicked');
    });
  });


</script>

</html>
