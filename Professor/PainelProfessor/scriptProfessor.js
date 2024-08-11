let elementosAnimados = document.querySelectorAll('.hidden');
let divisao1 = document.getElementById('divisao1');
let divisao2 = document.getElementById('divisao2');
let divisao3 = document.getElementById('divisao3');
let divisao4 = document.getElementById('divisao4');


var notificationText = document.getElementById('notificacao').innerText;
    if (notificationText !== "") {
        document.getElementById('notificacao').style.display = "block";
        setTimeout(function() {
            document.getElementById('notificacao').style.display = "none"; // Esconder a notificação após 2 segundos
        }, 7000);
    }


function trocaAreas(conteudo) {
    elementosAnimados.forEach(function(elemento) {
        elemento.style.display = 'none';
    });

    if (conteudo === 'divisao3' || conteudo === 'divisao4') {
        divisao1.style.display = 'none';
        divisao2.style.display = 'none';
    } else {
        divisao1.style.display = 'block';
        divisao2.style.display = 'block';
        divisao3.style.display = 'none';
        divisao4.style.display = 'none';
    }

    let conteudoAnimacao = document.getElementById(conteudo);
    if (conteudoAnimacao) {
        conteudoAnimacao.style.display = 'block';
    }
}

