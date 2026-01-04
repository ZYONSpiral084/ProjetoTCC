
$(document).ready(() => {

    // VERIFICA SE O E-MAIL ESTÁ REGISTRADO NO BANCO DE DADOS
    $("#btnContinuar").click((e) => {

        e.preventDefault();

        if ($("email").val() != "") {

            $.ajax({
                type: "POST",
                url: "servicos/ClienteVerif_Email.php",
                data: { email: $("#email").val() },
                success: (response) => {
                    
                    const resp = JSON.parse(response);
                    
                    // Se tudo deu certo Armazena o E-mail para usa-lo quando for Alterar a Senha
                    if (resp.error == 0) {

                        sessionStorage.setItem("user_email", resp.data[0]["email"]);
                        window.location.href = "NovaSenha";
                    }
                    else if (resp.error == 1) {
                        exibirMensagem(resp.message, resp.error);
                    }

                }
            });
    }})

    // ALTERA A SENHA
    $("#btnMudarSenha").click((e) => {

        e.preventDefault();

        const [senha, c_senha] = [$("#senha").val(), $("#cSenha").val()];

        if (senha != "" && c_senha != "") {
            if (senha === c_senha) {

                $.ajax({
                    type: "PUT",
                    url: "servicos/ClienteAlterar_Senha.php",
                    data: { senha: senha, email: sessionStorage.getItem("user_email") },
                    success: (response) => {

                        const resp = JSON.parse(response);
                        sessionStorage.removeItem("user_email");

                        // Exibe a mensagem, e depois redireciona o usuário a Tela de Login-Cadastro
                        if (resp.error != 2) {
                            exibirMensagem(resp.message, resp.error);
                        }
                    }
                });
            }
            else {
                exibirMensagem("As senhas estão diferentes",1);
            }
        }})
});

// "Fecha" a Mensagem do php
$(".effect").click(() => {
    if ($(".effect").hasClass("on")) {

        $(".effect .response").html("");
        $(".effect").removeClass("on");
    }
});

// EXIBIR MENSAGEM
function exibirMensagem(mensagem, erro) {

    const cor = (erro == 1) ? "red" : "#333";

    $(".effect").addClass("on");

    $(".effect.on .response").html(`
        <h3>Mensagem</h3>
        <p class="response-message" style='color: ${ cor };'>${ mensagem }</p>
    `);

    setTimeout(() => {
        
        $(".effect .response").html("");
        $(".effect.on").removeClass("on");
        
        if (erro == 0) { 
            window.location.href = "Login_Cadastro";
        }
    }, 2200);
}