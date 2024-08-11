const inputNome = document.getElementById("nome");
const inputMensagem = document.getElementById("mensagem");



function atualizaMensagens() {
    const divMensagens = document.getElementById('mensagens');

    fetch('chat.php?mensagens=true')
        .then ((response) => {
            return response.text();
        })
        .then((mensagens) => {
            divMensagens.innerHTML = mensagens;
        })
        .catch((error) => {
            console.error("Erro ao buscar mensagens", error);
        });
}

atualizaMensagens();
setInterval(atualizaMensagens, 3000);



document.getElementById("enviar").addEventListener("click", () => {
    if (!inputNome.value || !inputMensagem.value)
    return;

    var mensagem = `${inputNome.value}: ${inputMensagem.value}`;

    fetch('chat.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "mensagem=" + encodeURIComponent(mensagem)
    }).then(() => {
        inputMensagem.value = '';
        inputMensagem.focus();
        atualizaMensagens();
    })
});