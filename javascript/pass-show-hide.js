const campoSenha = document.querySelector(".registrar input[type='password']"),
esconder = document.querySelector(".registrar .campo i");

esconder.addEventListener("click", () =>{
    if (campoSenha.type == "password") {
        campoSenha.type = "text";
        esconder.classList.add("active")
    }else{
        campoSenha.type = "password";
        esconder.classList.remove("active")
    }
});


