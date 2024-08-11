<?php

$pdo = new PDO('sqlite: bd.bancoDeDadosChat');
    $pdo->exec('CREATE TABLE IF NOT EXISTS mensagens (id INTEGER PRIMARY KEY, mensagem TEXT)');

    if (isset($_POST['mensagem'])) {
        $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $stm = $pdo->prepare('INSERT INTO mensagens (mensagem) VALUES (?)');
        $stm->execute([$mensagem]);

        die;
    }

    if (isset($_GET['mensagens'])) {
        $result = $pdo->query('SELECT mensagem FROM mensagens')->fetchAll();

        $mensagens = '<ul>';

        foreach ($result as $registro) {
            $mensagens .= '<li>' . $registro['mensagem']. '</li>';
        }

        $mensagens .= '</ul>';

        echo $mensagens;
        die;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="chat.css">
</head>
<body>

    <div id="header">
        <img src="../ARQUIVOSGERAIS/LogoSemNome.jpeg">
    </div>

<div id="divisoes">
    <div id="headerlateral"> 
    </div>
    
    <div id="areachat">
    <h1>Chat</h1>

        <input type="text" id="nome" placeholder="Seu nome" autocomplete="off"><br>

        <div id="chat-box">
            <ul id="mensagens">
                
            </ul>
        </div>

        <input type="text" id="mensagem" placeholder="Mensagem">
        <button id="enviar">Enviar</button>
    </div>
    
<div>
    

        <script src="scriptChat.js"></script>

</body>
</html>