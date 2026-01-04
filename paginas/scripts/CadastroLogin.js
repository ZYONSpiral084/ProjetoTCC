
var Url = 'servicos/ClienteLogin.php';

$(document).ready(() => {

    // Preenche o campo de login caso o check box tenha sido selecionado, e já tenha logado anteriormente
    $.ajax({
        type: "GET",
        url: "servicos/ClienteGetCli_Email.php",
        success: (response) => {

            const resp = JSON.parse(response);
            // console.log(resp);

            if (resp.error == 0) {

                $("#email").val(resp.data);
                $("#checkbox_SalvarSenha").attr("checked", "checked");
            }
        }
    });

    /* Colocando Mascaras nos campos: CPF - TELEFONE */
    $("#cpf").mask("000.000.000-00");
    $("#telefone").mask("00 00000-0000");
});

// Remove o e-mail salvo caso desmarque a checkbox
$("#checkbox_SalvarSenha").click(() => {

    if(!$("#checkbox_SalvarSenha").is(":checked")) {
        
        $.ajax({
            type: "GET",
            url: "servicos/ClienteDeslogar.php?email=true",
            success: (response) => {
                const resp = JSON.parse(response);
                console.log(resp.message);
            }
        });
    }
}); 

// "Fecha" a Mensagem do php
$(".effect").click(() => {
    if ($(".effect").hasClass("on")) {

        $(".effect .response").html("");
        $(".effect").removeClass("on");
    }
});

// Troca de Login para Cadastro
$("#register").click(() => {

    $(".container").addClass('right-panel-active');
    Url = 'servicos/ClienteCadastro.php';
});
$('#login').click(() => {

    $('.container').removeClass('right-panel-active');
    Url = 'servicos/ClienteLogin.php';
});

// Esqueceu senha
$("#esqueceuSenha").click(() => {

    limparCampos("login");
    $("#checkbox_SalvarSenha").removeAttr("checked");
    localStorage.removeItem("salvar_email");

    window.location.href = "./ConfirmarEmail";
});


// CADASTRO DE CLIENTES
$('#btnRegistrar').click((e) => {

    e.preventDefault();

    const [cpf, nome, dataN] = [$('#cpf').val(), $('#nome').val(), $('#dataN').val()];
    const [telefone, emailC, senhaC] = [$('#telefone').val(), $("#emailC").val(), $("#senhaC").val()];
    limparCampos("cadastro");

    // Verificando se os campos não estão vazios, se os caracteres não passaram do permitido e se o Nome não tem números
    if (senhaC.length < 16 && senhaC != "" && emailC != "" && telefone.length == 13
        && cpf != "" && !/[0-9]/g.test(nome)) {

        $.ajax({
            type: 'POST',
            url: Url,
            data: {
                cpf: cpf,
                nome: nome,
                telefone: telefone,
                dataN: dataN,
                email: emailC,
                senha: senhaC
            },
            success: (response) => {

                // console.log(response);
                const resp = JSON.parse(response);
                // console.log(resp);

                if (resp.error == 0) {

                    localStorage.removeItem("primeira_vez");
                    localStorage.setItem("primeira_vez", true);
                }

                if (resp.error != 2) {
                    exibirMensagem(resp.message, resp.error);
                }
                else {
                    console.log(resp);
                }
            },
            beforeSend: () => { // Depois de mandar os dados cria uma Barra de Loading circular...
                $(".loader").html("<circle cx='40' cy='40' r='35'></circle>");
            },
            complete: () => {
                $(".loader").html("");
            }
        }).catch((error) => {
            $(".loader").html("");
            console.log(error);
        });
    }
    else {
        exibirMensagem("Preencha os campos corretamente!", 1);
    }
});

// LOGIN DOS CLIENTES
$("#btnEntrar").click((e) => {

    e.preventDefault();

    const [email, senha, check] = [$("#email").val(), $("#senha").val(), $("#checkbox_SalvarSenha").is(":checked")];

    if (email && senha && senha.length <= 16) {

        $.ajax({
            type: "POST",
            url: Url,
            data: {
                email: email,
                senha: senha,
                salvarLogin: check
            },
            success: (response) => {

                const resp = JSON.parse(response);
                // console.log(resp);

                if (resp.error == 0) {
                    
                    // "Primeira vez" é usado para informar o cliente sobre o Diário
                    if (localStorage.getItem("primeira_vez") == null) {

                        localStorage.removeItem("primeira_vez");
                        localStorage.setItem("primeira_vez", true);
                    }

                    sessionStorage.setItem("esta_logado", true);
                    window.location.href = "Home";
                } // Limpa os campos caso haja um erro simples e se o "Lembra-me" estiver desmarcado 
                else if (resp.error == 1) {

                    if (check) {
                        $("#senha").val("");
                    }
                    else {
                        limparCampos("login");
                    }

                    exibirMensagem(resp.message, resp.error);
                }
                else {
                    console.log(resp);
                }

            },
            beforeSend: () => { // Depois de mandar os dados cria uma Barra de Loading circular...
                $(".loader").html("<circle cx='40' cy='40' r='35'></circle>");
            },
            complete: () => {
                $(".loader").html("");
            }
        }).fail(() => $(".loader").html(""));
    }
    else {
        exibirMensagem("Preencha os campos corretamente!", 1);
    }
})

// EXIBIR MENSAGEM
function exibirMensagem(mensagem, erro) {

    const cor = (erro == 1) ? "red" : "#333";

    $(".effect").addClass("on");

    $(".effect.on .response").html(`
        <h3>Mensagem</h3>
        <p class="response-message" style='padding: 2px;color: ${cor};'>${mensagem}</p>
    `);

    setTimeout(() => {
        $(".effect .response").html("");
        $(".effect.on").removeClass("on");
    }, 2000);        
}

// LIMPAR CAMPOS
function limparCampos(campo) {

    if (campo == "login") {

        $("#email").val("");
        $("#senha").val("");
    }
    else {

        $("#cpf").val("");
        $("#nome").val("");
        $("#dataN").val("");
        $("#telefone").val("");
        $("#emailC").val("");
        $("#senhaC").val("");
    }
}
