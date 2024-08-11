<?php
    session_start();
    if((!isset($_SESSION['email_orientador']) || !isset($_SESSION['senha_orientador']))) {
        header('Location: LoginECadastroProfessor.php');
        exit();
    }

    $logado = $_SESSION['email_orientador'];

    require_once '../../Aluno/CadastroLogin/config.php';

    $email_orientador = $_SESSION['email_orientador'];

    $query = "SELECT * FROM orientadores WHERE email_orientador = '$email_orientador'";
    $resultado = $conexao->query($query);

    if ($resultado && $resultado->num_rows > 0) {
        $dadosdoprofessor = $resultado->fetch_assoc();
    } else {
        echo "Nenhum usuário encontrado.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ARQUIVOSGERAIS/reset.css">
    <link rel="stylesheet" href="stylePainelProfessor.css">
    <link rel="icon" href="../ARQUIVOSGERAIS/LogoSemNome.jpeg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@700&display=swap" rel="stylesheet">
    <title>Painel Orientador</title>
</head>
<body>

<div id="header">
            <img src="../ARQUIVOSGERAIS/LogoSemNome-removebg-preview.png">
            <div id="tituloheader">Precious Society</div>
            <a href="../CadastroELoginProfessor/sairProfessor.php">Sair</a>
    </div>

    <div id="divisoes">
        <div id="headerlateral">
            <div id="areabotoes">
                <a href="#" onclick="trocaAreas('divisao1')"><img src="../ARQUIVOSGERAIS/usuario.png" class="imagenscanto"></a>
                <a href="../../Aluno/Chat/chat.php"><img src="../ARQUIVOSGERAIS/chat.png" class="imagenscanto"></a>
                <a href="#" onclick="trocaAreas('divisao4')"><img src="../ARQUIVOSGERAIS/livro.png" class="imagenscanto"></a>
                <a href="#" onclick="trocaAreas('divisao3')"><img src="../ARQUIVOSGERAIS/video.png" class="imagenscanto"></a>
            </div>
        </div>

        <div id="divisao1">
            <img src="../ARQUIVOSGERAIS/iconeprofessor.png" id="imagemdaaluna">
            <div style="margin-top: 35px;">
                <p>Nome:</p>
                <div class="inputsinfo"><?php echo "". $dadosdoprofessor['nome_completo']. "" ?></div>
            </div>
            <div>
                <p>Formação Academica</p>
                <div class="inputsinfo"><?php echo "". $dadosdoprofessor['formacao_academica']. "" ?></div>
            </div>
            <div>
                <p>Data de Nascimento:</p>
                <div class="inputsinfo"><?php echo "". $dadosdoprofessor['data_nascimento']. "" ?></div>
            </div>
            <div>
                <p>Email:</p>
                <div class="inputsinfo"><?php echo "". $dadosdoprofessor['email_orientador']. "" ?></div>
            </div>
            <div>
                <p>Senha:</p>
                <div class="inputsinfo"><?php echo "". $dadosdoprofessor['senha_orientador']. "" ?></div>
            </div>

        </div>

        <div id="divisao2" >
            <p>Aluno/a</p>
        </div>
        

        <div id="divisao3" class="hidden">
            <h1 id="titulopostssagemaulas">Postagem de Video-Aulas</h1>
            <div id="areaformvideo">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <input type="file" name="video" id="video">
                        <input type="submit" value="Enviar Vídeo" name="submit" id="botaoenviarvideo">
                </form>
            </div>
            <div id="notificacao">
            <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $target_dir = "../../Aluno/Painel/videos/";
                    $target_file = $target_dir . basename($_FILES["video"]["name"]);
                    $uploadOk = 1;
                    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if ($_FILES["video"]["size"] > 50000000) {
                        echo "Desculpe, seu vídeo é muito grande.";
                        $uploadOk = 0;
                    }

                    $allowedExtensions = array('mp4', 'avi', 'mov', 'mpeg');
                    if (!in_array($videoFileType, $allowedExtensions)) {
                        echo "Desculpe, apenas arquivos MP4, AVI, MOV e MPEG são permitidos.";
                        $uploadOk = 0;
                    }
                    if ($uploadOk == 0) {
                        echo "Desculpe, seu vídeo não pôde ser enviado.";
                    } else {
                        if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
                            echo "O vídeo ". htmlspecialchars(basename($_FILES["video"]["name"])). " foi enviado com sucesso.";
                        } else {
                            echo "Desculpe, houve um erro ao enviar seu vídeo.";
                        }
                    }
                }

            ?>
            </div>
        </div>

        <div id="divisao4" class="hidden">
            <div id="tituloatividades">Postagem de Atividades</div>
            <div id="areasdepostagemdeatividades">
                <div id="postaativi">
                    <div class="tituloenvioativi">Publicação de Atividades</div>
                    <input type="file" id="inputdeenvio">
                </div>
                <div id="vernotaaluno">
                    <div class="tituloenvioativi">Notas Alunos/Alunas</div>
                </div>
            </div>
            
        </div>


        <script src="scriptProfessor.js"></script>

</body>
<!--

                /*
                    
                */

-->