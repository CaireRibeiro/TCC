<?php

    session_start();
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: PaginaLoginECadastroAluno.php');
    }
    $logado = $_SESSION['email'];

    require_once '../CadastroLogin/config.php';

    $email = $_SESSION['email'];

    $query = "SELECT * FROM aluno WHERE email = '$email'";
    $resultado = $conexao->query($query);

    if ($resultado && $resultado->num_rows > 0) {

        $dadosUsuario = $resultado->fetch_assoc();

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
    <link rel="stylesheet" href="stylePainelAluno.css">
    <link rel="icon" href="../ARQUIVOSGERAIS/LogoSemNome.jpeg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@700&display=swap" rel="stylesheet">
    <title>Painel Aluno</title>
</head>
<body>
    
    <div id="header">
            <img src="../ARQUIVOSGERAIS/LogoSemNome.jpeg">
            <div id="tituloheader">Precious Society</div>
            <a href="../CadastroLogin/sair.php">Sair</a>
    </div>


    <div id="divisoes">
        <div id="headerlateral">
            <div id="areabotoes">
                <a href="#" onclick="trocaAreas('divisao1')"><img src="../ARQUIVOSGERAIS/usuario.png" class="imagenscanto"></a>
                <a href="../Chat/chat.php"><img src="../ARQUIVOSGERAIS/chat.png" class="imagenscanto"></a>
                <a href="#" onclick="trocaAreas('divisao4')"><img src="../ARQUIVOSGERAIS/livro.png" class="imagenscanto"></a>
                <a href="#" onclick="trocaAreas('divisao3')"><img src="../ARQUIVOSGERAIS/video.png" class="imagenscanto"></a>
            </div>
        </div>
    
        <div id="divisao1">
            <img src="../ARQUIVOSGERAIS/aluna.png" id="imagemdaaluna">
            <div style="margin-top: 35px;" class="infoputs">
                <p>Nome:</p>
                <div class="inputsinfo"><?php echo "". $dadosUsuario['nome_completo']. "" ?></div>
            </div>
            <div class="infoputs">
                <p>Gmail:</p>
                <div class="inputsinfo"><?php echo "". $dadosUsuario['email']. "" ?></div>
            </div>
            <div class="infoputs">
                <p>Senha:</p>
                <div class="inputsinfo"><?php echo "". $dadosUsuario['senha']. "" ?></div>
            </div>
            <div class="infoputs">
                <p>Data de Nascimento:</p>
                <div class="inputsinfo"><?php echo "". $dadosUsuario['data_nasc']. "" ?></div>
            </div>
            <div class="infoputs">
                <p>Sexo:</p>
                <div class="inputsinfo"><?php echo "". $dadosUsuario['sexo']. "" ?></div>
            </div>
        </div>
    
        <div id="divisao2">
            <p>Professor</p>
        </div>
    
        <div id="divisao3" class="hidden">
            <h1 id="tituloarea3">Video-Aulas</h1>
            <div id="areadevideo">
                <div class="video">1° Aula</div>
                <div class="area-aberta">
                        <?php
                            $dir = "videos/video1";
                            $videos = glob($dir . "*.{mp4,avi,mov,mpeg}", GLOB_BRACE);
                            foreach($videos as $videoa) {
                            echo "<video margin-left='80' width='900' height='400' text-align='center' animation: slideDown 0.5s; controls>
                                    <source src='".$videoa."' type='video/mp4'>
                                    </video><br>";
                            }
                        ?>
                </div>
                <div class="video">2° Aula</div>
                <div class="area-aberta">
                <?php
                    $dire = "videos/video2";
                    $videosc = glob($dire . "*.{mp4,avi,mov,mpeg}", GLOB_BRACE);
                    foreach($videosc as $videoa) {
                    echo "<video id='video2' width='900' height='400' text-align='center' animation: slideDown 0.5s; controls>
                            <source src='".$videoa."' type='video/mp4'>
                            </video><br>";
                    }
                ?>
                </div>
                <div class="video">3° Aula</div>
                <div class="area-aberta">
                <?php
                    $direc = "videos/video3";
                    $videosca = glob($direc . "*.{mp4,avi,mov,mpeg}", GLOB_BRACE);
                    foreach($videosca as $videoa) {
                    echo "<video id='video3' width='900' height='400' text-align='center' animation: slideDown 0.5s; controls>
                            <source src='".$videoa."' type='video/mp4'>
                            </video><br>";
                    }
                ?>
                </div>
            </div>
        </div>
        
    
        <div id="divisao4" class="hidden">
            <div id="titulolicoes">
                Exercicios e Notas
            </div>
            <div id="areaatividadesEnotas">
                <div id="areaatividade">
                    <h1 id="titulosativi">Atividades</h1>
                    <div id="atividades">Atividade 1</div>
                    <div id="atividades">Atividade 2</div>
                </div>
                <div id="areadenotas">
                    <h1 id="titulosativi">Notas</h1>
                    <div id="areadenotadeatividade">
                        <div id="descriativi">Nota da atividade 1</div>
                        <div id="nota"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    
    
    

    

    <script src="scriptPainelAluno.js"></script>
</body>