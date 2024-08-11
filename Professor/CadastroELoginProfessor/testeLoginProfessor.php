<?php

    session_start();
 
    if(isset($_POST['submit']) && !empty($_POST['EmailDoUsuario']) && !empty($_POST['SenhaDoUsuario'])) {
        
        include_once('configProfessor.php');

        $EmailDoUsuario = $_POST['EmailDoUsuario'];
        $SenhaDoUsuario = $_POST['SenhaDoUsuario'];

        $sql = "SELECT * FROM orientadores WHERE email_orientador = '$EmailDoUsuario' and senha_orientador='$SenhaDoUsuario'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1) {
            $_SESSION['login_error'] = "Senha ou e-mail incorretos. Tente novamente.";
            header('Location: LoginECadastroProfessor.php');
            exit();
        } else {
            $_SESSION['email_orientador'] = $EmailDoUsuario;
            $_SESSION['senha_orientador'] = $SenhaDoUsuario;
            header('Location: ../PainelProfessor/PainelProfessor.php');
        }

    } 
    else {
        header('Location: LoginECadastroProfessor.php');
    }

?>