<?php
//Validação Php
    $erros = false;
if (isset($_POST["botao"])) {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!$nome) {
        $erros = true;
        $mensagemErroNome = "Por favor, digite seu nome.";
    }

    if (!$telefone) {
        $erros = true;
        $mensagemErroTelefone = "Por favor, digite seu telefone.";
    }

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros = true;
        $mensagemErroEmail = "Por favor, digite um e-mail válido.";
    }

    if (!$mensagem) {
        $erros = true;
        $mensagemErroMensagem = "Por favor, digite sua mensagem.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Questão 3</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header id="header">
        <img class="img" src="./logo-construsite-new.png" alt="Logo Construsite Brasil">
    </header>
    <main class="main">
        <div class="divleft">
            <h2 class="title">Nome:</h2>
            <br>
            <p style="color: grey;">Gabriel Loureiro</p>

            <?php
            if ($erros) {
                echo "<p>Preencha o formulário corretamente:</p>";
                if (isset($mensagemErroNome)) echo "<p>$mensagemErroNome</p>";
                if (isset($mensagemErroTelefone)) echo "<p>$mensagemErroTelefone</p>";
                if (isset($mensagemErroEmail)) echo "<p>$mensagemErroEmail</p>";
                if (isset($mensagemErroMensagem)) echo "<p>$mensagemErroMensagem</p>";
            } else {
                if (isset($_POST["botao"])) {
                    require "./enviar_email.php";
                }
            }
            ?>
        </div>


        <div class="divright">
            <h2 class="title">Mensagem</h2>

            <form class="form" action="#" id="formValidation" method="post">

                <br><br>

                <div class="campo-pergunta">
                    <label class="label" for="nome">Nome*</label>
                    <input class="input" type="text" id="nome" maxlength="256" name="nome">


                </div>
                <div class="campo-pergunta">
                    <label class="label" for="telefone">Telefone*</label>
                    <input class="input" type="number" id="telefone" maxlength="256" name="telefone">
                </div>

                <div class="campo-pergunta">
                    <label class="label" for="email">Email*</label>
                    <input class="input" type="email" id="email" maxlength="256" name="email">
                </div>

                <div class="campo-pergunta">
                    <label class="label" for="mensagem">Mensagem*</label>
                    <textarea class="input" name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
                </div>

                <button class="botao" name="botao" type="submit">Enviar Mensagem</button>
            </form>
        </div>
    </main>

    <footer class="footer"></footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script type="text/javascript" src="./validacao.js"></script>
</body>

</html>