<?php

    session_start();

    if(isset($_POST['submit']) && !empty($_POST['EmailDoUsuario']) && !empty($_POST['SenhaDoUsuario'])) {
        
        include_once('config.php');

        $email = $_POST['EmailDoUsuario'];
        $senha = $_POST['SenhaDoUsuario'];

        $sql = "SELECT * FROM aluno WHERE email = '$email' and senha='$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1) {
            $_SESSION['login_error'] = "Senha ou e-mail incorretos. Tente novamente.";
            header('Location: PaginaLoginECadastroAluno.php');
            exit();
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: ../Painel/Painel.php');
        }

    } 
    else {
        header('Location: ../PaginaLoginECadastroAluno.php');
    }

?>