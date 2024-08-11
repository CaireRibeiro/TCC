<?php
if (isset($_POST['submit'])) {

    include_once('configProfessor.php');

    $NomeDoOrientador = $_POST['NomeDoOrientador'];
    $FormacaoOrientador = $_POST['FormacaoOrientador'];
    $DataDeNascimentoDoOrientador = $_POST['DataDeNascimentoDoOrientador'];
    $EmailDoOrientador = $_POST['EmailDoOrientador'];
    $SenhaDoOrientador = $_POST['SenhaDoOrientador'];
    $GeneroDoOrientador = $_POST['GeneroDoOrientador'];

    $result = mysqli_query($conexao, "INSERT INTO orientadores(nome_completo, formacao_academica, data_nascimento, email_orientador, senha_orientador, sexo) 
    VALUES('$NomeDoOrientador', '$FormacaoOrientador', '$DataDeNascimentoDoOrientador', '$EmailDoOrientador', '$SenhaDoOrientador', '$GeneroDoOrientador')");

    if ($result) {
        session_start();
        $_SESSION['cadastro_sucesso'] = "Cadastro realizado com sucesso!";
        header('Location: LoginECadastroProfessor.php ');
        exit();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ARQUIVOSGERAIS/reset.css">
    <link rel="stylesheet" href="styleLoginECadastroProfessor.css">
    <link rel="icon" href="../ARQUIVOSGERAIS/LogoSemNome.jpeg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Atena</title>
</head>
<body>

<div class="form">

    <div id="Cadastro">
            <form action="LoginECadastroProfessor.php" method="post" class="form-register">
                <img src="../ARQUIVOSGERAIS/LogoOficial-removebg-preview.png" id="logo" style="width: 100px; height: 100px;" >
                <h1 id="tituloLogin">Registrar-se</h1>

                <input class="inputs" type="text" placeholder="Nome Completo" name="NomeDoOrientador" autocomplete="off" autocomplete="off"  required>
                <input class="inputs" type="date" placeholder="Data de Nascimento" name="DataDeNascimentoDoOrientador" autocomplete="off" required>
                <input class="inputs" type="email" placeholder="Email" name="EmailDoOrientador" autocomplete="off" required>
                <input class="inputs" type="password" placeholder="Senha" name="SenhaDoOrientador" autocomplete="off" required>
                
                <p id="titlesexo">Sexo:</p>
                <div id="areainputssexo">
                    <input type="radio" class="inputssexo" name="GeneroDoOrientador" value="Feminino" autocomplete="off" required>
                    <label for="feminino" class="forinput" >Feminino</label>
                    </br>
                    <input type="radio" class="inputssexo" name="GeneroDoOrientador" value="Masculino" autocomplete="off" required>
                    <label for="masculino" class="forinput" >Masculino</label>
                    </br>
                    <input type="radio" class="inputssexo" name="GeneroDoOrientador" value="Outro" autocomplete="off" required>
                    <label for="outro" class="forinput">Outro</label>
                    </br>
                </div>
    
                <input class="inputs" type="text" placeholder="Formação " autocomplete="off" name="FormacaoOrientador">
                <a class="funcaospan" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input type="submit" name="submit" id="buttonCadastrar" autocomplete="off" value="Cadastrar">
                </a> 
                <p class="message">Já tem login ? <a href="#" >Entrar</a></p>
            </form>
        </div>


        <div id="Login">
            <form class="form-login" action="testeLoginProfessor.php" method="post">
                    <img src="../ARQUIVOSGERAIS/LogoOficial-removebg-preview.png" alt="Logo" id="logologin">
                    <h1 id="tituloLogin">Login Do Orientador</h1>
                    <?php
                    session_start();
                    if (isset($_SESSION['cadastro_sucesso'])) {
                        echo '<p id="success-message" style="color:#3ad654; margin-top: 10px; font-size: 15px;">Dados cadastrados com sucesso !</p>';
                        unset($_SESSION['cadastro_sucesso']);
                    }
                ?>
                <?php
                    if (isset($_SESSION['login_error'])) {
                        echo '<p id="error-message" style="color: red; margin-top: 10px; font-size: 15px;">Senha ou e-mail incorretos. Tente novamente.</p>';
                        unset($_SESSION['login_error']);
                    }
                ?>

                    <input type="email" placeholder="Email" name="EmailDoUsuario" class="inputslogin" autocomplete="off" required>
                    <input type="password" placeholder="Senha" name="SenhaDoUsuario" class="inputslogin" autocomplete="off" required>
                    
                    <p id="textoEsqueciSenha">Em caso de esquecer a senha entre em contato com sua instituição</p>
                    <a class="funcaospan" href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <input type="submit" name="submit" id="buttonEntrar" value="Entrar">
                    </a>
                    <p class="message">Não tem cadastro ? <a href="#">Cadastre-se</a></p>
            </form>
        </div>

</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scriptLoginECadastroProfessor.js"></script>
</body>
</html>