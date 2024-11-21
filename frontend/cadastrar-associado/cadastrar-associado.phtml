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
<link rel="stylesheet" type="text/css" href="../cadastrar-associado/cadastrar-associado.css">

<body>
    <div class="fundo">
        <header class="header">
            <a href="../home/home.html">
            <img src="../../img/logo.png" id="logo">
            </a>
            <a href="../login/login.html">
                <div class="sair-container">
                    <img src="../../img/sair.png" id="sair" alt="Sair">
                    <span class="sair-text">Sair</span>
                </div>
            </a>
        </header>

        <div class="telas" align="center">
            <div class="banner" id="banner" href="" id="cadastrar">Adicionar Associado</div>
            <form action="../../backend/insere_associados.php" method="POST"  id="inputs" class="form">
                Dados do associado:
                <div class="inputs">
                    <input type="text" name="NM_ASSOCIADO" placeholder="Nome do Associado" required>
                    <input type="text" name="NM_RESPONSAVEL_ASSOCIADO" placeholder="Nome do Responsável" required>
                    <input type="text" name="CPF" placeholder="CPF" maxlength="14" required>
                    <input type="text" name="DT_NASCIMENTO" placeholder="Data de Nascimento (Dia/Mês/Ano)" maxlength="10" required>
                    <div class="telefones">
                        <input type="tel" name="TELEFONE01" placeholder="Telefone 1" maxlength="15" required>
                        <input type="tel" name="TELEFONE02" placeholder="Telefone 2" maxlength="15">
                    </div>
                    <input type="text" name="CEP" placeholder="Cep" required>
                    <input type="text" name="BAIRRO" placeholder="Bairro" required>
                    <input type="text" name="RUA" placeholder="Rua" required>
                    <br><br>
                    <div class="atividades">
                        Atividades: 
                        <br>
                        <select name="ATIVIDADE" required>
                            <option disabled selected>Atividades</option>
                            <option value="bale">Balé</option>
                            <option value="capoeira">Capoeira</option>
                            <option value="fonoaudiologia">Fonoaudiologia</option>
                            <option value="edusocial">Educação Social</option>
                            <option value="assissocial">Assistência Social</option>
                            <option value="terapocupa">Terapia Ocupacional</option>
                            <option value="pedagogia">Pedagogia</option>
                            <option value="psico">Psicologia</option>
                            <option value="musica">Musicalização</option>
                        </select>                        
                    </div>
                </div>
                <br>
                <div class="opcoes">
                    <a href="../opcoes-associados/opcoes-associados.html"><div class="Voltar">Voltar</div></a>
                    <input type="submit" value="Salvar">
                </div>
            </form>
        </div>
        
        <footer class="footer">

        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
   
    <script>
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
</script>

</html>