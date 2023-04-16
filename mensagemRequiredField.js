var campos = document.querySelectorAll(".registrar input[required]");

function setMensagemValida(mensagem) {
    this.setCustomValidity(mensagem);
}

for (let i = 0; i < campos.length; i++) {
    campos[i].addEventListener("invalid", function(){
        setMensagemValida.call(this, "Por favor, preencha todos os campos.");
    });
}